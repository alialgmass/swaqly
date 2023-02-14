<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Product;
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
            
            $product = Product::select('name')->get()->toArray();
            $data=[];
            foreach($product as $d) {
              \array_push($data,$d['name']);
            }
            $product=array_unique($data);
            return  $this-> returnData('products',$product);
        } catch (\Throwable $th) {
             return  $this-> returnError(400, $th);
        }

    }
    public function indexcategory()
    {
        //
       
    
        try {
            //code...
            $data = Category::all();
     
            return $this->returnData('Categories',$data);
        } catch (\Throwable $th) {
             return  $this-> returnError(400, $th);
        }

    }

}
