<?php

namespace App\Http\Controllers\Api\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
   

   

   
    public function show($id)
    {
        //
        $product=Product::find($id)->get();
        
        return response()->json([
            'product' => $product,
            
        ], 201); 
    }

    
    public function search(Request $request){
       
    }

}
