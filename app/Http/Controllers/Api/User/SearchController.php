<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Category;
use App\Traits\GeneralTrait;

class SearchController extends Controller
{
//this will get it from front and mobile
   //user $latitude, $longitude in request
  // trader $latitude, $longitude in Db

  //##########################################
  //user $latitude, $longitude
  //earea i will search on it 
  // number of trader 
  // products id
   public function search(Request $request){

   }
   
   function haversineDistance($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'km') {
      $theta = $longitude1 - $longitude2;
      $distance = sin(deg2rad($latitude1)) * sin(deg2rad($latitude2)) +
                  cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta));
      $distance = acos($distance);
      $distance = rad2deg($distance);
      //to convert the distance from radians to miles, you would multiply the distance by 1.1515
      $distance = $distance * 60 * 1.1515;
      if ($unit == 'km') {
          //to convert distance from miles to kilometers, you would multiply the distance by 1.609344
          $distance = $distance * 1.609344;
      }
      return $distance;
  }
    
   

}
