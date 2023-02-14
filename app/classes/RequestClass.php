<?php
namespace App\classes;
use Product;
class RequestClass {
   public $products_name;
   public $user_adress;
   public $number_of_traders;
 
    public function __construct($products_name, $user_adress, $number_of_traders)
    {
        $this->products_name = $products_name;
        $this->user_adress = $user_adress;
        $this->number_of_traders = $number_of_traders;
       
    }
    public function get_products_with_same_name(){
        $data=[];
        foreach ($products_name as $product) {
          array_push($data,[Product::get_products_with_name($product)]) ;
        }
        return $data;
    }
    
 
}