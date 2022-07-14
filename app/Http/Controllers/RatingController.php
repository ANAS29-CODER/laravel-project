<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Profile;

class RatingController extends Controller
{
    public function store(Request $request,$type){

        $request->validate([

            'rating'=> 'required|integer|min:1|max:5',
            'id'=>'required|integer'
        ]);

        if($type=='product'){
            $model=Product::find($request->post('id'));
        }elseif($type=='profile'){
            $model=Profile::find($request->post('id'));
        }

        $rating=$model->rating()->create([
            'rating'=>$request->post('rating'),
        ]);
    }
}
