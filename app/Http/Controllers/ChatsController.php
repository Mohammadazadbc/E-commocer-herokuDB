<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversations;
use App\Models\Members;

use Illuminate\Support\Facades\Hash;

class ChatsController extends Controller
{
    function ShowChats(){
        return Conversations::all();
    }
    // function ShowUserChat(){
    //     return Members::all()->conversation;
    // }
    

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

  public  function addMemberChat(Request $req, $id){
        $req->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'brithdate' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:13'

        ]);
        $mem = new Members();
        $mem->firstname = $req->firstname;
        $mem->lastname = $req->lastname;
        $mem->email = $req->email;
        $mem->password = Hash::make($req->password);
        $mem->brithdate =  $req->brithdate;
        $mem->Rsecret = $req->Rsecret;
        $mem->member_img = $req->member_img;
        $mem->save();

        $chatId = $id;
        $mem->conversation()->attach($chatId);
        return "Recoded has been saved!";
        
    }

    public function showChatByusr($id){
        $mem = Members::find($id);
        $chat = $mem->conversation;
        return $chat;
    }


  public function addChatByUser(Request $req, $id){
        $chat = new Conversations();
        $chat->chats = $req->chats;
        $chat->save();

        $chat->members()->attach($id);
        return "Recoded has been saved";
    }


}
