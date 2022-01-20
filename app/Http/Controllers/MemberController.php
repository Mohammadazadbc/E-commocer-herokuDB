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
        $mem->Qsecret = $req->Qsecret;
        $mem->Rsecret = $req->Rsecret;
        $result = $mem->save();

        if($result){
            return ["message"=> "Data has been saved"];
        }
        else{
            return ["message"=>"Data has been not saved"];
        }
        
    }

    function updateMember( Request $req,$id){
        $umem = Members::find($id);
        $umem->firstname = $req->firstname;
        $umem->lastname = $req->lastname;
        $umem->email = $req->email;
        $umem->password = $req->password;
        $umem->brithdate =  $req->brithdate;
        $umem->Qsecret = $req->Qsecret;
        $umem->Rsecret = $req->Rsecret;
        $Uresult = $umem->save();
        if($Uresult){
            return ["message"=>"data updated"];
        }
        else{
            return ["message"=>"date has been not updated"];
        }
  
    }
    function login(Request $req){
        $lmem = Members::where(["email"=>$req->email,'password'=>$req->password])->first();

        if(!$lmem){
            return ['message'=>"email or password inccorect"];
        }
        else{
           return ["message"=>"welcome"];
        }

    }  
    
    function deleteMember($id){
        $dmem = Members::find($id);
        $dresult = $dmem->delete();
        if($dresult){
            return ["message"=>"data has been deleted"];
        }
        else{
            return ["message"=>"data has been not deleted"];
        }
    }
    
}
