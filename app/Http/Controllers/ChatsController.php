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

    function updateChat(Request $req, $id){
        $uChat = Conversations::find($id);
        $uChat->chats = $req->chats;
        $result = $uChat->save();

        if($result){
            return ["message" =>"modified"];
        }
        else{
            return ["message" =>"Data not modified"];
        }
    }
    function deleteChat($id){
        $dchat = Conversations::find($id);
        $result = $dchat->delete();
        if($result){
            return ["message"=>"data has been deleted"];
        }
        else{
            return ["message"=>"data has been not deleted"];
        }
    }
}