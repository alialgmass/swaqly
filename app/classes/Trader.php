<?php

namespace App\classes;

use App\Models\Trader as Trad;

class Trader extends Person
{

    public function __construct($name, $Adress, $email, $phoneNumber)
    {
        $this->name = $name;
        $this->Adress = $Adress;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
    }
 public  static function login($validator){
    $token = auth($guard='api-trader')->attempt($validator->validated());
    return createNewToken($token);
 }
 public  static  function createNewToken($token){
    return   [
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth($guard='api-trader')->factory()->getTTL() * 60,
        'trader' => auth($guard='api-trader')->user()
    ];
 }
 public static  function register($validator,$password){
    $trader = Trad::create(array_merge(
        $validator->validated(),
        ['password' => bcrypt($password)]
    ));
    return True;
 }
 public  static function logout(){
    auth($guard='api-trader')->logout();
 }
 public  static function refresh(){
    return createNewToken(auth($guard='api-trader')->refresh());
 }
 public static  function Profile(){
    return auth($guard='api-trader')->user();
 }
 
}
