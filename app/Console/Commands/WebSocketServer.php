<?php

namespace App\Console\Commands;

use App\Http\Controllers\WebSocketController;
use Illuminate\Console\Command;

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

class WebSocketServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new WebSocketController()
                )
            ),
            8090
        );

        echo 'Websocket Server Running...';
        return $server->run();
    }
}
