<?php

namespace App\Http\Controllers\Trader;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Product_name;


class ProductController extends Controller
{
    
    public function index()
    {
        //
       $Product= Product::with('category')->where('trader_id',auth()->user()->id)->get();
       return view('Admin.product.index',['Product'=>$Product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $Section=Category::all();
        return view('Admin.product.add',['Section'=>$Section]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        //
       
        Product::create($array_merge(
            $request->all(),

        ));
        return redirect('product/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
       $Product= Product::find($id);
       return view('Admin.product.show',['product'=>$Product,'id'=>$Product->id]);
    }
  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $Section=Category::all();
        $Product=Product::find($id);
        return view('Admin.product.edit',['id'=>$id,'Section'=>$Section,'Product'=>$Product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
       
        Product::find($id)->update([
         
            $array_merge(
                $request->all(),
    
            )
        ]);
        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
Product::destroy($id);
return redirect('product');
    }
}
