<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;

class ChatController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function show(Chat $chat){
        /**
         * Abort the connection if the first parameter is false
         * Second parameter is the error code
         */
         abort_unless( $chat->users->contains(auth()->id()), 403 );

         return view('chat.show');
    }

    public function chat_with(User $user){

        $user_a = auth()->user();

        $user_b = $user;

        // wherehas() relation of pivote table "chat_user"
        $chat = $user_a->chats()->wherehas('users', function($q) use ($user_b){

                    $q->where('chat_user.user_id', $user_b->id);

                })->first();

        if(!$chat){

            // Create chat room if doesn't exist
            $chat = Chat::create([]);

            $chat->users()->sync([$user_a->id, $user_b->id]);

        }

        return redirect()->route('chat.show', $chat);

    }

    public function get_users(Chat $chat){

        $users = $chat->users;

        return response()->json([
            'users' => $users
        ]);

    }

    public function get_messages(Chat $chat){

        $messages = $chat->messages()->with('user')->get();

        return response()->json([
            'messages' => $messages
        ]);

    }

}
