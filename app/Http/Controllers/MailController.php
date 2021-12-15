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
            'contato@portalcrtelecom.com.br',
            '=?utf-8?B?' . base64_encode('Formulário de contato - Portal CR Telecom') . '?=',
            "{$data['nome']} \n {$data['email']} \n {$data['fone']} \n {$data['mensagem']}",
            'From: form-contato@portalcrtelecom.com.br' . "\r\n"
                . 'Content-Type: text/plain; charset=utf-8' . "\r\n",

        )) {
            return response()->json([
                'success' => 'Sua mensagem foi enviada com sucesso e está sendo processada. Em breve, entraremos em contato para respondê-la.', 200
            ]);
        } else {
            return response()->json([
                'error' => 'Não foi possível enviar a sua mensagem. Tente novamente mais tarde.', 500
            ]);
        }
    }
}
