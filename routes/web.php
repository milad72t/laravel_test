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

Route::get('/', function () {
    return view('welcome');
});


Route::get('test',function(){
	return view('test',['name' => 'milad']);
})->name('tt');


Route::get('user/{id?}',function($id='????'){
	return 'Hi '.$id;
})->where('id','[0-9]+'); 

Route::get('response',function(){
	return redirect()->action('TestController@test',['name' => 'miilad' ]);
});
	


Route::get('download',function(){
	return response()->download('/home/milad/Public/other/Wall.jpg','download.jpg');
	//return response()->file('/home/milad/Public/other/Wall.jpg');
});

Route::get('sessionadd/{name}','TestController@sessionadd');
Route::get('sessionget','TestController@sessionget');

Route::get('/sqlsrv','TestController@sqlsrv');
Route::post('/validation','TestController@validateform');


Route::get('db_raw','TestController@db_raw');
Route::get('db_query','TestController@db_query');
Route::get('orm','TestController@orm');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('profile', function () {
    return 'profile';
})->middleware('auth');

Route::get('redis/{key}/{value}','TestController@insert_redis');
Route::get('showredis/{key}','TestController@show_redis');

Route::get('showcomments','TestController@showcomments')->name('showcomments');
Route::get('sentcommentform','TestController@sentcommentform');
Route::post('sentcomment','TestController@sentcomment');
