<?php

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

Route::group(['middleware' => 'auth'], function() {
    Route::resource('/admin','HomeController') ;
    Route::get('slide/', function () { return view('admin/index');  });
    Route::get('service/', function () { return view('admin/index'); });
    Route::get('skill/', function () {  return view('admin/index');  });
    Route::get('description/', function () {  return view('admin/index');  });
    Route::get('message/', function () {  return view('admin/index');  });
    Route::get('about/', function () {  return view('admin/index');  });
    Route::get('client/', function () {  return view('admin/index');  });
    Route::get('team/', function () {  return view('admin/index');  });
    Route::get('produk/', function () {  return view('admin/index');  });
    Route::get('web_setting/', function () {  return view('admin/index');  });
    Route::resource('profile','ProfileController');
});

Route::get('/', function () {
    $web = App\WebName::first() ;
    $about_us = \App\Description::where('type','about_us')->first() ;
    $service = \App\Description::where('type','service')->first() ;
    $skill = \App\Description::where('type','skill')->first() ;
    $team = \App\Description::where('type','team')->first() ;
    $call_action = \App\Description::where('type','call_action')->first() ;
    $desc = \App\Description::where('type','desc')->first() ;
    $contact = \App\Description::where('type','contact')->first() ;
    return view('index', compact('web','about_us','skill','team','service','call_action','desc','contact'));
});

Route::get('login/', function () {
    $web = App\WebName::first() ;
    return view('index', compact('web'));
});

Auth::routes();

Route::resource('/message','MessageController', [ 'only' => ['store','show']]) ;

Route::get('/home', 'HomeController@index')->name('home');
