<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
class LoginController extends Controller
{
    public function login(){
        return view('backend.Auth.login');

    }
    public function check(Request $request ){
        $user = DB::table('users')->select('select name from users where email = ?', [$request->email]);
        return $user;
    }
    public function logout(){

    }
}
