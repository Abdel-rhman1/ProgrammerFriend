<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Route;
use Validator;
use Closure;
class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
      return view('auth.admin_login');
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
        session(['adminemail' => Auth::guard('member')->user()->ID]);
        return view('backend.index');
      }else if (Auth::attempt(['email'=> $res->email , 'password'=> $res->password])){
        return ;
      }
      else{
        return "Failed";
          return back()->withInput($res->only('email'));
      }
      
  }
    
    public function logout()
    {
        Auth::guard('member')->logout();
        return redirect('/admin');
    }
}
