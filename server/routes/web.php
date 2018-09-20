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

// Users Controller 
Route::get('/user/view', 'UsersController@userViewingSite');

Route::get('/user/setting', 'UsersController@userSettingSite');

Route::post('user/setting/name', 'UsersController@userSettingNameChange');

Route::post('user/setting/password', 'UsersController@userSettingPasswordChange');

Route::post('user/setting/image', 'UsersController@userSettingImageChange');

Route::post('user/setting/address', 'UsersController@userSettingAddressChange');

// Goods Controller
Route::get('/goods/view', 'GoodsController@goodsViewingSite');

Route::post('/goods/buy', 'GoodsController@goodsBuying');

Route::get('/goods/add', 'GoodsController@goodsAddingSite');

Route::post('/goods/add', 'GoodsController@goodsAdding');

Route::get('/goods/edit/{goodsID}', 'GoodsController@goodsEditingSite');

Route::post('/goods/edit', 'GoodsController@Auth::user()->point');

// User Require Controller
Route::get('user_require/confirm', 'UserRequiresController@userRequireConfirmSite');

Route::get('user_require/delete/{singleRequireID}', 'UserRequiresController@requireDelete');

Route::get('user_require/goodsConfirm/{singleRequireID}', 'UserRequiresController@requireConfirm');

Route::get('user_require/goodsConfirmAll', 'UserRequiresController@requiresConfirmAll');



// ************************** ADMIN SITE ************************** \\
// ************************** ADMIN SITE ************************** \\
// ************************** ADMIN SITE ************************** \\
// ************************** ADMIN SITE ************************** \\
// ************************** ADMIN SITE ************************** \\
// ************************** ADMIN SITE ************************** \\
// ************************** ADMIN SITE ************************** \\

// Building Controller
Route::get('/admin/building', 'AdminBuildingsController@allBuildingsSite');

Route::get('/admin/building/add', 'AdminBuildingsController@addBuildingSite');

Route::post('/admin/building/add', 'AdminBuildingsController@addBuilding');

Route::get('/admin/building/edit/{buildingID}', 'AdminBuildingsController@editBuildingSite');

Route::post('/admin/building/edit', 'AdminBuildingsController@editBuilding');

Route::get('/admin/building/delete/{buildingID}', 'AdminBuildingsController@deleteBuilding');

// Market Controller
Route::get('/admin/market', 'AdminMarketsController@allmarketsSite');

Route::get('/admin/market/add', 'AdminMarketsController@addMarketSite');

Route::post('/admin/market/add', 'AdminMarketsController@addMarket');

Route::get('/admin/market/edit/{marketID}', 'AdminMarketsController@editMarketSite');

Route::post('/admin/market/edit', 'AdminMarketsController@editMarket');

Route::get('/admin/market/delete/{marketID}', 'AdminMarketsController@deleteMarket');