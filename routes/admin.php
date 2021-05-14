<?php

use Illuminate\Support\Facades\Route;

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



Route::group(['prefix'=>'dashboard'], function(){
    Route::get('/' , function(){
//        return view('');
        return view('backend.index');
    });

    Route::group(['prefix'=>'Member' , 'middleware'=>'auth'] , function(){
        Route::get('/' , 'MemberController@index')->name('get.members');
        Route::get('add' , 'MemberController@add')->name('Member.add');
        Route::post('store' , 'MemberController@store')->name('member.store');
        Route::get('edit/{id}' , 'MemberController@edit')->name('member.edit');
        Route::post('update' , 'MemberController@update')->name('member.update');
        Route::get('delete/{id}' , 'MemberController@delete')->name('member.delete');
    });

    Route::group(['prefix'=>'Items' , 'middleware'=>'auth'] , function(){
        Route::get('index/{id}' , 'ItemController@index')->name('get.Items');
        Route::get('add' ,'ItemController@add' )->name('add.Items');
        Route::post('store' ,'ItemController@store')->name('Item.store');
        Route::get('edit/{id}' ,'ItemController@edit')->name('item.edit');
        Route::post('update' , 'ItemController@update')->name('item.update');
        Route::get('delte/{id}' ,'ItemController@delete')->name('item.delete');
    });
    Route::group(['prefix'=>'Skills' , 'middleware'=>'auth'] , function(){
        Route::get('index' , 'SkillController@index')->name('getSkills');
        Route::get('add' , 'SkillController@add')->name('addNewSkill');
        Route::post('store' , 'SkillController@store')->name('soteSkill');
        Route::get('edit/{id}' , 'SkillController@edit')->name('editSkill');
        Route::post('update' , 'SkillController@update')->name('updateSkill');
        Route::get('/delete/{id}' , 'SkillController@delete')->name('deleteSkill');
        Route::post('get' , 'SkillController@getSuffix')->name('getSuffix');
    });
    Route::group(['prefix'=>'Jobs' , 'middleware'=>'auth'] , function(){
        Route::get('index', 'JobController@index')->name('job.index');
        Route::get('add' , 'JobController@add')->name('job.add');
        Route::get('edit/{id}' , 'JobController@edit')->name('job.edit');
        Route::post('store' ,'JobController@store')->name('job.store');
        Route::post('update' , 'JobController@update')->name('job.update');
        Route::get('delete/{id}' , 'JobController@delete')->name('job.delete');
    });
    Route::group(['middleware'=>'auth' , 'prefix'=>'course'] , function(){
        Route::get('index' , 'CourseController@index')->name('getall');
        Route::get('add' , 'CourseController@add')->name('add.course');
        Route::post('store' , 'CourseController@store')->name('course.store');
        Route::get('edit/{id}' , 'CourseController@edit')->name('course.edit');
        Route::post('update' , 'CourseController@update')->name('course.update');
        Route::get('delete/{id}' ,'CourseController@delete')->name('course.delete');
    });
    Route::group(['middleware'=>'auth' , 'prefix'=>'stat'] , function(){
        Route::get('index' , 'StatController@index')->name('getstat');
    });
}); 

//Route::get('/login' , 'LoginController@login')->name('login');
//Route::post('/check' , 'LoginController@check')->name('login.admin');
