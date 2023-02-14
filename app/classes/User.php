<?php
namespace App\classes;
use App\Models\User as Us;
class User extends Person{

    public function __construct($name, $Adress, $email, $phoneNumber)
    {
        $this->name = $name;
        $this->Adress = $Adress;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
    }
 public  static function login($validator){
    $token = auth($guard='api-user')->attempt($validator->validated());
    return createNewToken($token);
 }
 public  static function createNewToken($token){
    return  [
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth($guard='api-user')->factory()->getTTL() * 60,
        'user' => auth($guard='api-user')->user()
    ];
 }
 public static  function register($validator,$password){
    $user = Us::create(array_merge(
        $validator->validated(),
        ['password' => bcrypt($password)]
    ));
    return True;
 }
 public   static function logout(){
    auth($guard='api-user')->logout();
 }
 public  static function refresh(){
    return createNewToken(auth($guard='api-user')->refresh());
 }
 public  static function Profile(){
    return auth($guard='api-user')->user();
 }
}