<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\SiteContact;
use App\Models\SiteContactMessage;

class MailController extends Controller
{
    //

    public function send(Request $request)
    {
        $data = $request->all();
        // $siteContactMessage = new SiteContactMessage($data['mensagem']);

        // Mail::to('alexsandro.silva77@outlook.com')->send(new SiteContact($siteContactMessage));


        if (mail(
            'alexsandro.silva77@outlook.com',
            'Formulário de contato - Portal CR Telecom',
            "{$data['nome']} \n {$data['email']} \n {$data['fone']} \n {$data['mensagem']}",
            [],
            ""
        )) {
            return response()->json([
                'success' => 'Sua mensagem foi enviada com sucesso e está sendo processada. Em breve, entraremos em contato para respondê-la.', 200
            ]);
        } else {
            return response()->json([
                'error' => 'Sua mensagem foi enviada com sucesso e está sendo processada. Em breve, entraremos em contato para respondê-la.', 200
            ]);
        }
    }
}
