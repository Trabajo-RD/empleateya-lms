<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;

class MessageController extends Controller
{
    public function __construct(){

        $this->middleware('auth');

    }

    public function sent( Request $request ){

        // auth()->user()
        $message = auth()->user()->messages()->create([
            'content' => $request->message,
            'chat_id' => $request->chat_id
        ])->load('user'); 

        // toOthers sent the message to other user
        broadcast(new MessageSent($message))->toOthers();

        return $message;
    }

}
