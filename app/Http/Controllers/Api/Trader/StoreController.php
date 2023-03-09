<?php

namespace App\Http\Controllers\Api\Trader;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;

class StoreController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        try{
         $data=Store::where('trader_id',auth($guard='api-trader')->user()->id)->get();
return   $this-> returnData('stores',$data);
        }
        catch(\Throwable $th){
            return  $this-> returnError(400, $th);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'trader_id' => 'required',
        ]);
       
        try {
            $product = Store::create(
                $validated);
            return  $this-> returnSuccessMessage( " successfully aded",  "200");
        } catch (\Throwable$th) {
             return  $this-> returnError(400, $th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try{
            $data=Store::where('trader_id',auth($guard='api-trader')->user()->id)->find($id)->get();
   return   $this-> returnData('stores',$data);
           }
           catch(\Throwable $th){
               return  $this-> returnError(400, $th);
           }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $data = Store::where('id', $id)->update(
            [
                'name' => $request->name,
               
            ]
        );
        try {
           

          
            return  $this-> returnSuccessMessage( "Store successfully update",  "201");
        } catch (\Throwable$th) {
             return  $this-> returnError(400, $th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
      
        try {
           
            $store = Store::find($id)->delete();
            
            return  $this-> returnSuccessMessage( " successfully deleted",  "201");
        } catch (\Throwable$th) {
             return  $this-> returnError(400, $th);
        }
    }
}
