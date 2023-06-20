<?php

namespace App\Http\Controllers\Api\Trader;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Product_name;
use App\Traits\GeneralTrait;

class ProductController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        //
        try {
            //code...
            $product = Product::all();
           
            return  $this-> returnData('products',$product);
        } catch (\Throwable$th) {
             return  $this-> returnError(400, $th);
        }

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
        try {
            
            $product = Product::create(array_merge(
                $request->all(),

            ));
           // add_to_names($request->name,$request->catoger_id);
            return  $this-> returnSuccessMessage( "Product successfully aded",  "201");
        } catch (\Throwable$th) {
             return  $this-> returnError(400, $th);
        }

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
        try {
            $product = Product::find($id);

            return  $this-> returnData('products',$product);
        } catch (\Throwable$th) {
             return  $this-> returnError(400, $th);
        }

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
        try {
            $product = Product::where('id', $id)->update(array_merge(
                $request->all()

            ));

          
            return  $this-> returnSuccessMessage( "Product successfully update",  "201");
        } catch (\Throwable$th) {
             return  $this-> returnError(400, $th);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::find($id)->delete();

            
            return  $this-> returnSuccessMessage( "Product successfully deleted",  "201");
        } catch (\Throwable$th) {
             return  $this-> returnError(400, $th);
        }

    }
    function add_to_names($name ,$catoger_id){
$data=Product_names::firstOrCreate([
    'name' => $name ,
    'catoger_id'=>$catoger_id
]);
    }
}
