<?php

namespace App\Console\Commands;

use App\Http\Controllers\WebSocketController;
use Illuminate\Console\Command;

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\Wamp\WampServer;
use Ratchet\WebSocket\WsServer;

class WebSocketServer extends Command
{
    public static $SERVER_IS_RUNNING = false;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'websocket:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(!self::$SERVER_IS_RUNNING){

            $server = IoServer::factory(
                new HttpServer(



                    new WsServer(

                        new WebSocketController()

                        )
                    ),
                    8090
                );

                self::$SERVER_IS_RUNNING = true;
                echo 'Websocket Server Running...';
                return $server->run();
        }
    }
}
