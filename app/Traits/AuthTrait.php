<?php

namespace App\Traits;

use App\Traits\GeneralTrait;
use Validator;

trait AuthTrait
{
    use GeneralTrait;
  
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function Login( $request,$gurdgest){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
          
          return $this->returnError(422,$validator->errors());
        }
        if (! $token = auth($guard=$gurdgest)->attempt($validator->validated())) {
          
          return $this->returnError(401,'Unauthorized');
        }
        return $this->createNewToken($token,$gurdgest);
    }
    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register( $request ,$tableName,$model) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:'.$tableName,
            'phoneNumber' => 'required',
            'Adress'=>'required',
            'password' => 'required|string|confirmed|min:6',
        ]);
        if($validator->fails()){
       
          return $this->returnError(400,$validator->errors()->toJson());
        }
        $data = $model::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));
      
     return $this->returnData('data', $data , " successfully registered");
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout($gurdgest) {
        auth($guard=$gurdgest)->logout();
      
        return $this->returnSuccessMessage( " successfully signed out",  "200");
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh($gurdgest) {
        return $this->createNewToken(auth($guard=$gurdgest)->refresh());
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile($gurdgest) {
       
        return $this->returnData('data',auth($guard=$gurdgest)->user());
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token,$gurdgest){
      
        return   $this->returnData('trader_token',[
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth($guard=$gurdgest)->factory()->getTTL() * 60,
            'trader' => auth($guard=$gurdgest)->user()
        ], "User successfully registered");
    }
}