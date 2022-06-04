<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\PersonalAccessToken;

class APITokenController extends Controller
{
    //

    public function store(Request $request){
        $requestUser = $request->user();
        $user = User::find($requestUser->id)->with('roles')->first(); //get always returns an array
        $token = $requestUser->createToken($requestUser->email);
        $dbToken = PersonalAccessToken::findToken($token->plainTextToken);

        return [ 'user' => $user, 'token' => $token->plainTextToken,'tokenCreatedAt' => $dbToken->created_at];
    }


    public function authThirdPart(Request $request){
        $request->validate([
            'username' =>'required',
            'password' => 'required',
        ]);

        $data = $request->all();

     $user = User::where('username', $request->username)->first();

            if ($user &&
                Hash::check($request->password, $user->password)) {

                //return $user;

                //return response()->json(['user' => $user, 'token' => $user->createToken($request->email)]);
                $token = $user->createToken($data['username']);
                $dbToken = PersonalAccessToken::findToken($token->plainTextToken);
                return [ 'user' => $user,'token' => $token->plainTextToken, 'tokenCreatedAt' => $dbToken->created_at];
            }

            //return response()->json(['Unauthorized' => 'Usuário e/ou senha incorretos.'], 422);
            throw ValidationException::withMessages([
                'username' => ['Usuário e/ou senha incorretos']
            ]);
    }
}
