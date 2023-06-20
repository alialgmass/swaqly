<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Trader;
use App\Models\Category;
use App\Traits\GeneralTrait;
use Illuminate\Contracts\Database\Eloquent\Builder;
use DB;

class SearchController extends Controller
{
  use GeneralTrait;

  public function search(Request $request)
  {
    $names = explode(',', $request->input('names'));
    $userLng = $request->lang;
    $userLat = $request->lat;
    $radius = $request->distance;



    $traders = Trader::select('id', DB::raw("( 3959 * acos( cos( radians($userLat) ) * cos( radians( lat ) ) * cos( radians( lang ) - radians($userLng) ) + sin( radians($userLat) ) * sin( radians( lat ) ) ) ) AS distance"))
      ->having('distance', '<', $radius)
      ->orderBy('distance')
      ->with(
        'product',
      
      )->get();

    $products = [];
    $prod = [];
    foreach ($traders as $trader) {
      if (isset($trader->product)) {
        foreach ($trader->product as $p) {
          if(in_array($p->name,$names)){
           //  array_push($products, ["name" => $p->name, "price" => $p->price, "trader_id" => $trader->id, 'trader_dictance' => $trader->distance]);
           if (array_key_exists($p->name, $prod))
           {
            array_push($prod[$p->name], ["price" => $p->price,
            "trader_id" => $trader->id, 
            'trader_dictance' => $trader->distance]);
           }
           else
           {
            $prod[$p->name]=[
             
            ["price" => $p->price,
             "trader_id" => $trader->id, 
             'trader_dictance' => $trader->distance]];
           }
          
         
        }
      }

    }

    return $this->returnData('products', $prod);
  }






}
}