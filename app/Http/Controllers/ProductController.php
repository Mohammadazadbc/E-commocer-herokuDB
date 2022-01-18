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
        $product = new Products();
       $product->title = $req->titel;
       $product->price = $req->price;
       $product->description = $req->description;
       $product->category = $req->category;
       $product->image = $req->image;
       $result = $product->save();
       if($result){
           return ["data"=>"has been saved"];
       }
       else{
           return ["data"=>"not saved"];
       }
    }
}
