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


        mail(
            'alexsandro.silva77@outlook.com',
            'Teste de contato',
            $data['mensagem'],
            [],
            ""
        );
    }
}
