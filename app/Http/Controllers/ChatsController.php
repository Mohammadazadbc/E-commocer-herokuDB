<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversations;

class ChatsController extends Controller
{
    function ShowChats(){
        return Conversations::all();
    }

    function addChats(Request $req){
        $chat = new Conversations();
        $chat->chats = $req->chats;
        $result = $chat->save();
        if($result){
            return["message"=>"data has been saved"];
        }
        else{
            return ["message"=>"somethings goes wrong"];
        }
    }
}
