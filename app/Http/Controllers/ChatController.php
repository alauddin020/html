<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Events\ChatEvent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
class ChatController extends Controller
{
    public function index(){
        $chat = [
            'message'=>'hello world',
            'id'=>3
        ];
        broadcast(new ChatEvent((object)$chat))->toOthers();
        return $chat;
        //return view('chat');
    }
    public function sendMessage(Request $request){
        $redis = Redis::connection();
        $data = ['message' => $request->message, 'user' => $request->user];
        $redis->publish('message', json_encode($data));
        return response()->json([$data]);
    }
}
