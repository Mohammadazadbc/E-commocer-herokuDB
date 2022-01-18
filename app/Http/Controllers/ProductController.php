<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class ProductController extends Controller
{
    function index(){
        return  Products::all();
         
    }
  
    function addProduct(Request $req){
        $pro = new Products();
        $pro->title = $req->title;
        $pro->price = $req->price;
        $pro->description = $req->description;
        $pro->category = $req->category;
        $pro->image = $req->image;
        $resutl = $pro->save();
        if($resutl){
            return ["message"=>"has been save"];
        }
        else{
            return ["message"=>"has been faild"];
        }
    }
}
