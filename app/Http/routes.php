<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Entity\Member;

Route::group(['prefix' => 'index'], function () {
    Route::get('/', 'View\IndexController@toIndex');
	
});

Route::get('/login', 'View\LoginController@toLogin');


Route::get('/register', 'View\LoginController@toRegister');

Route::any('service/validate_code/create', 'Service\ValidateController@create');
Route::any('service/validate_phone/send', 'Service\ValidateController@sendSMS');
Route::any('service/validate_email', 'Service\ValidateController@validateEmail');
Route::post('service/register', 'Service\LoginController@register');
