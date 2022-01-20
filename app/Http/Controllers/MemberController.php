<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Members;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    //

    function getMemberList(){
        return Members::all();
    }
    function addMember(Request $req){
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

            $req->validate([
                'email'=> 'required|email',
                'password'=>'required|min:8:max:13'
            ]);
            $user = Members::where(['email'=>$req->email, 'password'=>$req->password])->first();
            

        if(!$user){
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
