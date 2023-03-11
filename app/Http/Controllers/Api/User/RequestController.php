<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Product_name;
use App\Models\Category;
use App\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    //
    use GeneralTrait;
    public function indexproduct()
    {
        //
       
    
        try {
            
           $data=Product_name::with('category')->get();
            return  $this-> returnData('products',$data);
        } catch (\Throwable $th) {
             return  $this-> returnError(400, $th);
        }

    }
    public function indexcategory()
    {
        //
       
    
        try {
            //code...
            $data = Category::with('productname')->get();
     
            return $this->returnData('Categories',$data);
        } catch (\Throwable $th) {
             return  $this-> returnError(400, $th);
        }

    }

}
