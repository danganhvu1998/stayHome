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

Route::get('/home', 'HomeController@index')->name('home');

// UsersController 
Route::get('/user/view', 'UsersController@userViewingSite');

Route::get('/user/setting', 'UsersController@userSettingSite');

Route::post('user/setting/name', 'UsersController@userSettingNameChange');

Route::post('user/setting/password', 'UsersController@userSettingPasswordChange');

Route::post('user/setting/image', 'UsersController@userSettingImageChange');

Route::post('user/setting/address', 'UsersController@userSettingAddressChange');

// ************************** ADMIN SITE ************************** \\
// ************************** ADMIN SITE ************************** \\
// ************************** ADMIN SITE ************************** \\
// ************************** ADMIN SITE ************************** \\
// ************************** ADMIN SITE ************************** \\
// ************************** ADMIN SITE ************************** \\
// ************************** ADMIN SITE ************************** \\

Route::get('/admin/building', 'AdminBuildingsController@allBuildingsSite');

Route::get('/admin/building/add', 'AdminBuildingsController@addBuildingSite');

Route::post('/admin/building/add', 'AdminBuildingsController@addBuilding');



