<?php

namespace App\Http\Controllers\Trader;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trader;
use Validator;
use Auth;
class AuthController extends Controller
{
    
   
   
    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function showregister(){
        return view('Admin.auth.register');
    }
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:traders',
            'phoneNumber' => 'required',
            'lat'=>'required',
            'lang'=>'required',
            'password' => 'required|string|confirmed|min:6',
        ]);
      dd('ali');
        $trader = Trader::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));
               
                Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password]);
                $request->session()->regenerate();
                return redirect('/');
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
   
   
  
    function showloginform(){
        if(Auth::guard('web')->check()){
            return redirect('/');
        }
        return view('Admin.auth.login');
    }
    function login(Request $request){
        $validated = $request->validate([
            'phoneNumber' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard('web')->attempt($validated)) {
            $request->session()->regenerate();
 
          
        }
        return redirect('/');
    }
  
    function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
        return redirect('login');
    }
}