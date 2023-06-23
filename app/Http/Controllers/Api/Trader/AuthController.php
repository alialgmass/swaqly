<?php

namespace App\Http\Controllers\Api\Trader;

use App\Traits\GeneralTrait;
use App\Http\Controllers\Controller;
use App\classes\Trader as TraderClass;
use Illuminate\Http\Request;
use App\Models\Trader;
use Validator;

class AuthController extends Controller
{
    use GeneralTrait;

   
    public function __construct() {
       $this->middleware('AssignGuard:api-trader', ['except' => ['login', 'register']]);
      
    }
   
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
          
          return $this->returnError(422,$validator->errors());
        }
        if (! $token = auth($guard='api-trader')->attempt($validator->validated())) {
          
          return $this->returnError(401,'Unauthorized');
        }
        return $this->createNewToken($token);
    }
    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:traders',
            'phoneNumber' => 'required',
            'lat'=>'required',
            'lang'=>'required',
            'password' => 'required|string|confirmed|min:6',
        ]);
        if($validator->fails()){
       
          return $this->returnError(400,$validator->errors()->toJson());
        }
        $trader = Trader::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));
      
     return $this->returnData('trader', $trader , "trader successfully registered");
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth($guard='api-trader')->logout();
      
        return $this->returnSuccessMessage( "trader successfully signed out",  "200");
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth($guard='api-trader')->refresh());
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function traderProfile() {
       
        return $this->returnData('trader',auth($guard='api-trader')->user(), "trader successfully registered");
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
      
        return   $this->returnData('trader_token',[
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth($guard='api-trader')->factory()->getTTL() * 60,
            'trader' => auth($guard='api-trader')->user()
        ], "Trader successfully registered");
    }
}