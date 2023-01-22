<?php

namespace App\Http\Controllers\Api\Trader;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        //
        $product = Product::all();
return response()->json([
    "products"=>$product
    
], 201); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        $product = Product::create(array_merge(
            $request->all(),
          
        ));
return response()->json([
    'message' => 'Product successfully aded',
    
], 201); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product=Product::find($id)->get();
        
        return response()->json([
            'product' => $product,
            
        ], 201); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        //
        $product=Product::where('id',$id) ->update(array_merge(
            $request->all()
          
        ));
     

        return response()->json([
            'message' => 'Product successfully update',
            
        ], 201); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id)->delete();

        return response()->json([
            'message' => 'Product successfully deleted',
            
        ], 201); 
    }
}
