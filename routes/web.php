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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'clients'], function(){
    Route::get('', 'ClientController@index')->name('client.index');
    Route::get('create', 'ClientController@create')->name('client.create');
    Route::post('store', 'ClientController@store')->name('client.store');
    Route::get('add/{client}', 'ClientController@add')->name('client.add');
    Route::get('minus/{client}', 'ClientController@minus')->name('client.minus');
    Route::post('update/{client}', 'ClientController@update')->name('client.update');
    Route::post('updateAdd/{client}', 'ClientController@updateAdd')->name('client.updateAdd');
    Route::post('updateMinus/{client}', 'ClientController@updateMinus')->name('client.updateMinus');
    Route::post('delete/{client}', 'ClientController@destroy')->name('client.destroy');
    Route::get('show/{client}', 'ClientController@show')->name('client.show');
 });
 