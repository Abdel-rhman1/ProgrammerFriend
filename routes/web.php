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
})->name('locale');
Route::get('/User.login' , function(){
    return view('auth.user_login');
})->name('user.login');
Route::post('login/user' , 'Auth\LoginController@save')->name('login.user');
Route::group(['prefix'=>'prog'] , function(){
    Route::get('all' , 'MemberController@all')->name('allProg');
    Route::get('getBycountry/{CountryID}' , 'MemberController@getByCountry')->name('getbyCountry');
    Route::get('/getBySkill/{skill}' , 'MemberSkillController@check')->name('getBasedOnSkill');
    Route::get('/getBydepart/{cat}' , 'MemberController@getBasedOnDepart')->name('BasedOnRole');
    Route::get('/profile/{id}' , 'MemberController@showprofile')->name('Profile');
    Route::post('/ShowMemberByName' , 'MemberController@showByName')->name('ShowMemberByName');
    Route::post('/ShowMemberByJob' , 'MemberController@showByJob')->name('ShowMemberByjob');
    Route::post('/getphoto' , 'MemberController@getavatar')->name('getavatar');
    
}); 

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'Items'] , function(){
    Route::get('index/{id}/{Name?}' , 'ItemController@getByCat')->name('getById');
    Route::get('show/{id}' , 'ItemController@showItemPage')->name('showProject');
    Route::post('increament' ,'ItemController@IncreaemntLikes')->name('Increament');
    Route::post('/getBySkill' , 'ItemController@getBasedOnSkill')->name('getbasedOnName');
    Route::get('/getBydate/{date}' , 'ItemController@getBasedOnDate')->name('getBasedOnDate');
    Route::post('/showItemByName' , 'ItemController@ShowByName')->name('ShowItemByName');
    Route::get('/addNewItem' , 'ItemController@addnewItem')->name('addNewItem');
});
Route::group(['prefix'=>'course' , 'namespace'=>'front'] , function(){
    Route::get('index' , 'CourseController@index')->name('Course.index');
    Route::get('byDepart/{id}' , 'CourseController@getByDepartment')->name('BasedOnDepart');
    Route::get('/show/{id}' , 'CourseController@showCourse')->name('showCourse');
    Route::post('/show' , 'CourseController@showByprice')->name('showByprice');
    Route::post('/showbyCat' , 'CourseController@showByCat')->name('showByCat');
    Route::post('/showbyCat' , 'CourseController@showByCat')->name('showByCat');
    Route::post('/showbyName' , 'CourseController@showByName')->name('showByName');
    Route::get('/ShowCourseProfil/{id}' , 'CourseController@showCourseProfile')->name('course.profile');
    Route::get('/addNewCourse' , 'CourseController@addnewCourse')->name('addNewCourse');
});
Route::group(['prefix'=> 'Skills'] , function(){
    Route::post('/index' , 'SkillController@indexByName')->name('getByName'); 
    Route::post('/getSkills' , 'SkillController@indexCollection')->name('getSkillscollection');
    
});
Route::group(['prefix'=>'jobs', 'namespace'=>'front'] , function(){
    Route::get('/index' , 'JobController@index')->name('index.job');
    Route::post('searchByFirst' ,'JobController@searchByFirst')->name('SearchByFirst');
});
Route::get('aboutus' , 'HomeController@aboutus')->name('aboutus');

Route::get('/test' , function(){
    dd(Auth::guard('web')->attempt(['email'=>'ahmed32@gmail.com' , 'password'=>'01102053810']));
});