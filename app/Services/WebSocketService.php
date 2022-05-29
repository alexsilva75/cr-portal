<?php
namespace App\Services;
use Illuminate\Support\Facades\Artisan;
class WebSocketService{

    public function __construct(){
        //echo "Starting Web Socket Server.";
        //Artisan::call('serve');
        //Artisan::call('websocket:start');
    }


    public function init(){
        echo 'Running Web Socket Server';
    }
}
