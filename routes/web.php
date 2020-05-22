<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
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

//PageController
Route::get('index', [
    'as' => 'homePage',
    'uses' => 'PageController@getIndex'
]);

Route::get('index/categories-{categories}', [
    'as' => 'categoriesPage',
    'uses' => 'PageController@getCategories'
]);

Route::get('index/categories/{id}', [
    'as' => 'productPage',
    'uses' => 'PageController@getProduct'
]);

Route::get('index/search', [
    'as' => 'searchPage',
    'uses' => 'PageController@getSearch'
]);


//FormController
Route::get('index/register', [
    'as' => 'registerPage',
    'uses' => 'FormController@getRegister'
]);

Route::post('index/register', [
    'as' => 'registerPage',
    'uses' => 'FormController@postRegister'
]);

Route::get('index/signin', [
    'as' => 'signinPage',
    'uses' => 'FormController@getSignin'
]);

Route::post('index/signin', [
    'as' => 'signinPage',
    'uses' => 'FormController@postSignin'
]);

Route::get('index/signout', [
    'as' => 'signoutPage',
    'uses' => 'FormController@getSignout'
]);

Route::get('index/update', [
    'as' => 'updatePage',
    'uses' => 'FormController@getUpdate'
]);

Route::post('index/update', [
    'as' => 'updatePage',
    'uses' => 'FormController@postUpdate'
]);

//CartController
Route::get('/list-cart', [
    'as' => 'listcartPage',
    'uses' => 'CartController@getListCart'
]);

Route::get('/deletelistcart/{id}', [
    'as' => 'deletelistcartPage',
    'uses' => 'CartController@getDeleteListCart'
]);

Route::get('/addcart/{id}', [
    'as' => 'addcartPage',
    'uses' => 'CartController@getAddCart'
]);

Route::get('/deleteitemcart/{id}', [
    'as' => 'deleteitemPage',
    'uses' => 'CartController@getDeleteItem'
]);

//CheckController
Route::get('/checkout', [
    'as' => 'checkoutPage',
    'uses' => 'CheckController@getCheckout'
]);

Route::post('/checkout', [
    'as' => 'checkoutPage',
    'uses' => 'CheckController@postCheckout'
]);

