<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('front.index');
//    $hashed = Hash::make('1', [
//        'rounds' => 12,
//        ]);
//    return $hashed;
})->middleware('auth');
Route::get('locale/{locale}' , function($locale){
    Session::put('locale' , $locale); // put the argumented language  in the session to put assign it to App::setLocale
    // that is required for every route in web file;
    return redirect()->back();
})->name('locale')->middleware('auth');

Route::group(['middleware'=>'auth' , 'prefix'=>'prog'] , function(){
    Route::get('all' , 'MemberController@all')->name('allProg');
}); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
