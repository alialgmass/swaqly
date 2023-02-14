<?php
namespace App\classes;

use app\Models\Category as categ;
use app\Models\Product as Prod;
use app\Models\Trader;

class Category
{
  
    public $name;
   
    public function __construct($name)
    {

        $this->name = $name;
      
    }
    public function Add(){
        if(!Category::where('name', 'LIKE', '%' . $name . '%')->get())
        $product = categ::create([
            "name"=> $name,
          
            
        ]);
       
    }
    public function Edit($id){
        $product = Prod::where('id', $id)->update([
            "name"=> $name,
          
        ]

        );
     
    }
    public static function get_all_category()
    {
        return categ::all();
    }
   
    public static function get_all_product_in_category($id)
    {
        $product = Prod::where('category_id', $id)->select('name')->get()->toArray();
        $data=[];
        foreach($product as $d) {
          \array_push($data,$d['name']);
        }
     return   $product=array_unique($data);
    }
   
    public static function get_category($id)
    {
        return categ::find($id)->get();
    }
 
}
