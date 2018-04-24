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

Auth::routes();


Route::group(['middleware'=> ['admin', 'https']], function(){
    Route::get('/home', 'UserController@index')->name('home');

    Route::get('/transferVC','UserController@transferInterface')->name('transferVC');

//    Route::post('/transferVC','UserController@transferVC');

    Route::resource('/transferlog', 'TransactionLogController',['names'=>[

        'index'=>'transferlog.index',
        'create'=>'transferlog.create',
        'store'=>'transferlog.store',
        'edit'=>'transferlog.edit'

    ]]);

});
