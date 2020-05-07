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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('login', array('uses' => 'HomeController@login'));
//Route::post('login', array('uses' => 'HomeController@startLogin'));

Route::get('logout', array('uses' => 'HomeController@logout'));


Route::get('add', array('uses' => 'HomeController@add'));
Route::post('add', array('uses' => 'HomeController@addProduct'));

Route::get('edit/{id}', array('uses' => 'HomeController@edit'));
Route::post('edit/{id}', array('uses' => 'HomeController@editProduct'));


Route::get('delete/{id}', array('uses' => 'HomeController@deleteTestimonialUsingProcedure'));

Route::get('/view/{id}', 'HomeController@getProduct');


Route::get('/account', 'HomeController@account');
Route::post('/account', 'HomeController@addImage');