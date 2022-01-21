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
    function getMemberById($id){
        return Members::find($id);
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
        $mem->password = Hash::make($req->password);
        $mem->brithdate =  $req->brithdate;
        $mem->Rsecret = $req->Rsecret;
        $mem->member_img = $req->member_img;
        $result = $mem->save();

        if($result){
            return ["message"=> "Data has been saved"];
        }
        else{
            return ["message"=>"Data has been not saved"];
        }
        
    }

    function updateMember( Request $req,$id){
        $req->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'brithdate' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:13'

        ]);
        $umem = Members::find($id);
        $umem->firstname = $req->firstname;
        $umem->lastname = $req->lastname;
        $umem->email = $req->email;
        $umem->password = Hash::make( $req->password);
        $umem->brithdate =  $req->brithdate;
        $umem->Rsecret = $req->Rsecret;
        $umem->member_img = $req->member_img;
        $Uresult = $umem->save();
        if($Uresult){
            return ["message"=>"data updated"];
        }
        else{
            return ["message"=>"date has been not updated"];
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

    function login(Request $req){

        $req->validate([
            'email'=> 'required|email',
            'password'=>'required'
        ]);
         $user = Members::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password, $user->password)){
            return ["message"=>"email or password is not match"];
        }
        else{
            return ["message"=>"welcome"];
        }

}

    function changePassword(Request $req, $id){
            $cPass = Members::find($id);
            $cPass->password = Hash::make($req->password);
            $result = $cPass->save();
            if($result){
                return ["message"=>"Password changed"];
            }
            else{
                return ["message"=>"Password not matche"];
            }
    }
        
   
    
}
