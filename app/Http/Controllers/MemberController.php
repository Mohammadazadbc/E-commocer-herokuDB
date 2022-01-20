<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Members;

class MemberController extends Controller
{
    //

    function getMemberList(){
        return Members::all();
    }
    function addMember(Request $req){
        $mem = new Members();
        $mem->firstname = $req->firstname;
        $mem->lastname = $req->lastname;
        $mem->email = $req->email;
        $mem->password = $req->password;
        $mem->brithdate =  $req->brithdate;
        $result = $mem->save();

        if($result){
            return ["message"=> "Data has been saved"];
        }
        else{
            return ["message"=>"Data has been not saved"];
        }
        
    }
    
}
