<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;
//use Ratchet\WebSocket\MessageComponentInterface as WebSocketMessageComponentInterface;
use App\Models\ChatSession;

use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;

class WebSocketController extends Controller implements MessageComponentInterface
{
    private static $connections = [];


    //
     /**
     * When a new connection is opened it will be passed to this method
     * @param  ConnectionInterface $conn The socket/connection that just connected to your application
     * @throws \Exception
     */
    function onOpen(ConnectionInterface $conn){
        self::$connections[$conn->resourceId] = compact('conn') + [
            'connType' => null,
            'myReceiverConnId' => null,
            'sessionId' => null,
            'sessionStatus' => null,
            ];

        echo "New connection! ({$conn->resourceId})\n";

    }

     /**
     * This is called before or after a socket is closed (depends on how it's closed).  SendMessage to $conn will not result in an error if it has already been closed.
     * @param  ConnectionInterface $conn The socket/connection that is closing/closed
     * @throws \Exception
     */
    function onClose(ConnectionInterface $conn){
        $disconnectedId = $conn->resourceId;
        $chatSession = ChatSession::find(self::$connections[$disconnectedId]['sessionId']);
        $chatSession->status = 'CLOSED';

        $chatSession->save();
        unset(WebSocketController::$connections[$disconnectedId]);
        foreach(WebSocketController::$connections as &$connection){
            $connection['conn']->send(json_encode([
                'offline_user' => $disconnectedId,
                'from_user_id' => 'server control',
                'from_resource_id' => null,
                'messageType' => 'closing',
            'messageText' => 'Você foi desconectado por inatividade',
            'connType' => 'bot',
            ]));
        }



    }


    /**
     * If there is an error with one of the sockets, or somewhere in the application where an Exception is thrown,
     * the Exception is sent back down the stack, handled by the Server and bubbled back up the application through this method
     * @param  ConnectionInterface $conn
     * @param  \Exception $e
     * @throws \Exception
     */
    function onError(ConnectionInterface $conn, \Exception $e){
        $userId = WebSocketController::$connections[$conn->resourceId]['connType'];
        echo "An error has ocurred with user $userId: {$e->getMessage()}\n";
        unset(WebSocketController::$connections[$conn->resourceId]);
        $conn->close();
    }

    /**
     * Triggered when a client sends data through the socket
     * @param  \Ratchet\ConnectionInterface $conn The socket/connection that sent the message to your application
     * @param  string $msg The message received
     * @throws \Exception
     */
    function onMessage(ConnectionInterface $conn, $msg)
    {
        echo "Received message: $msg";
        $messageObj = json_decode($msg);
        if($messageObj->messageType == 'opening'){
            self::$connections[$conn->resourceId]['connType'] = $messageObj->connType;
            $messageObj->connId = $conn->resourceId;
            $conn->send(json_encode($messageObj));

            $chatSession = new ChatSession();

            if(self::$connections[$conn->resourceId]['connType'] == 'customer'){

                self::$connections[$conn->resourceId]['sessionId'] = ChatSession::create([
                    'customer_conn_id' => $conn->resourceId,
                    'status' => 'OPEN_AWAIT',
                ])->id;

                $this->showWelcomeMenu($conn);
            }else if (self::$connections[$conn->resourceId]['connType'] == 'attendant'){
                $customerConn = self::$connections[$messageObj->customerConnId];

                $chatSession = ChatSession::find($customerConn['sessionId']);
                $chatSession->status = 'ATTENDING';
                $chatSession->attendant_conn_id = $conn->resourceId;

                $chatSession->save();

                self::$connections[$conn->resourceId]['sessionId'] = $chatSession->id;

            }
        }else if($messageObj->messageType == 'chat'){
                $session = ChatSession::find(self::$connections[$conn->resourceId]['sessionId']);
                $message = new ChatMessage();

                $message->sender_conn_id = $conn->resourceId;
                $message->message = $messageObj->messageText;



                if(self::$connections[$conn->resourceId]['connType'] == 'customer'){
                    $message->sender_type = 'CUSTOMER';
                    if($session->status == 'ATTENDING' && $session->attendant_conn_id){

                        self::$connections[$session->attendant_conn_id]['conn']->send($msg);
                    }
                }else{
                    $message->sender_type = 'ATTENDANT';
                    self::$connections[$session->customer_conn_id]['conn']->send($msg);
                }

                $session->messages()->save($message);


                //$onlineUsers = [];
                //foreach(self::$connections as $resourceId => &$connection){
                //$connection['conn']->send(json_encode(['connId' => $conn->resourceId, 'conType' => $msg]));
                //if($conn->resourceId != $resourceId){
                //    $onlineUsers[$resourceId] = $connection['connType'];
                //}
                // if($this->connections[$conn->resourceId]['connType'] == 'customer'){
                //     $this->showWelcomeMenu($conn);
                // }else{
                // }
                //}
                //$conn->send(json_encode(['online_users' => $onlineUsers]));
        }


        // if(is_null($this->connections[$conn->resourceId]['connType'])){
        //     $this->connections[$conn->resourceId]['connType'] = $msg;
        //     $onlineUsers = [];

        //    // foreach($this->connections as $resourceId => &$connection){
        //      //   $connection['conn']->send(json_encode(['connId' => $conn->resourceId, 'conType' => $msg]));

        //         // if($conn->resourceId != $resourceId){
        //         //     $onlineUsers[$resourceId] = $connection['user_id'];
        //         // }
        //         if($this->connections[$conn->resourceId]['connType'] == 'customer'){
        //             $this->showWelcomeMenu($conn);
        //         }else{

        //         }
        //     //}
        //     //$conn->send(json_encode(['online_users' => $onlineUsers]));
        // }else{
        //     $fromUserId = $this->connections[$conn->resourceId]['user_id'];
        //     $msg = json_decode($msg, true);
        //     // $this->connections[$msg['to']]['conn']->send(json_encode([
        //     //     'msg' => $msg['content'],
        //     //     'from_user_id' => $fromUserId,
        //     //     'from_resource_id' => $conn->resourceId,
        //     // ]));

        //     $conn->send(json_encode([
        //         'msg' => "Echoing... {$msg['content']}",
        //         'from_resource_id' => $conn->resourceId,
        //     ]));
        // }
    }


    private function showWelcomeMenu(ConnectionInterface $conn){
        $welcomeMessage = <<<EOT
        <strong>Olá, prezado(a) cliente! Por favor, para que possamos ajudá-lo, selecione uma das opções abaixo</strong> <br>
        <ul>
            <li>Financeiro</li>
            <li>Atendimento Técnico</li>
            <li>Informações e dúvidas</li>
        </ul>
        EOT;

        $conn->send(json_encode([
            'messageText' => $welcomeMessage,
            'from_resource_id' => $conn->resourceId,
        ]));
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
