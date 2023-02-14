<?php
namespace  App\classes;
 abstract class Person{

protected $name;
protected $Adress;
protected $email;
protected $phoneNumber;
protected $verified=false;
abstract public  static function login($validator);
abstract public   function createNewToken($token);
abstract public static  function register($validator,$password);
abstract public   function logout();
abstract public   function refresh();
abstract public   function Profile();



}