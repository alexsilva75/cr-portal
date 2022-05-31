<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatSession;
use App\Models\ChatMessage;
use Inertia\Inertia;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $chat = ChatSession::with('messages')->find($id);
        return response()->json(['chat' => $chat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function customersOpenChats(Request $request){
        $openConnections = ChatSession::where('status', 'OPEN_AWAIT')->orWhere('status', 'ATTENDING')
                            ->whereNotNull('customer_conn_id')->get();

        return response()->json(['connections' => $openConnections]);
    }

    public function dashboard(Request $request){
        $openConnections = ChatSession::where('status', 'OPEN_AWAIT')
                            ->whereNotNull('customer_conn_id')->get();
                            return Inertia::render('Dashboard',
                            [
                                'connections' => $openConnections
                            ]
                            );
    }

    public function chat(Request $request){

    }
}
