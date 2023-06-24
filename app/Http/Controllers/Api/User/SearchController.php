<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Trader;
use App\Traits\GeneralTrait;
use DB;
use Illuminate\Http\Request;

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

            )->get()->toArray();

      
        $prod = [];
        foreach ($traders as $trad) {

            foreach ($trad['product'] as $p) {
                if (in_array($p['name'], $names)) {
                    if (array_key_exists($p['name'], $prod)) {
                        array_push($prod[$p['name']], ["price" => $p['price'],
                        "name"=>$p['name'],
                            "trader_id" => $trad['id'],
                            "id" => $p['id']]);
                    } else {
                        $prod[$p['name']] = [

                            ["price" => $p['price'],
                            "name"=>$p['name'],
                                "trader_id" => $trad['id'],
                                "id" => $p['id']]];
                    }
                }

            }
        }

$min_price=[];
$total=0;
foreach($names as $name){
  $min=999999999999999999999999999999999999999999999999999;
  $minname;
  if(isset($prod[$name])){
foreach($prod[$name] as $p){
  if($p['price']<$min){
   $min=$p['price'];
$minname=$p;
  }
 
}
array_push($min_price,$minname);
$total+=$min;
  }
}



        return $this->returnData('products', [$min_price,'total'=>$total]);
    }
}
