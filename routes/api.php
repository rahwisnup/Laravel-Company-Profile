<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('/intro','SlideController', [
    'except' => ['create','edit']
]) ;
Route::post('intro/updatedata/','SlideController@updatedata')->name('intro.updatedata')   ;

Route::resource('/service','ServiceController', [
    'except' => ['create','edit','show']
]) ;

Route::resource('/skill','skillController', [
    'except' => ['create','edit','show']
]) ;

Route::resource('/description','DescController', [
    'except' => ['create','edit','show','store','delete']
]) ;

Route::resource('/message','MessageController', [
    'except' => ['create','edit','show','store','delete']
]) ;
Route::get('/message/read/{id}', 'MessageController@read')->name('message.read') ;
Route::post('/message/delleteAll', 'MessageController@delleteAll')->name('message.delleteAll') ;

Route::resource('/about','AboutController', [
    'except' => ['create','edit','show']
]) ;
Route::post('about/updatedata/','AboutController@updatedata')->name('about.updatedata')   ;

Route::resource('/client','ClientController', [
    'except' => ['create','edit','show']
]) ;
Route::post('client/updatedata/','ClientController@updatedata')->name('client.updatedata')   ;

Route::resource('/team','TeamController', [
    'except' => ['create','edit','show']
]) ;
Route::post('team/updatedata/','TeamController@updatedata')->name('team.updatedata')   ;

Route::resource('/produk','ProductController', [
    'except' => ['create','edit','show']
]) ;
Route::post('produk/updatedata/','ProductController@updatedata')->name('produk.updatedata')   ;

Route::get('/web','NameWebController@index') ;
Route::post('web/updatedata/','NameWebController@updatedata')->name('web.updatedata')   ;

Route::get('/web','NameWebController@index') ;
Route::post('web/updatedata/','NameWebController@updatedata')->name('web.updatedata')   ;

// Route::resource('/profile','ProfileController') ;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
