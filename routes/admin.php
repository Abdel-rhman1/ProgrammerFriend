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
        Route::get('/' , 'ItemController@index')->name('get.Items');
        Route::get('add' ,'ItemController@add' )->name('Items.add');
        Route::post('store' ,'ItemController@store')->name('Item.store');
        Route::get('edit/{id}' ,'ItemController@edit')->name('item.edit');
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

});

//Route::get('/login' , 'LoginController@login')->name('login');
//Route::post('/check' , 'LoginController@check')->name('login.admin');
