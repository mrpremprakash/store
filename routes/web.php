<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/medicines', 'MedicineController@index');
Route::get('/members', 'MemberController@index');
Route::resource('store', 'StoreController');
Route::resource('store_utility', 'UtilityController');
Route::group(['middleware' => 'auth'], function()
{
    Route::resource('shop_medicine', 'Shop_medicineController');
});

Route::resource('invoice', 'InvoiceController');

Route::get('/invoice', function () {
    return view('pages.invoice');
});
Route::get('/customers', function () {
    return view('pages.customers');
});
Route::get('/profile', function () {
    return view('pages.profile');
});
Route::get('/expiry_alert', function () {
    return view('pages.expiry_alert');
});
Route::post('/update-store/{id}','StoreController@update');

Route::group(['prefix' => 'api'], function () {
    Route::get('/store', 'ApiController@index');
    Route::get('/medicine', 'ApiController@get_medicine_list');
    Route::get('/store/{slug}', 'ApiController@get_store_by_slug');
    Route::get('/update_database', 'ApiController@update_database');
    Route::post('/post_store', 'ApiController@post_store');
    Route::get('/csrf', function() {
    return Session::token();
});
});

Route::get('harvest_store', 'UtilityController@harvest_store');
Route::post('harvest_store', 'UtilityController@post_harvest_store');