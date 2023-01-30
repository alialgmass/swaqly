<?php

namespace App\Http\Controllers\Api\Trader;

use App\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use app\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use GeneralTrait;
    //
    public function index()
    {
        $data = Category::all();
       
        return $this->returnData('Categories',$data);
    }
    public function store(Request $request)
    {
        $catName = $request->input('name');
        $data = searchifexist($catName);
        if (!data[1]) {try {
            Category::make($request->all());
           
           return $this->returnSuccessMessage( "Category successfully aded",  "201");
        } catch (\Throwable $th) {
          
            return $this->returnError(400, $th);
        }} else {
            return response()->json([
                'message' => 'Catogery is exist',
                'Catogery' => $data[0],
            ], 500);
        }
    }
    public function show($id)
    {
        //
        if($data = Category::find($id)->get())
        return $this->returnData('Category',$data);
        else
        return $this->returnError(400, 'not found');
        
    }
    public function update(Request $request, $id)
    {
        //
        try {
            $data = Category::where('id', $id)->update([
                'data' => $request->all(),
            ]
            );
        
           return $this->returnSuccessMessage( "Category successfully updated",  "201");
        } catch (\Throwable $th) {
            return $this->returnError(400, $th);
            
        }
       

      
    }
  
    public function searchifexist($name)
    {

        $data = Category::where('name', 'LIKE', '%' . $name . '%')->get();
        if (count($data) > 0) {
            return [$data, true];
        } else {
            return [$data, false];
        }
    }
    public function search(Request $request)
    {
        $catName = $request->input('name');
        $data = searchifexist($catName);
        if ($data[1]) {
        
            return $this->returnData('Category',$data);
        } else {
          return $this->returnError(400, 'not found');
        }

    }
}
