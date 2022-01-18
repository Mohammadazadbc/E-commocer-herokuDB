<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
        function index(){
            return Rating::all();
        }

        function addRating(Request $req){
            $rate = new Rating();
            $rate->rate = $req->rate;
            $rate->count = $req->count;
            $rate->product_id = $req->product_id;
            $resutl = $rate->save();
            if($resutl){
                return ["message"=>"has been save"];
            }
            else{
                return ["message"=>"has been faild"];
            }
        }
}
