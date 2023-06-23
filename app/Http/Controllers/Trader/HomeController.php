<?php

namespace App\Http\Controllers\Trader;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    //
    public function index()
    {
     
        $Product= Product::with('category')->where('trader_id',auth()->user()->id)->latest()->get();
        return view('Admin.index',['Product'=>$Product]);

        
    }
}
