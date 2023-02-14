<?php
namespace App\classes;

use app\Models\Category;
use app\Models\Product as Prod;
use app\Models\Trader;

class Product
{
   
    public $name;
    public $price;
    public $trader_id;
    public $category_id;
    public function __construct($name, $price, $trader_id, $category_id)
    {
      
        $this->name = $name;
        $this->price = $price;
        $this->trader_id = $trader_id;
        $this->category_id = $category_id;
    }
    public function Add(){
        $product = Prod::create([
            "name"=> $name,
            "price"=> $price,
            "trader_id"=> $trader_id,
            "category_id"=> $category_id
            
        ]);
    }
    public function Edit($id){
        $product = Prod::where('id', $id)->update([
            "name"=> $name,
            "price"=> $price,
            "trader_id"=> $trader_id,
            "category_id"=> $category_id
        ]

        );
     
    }
    public static function get_category($category_id)
    {
        return Category::find($category_id)->select('name')->get();
    }
    public static function get_trader($trader_id)
    {
        return Trader::find($trader_id)->select('name', 'Adress')->get();
    }
    public static function get_all_product()
    {
        $product = Prod::all();

        return $product;
    }
    public static function get_product_name(){
        $product = Prod::select('name')->get()->toArray();
        $data=[];
        foreach($product as $d) {
          \array_push($data,$d['name']);
        }
        $product=array_unique($data);
    } 

    public static function get_product_with_id($id)
    {
        return Prod::find($id)->get();
    }
    public static function get_products_with_name($name)
    {
        return Prod::with(['trader'=>function($q){
            $q->select('Adress','id');
        }])->where('name',$name)->get();
    }
 
}
