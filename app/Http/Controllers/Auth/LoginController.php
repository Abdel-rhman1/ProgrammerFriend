<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Route;
use Validator;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function save(Request $res , ){
        $val = Validator::make($res->all(),[
            'email'=> 'bail|required',
            'password' => 'required|min:6',
        ],[
            'email.required' => 'mail is required',
            //'email.email' =>'email must contain @ and .' ,
            'password.required'=>'password is required',
            'password.min'=>'password must be greater than 6 characters',
        ]);
        if($val->fails()){
            return redirect()->back()->witherrors($val)->withInputs($res->all());
        }
        
        if(Auth::guard('member')->attempt(['email'=> $res->email , 'password'=> $res->password])){
          session(['Useremail' => Auth::guard('member')->user()->ID]);
          return view('front.index');
        }
        else{
            return "Failed22";
            return back()->withInput($res->only('email'));
        }
    }
}
