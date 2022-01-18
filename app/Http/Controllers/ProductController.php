<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class ProductController extends Controller
{
    function index(){
        $prodcut = Products::all();
        $prodRa = Products::find(1)->rating;
        return $prodcut;
    }
}
