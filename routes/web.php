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

Route::get('/', 'HomeController@index');

Route::get('/login', 'Auth\LoginController@index');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/register', 'Auth\RegisterController@index');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::get('logout', 'Auth\LoginController@logout');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', 'admin\AdminController@index') ->name('dashboard');
    Route::resource('category', 'admin\CategoryController');
    Route::resource('product', 'admin\ProductController');
    Route::resource('size', 'admin\SizeController');
    Route::resource('bill', 'admin\BillController');
    Route::resource('customer', 'admin\CustomerController');
    Route::resource('quantity', 'admin\CustomerController');
});
Route::get('/', 'PageController@getProduct');

Route::get('category/{key}', 'PageController@getAllCategories');
Route::match(['get', 'post'], '/detailProduct/{id_name}', 'PageController@getDetail');
// Route::post('/detailProduct/{id}?size=', 'PageController@getDetail');
Route::get('search', 'PageController@search')->name('search');

Route::get('manageOrder', 'PageController@manageOrder')->middleware('auth')->name('manageOrder');
Route::get('cancelOrder/{id}', 'PageController@cancelOrder')->middleware('auth');
Route::get('showCart', 'CartController@index');
Route::post('up', 'CartController@up');
Route::post('down', 'CartController@down');
Route::post('addCart', 'CartController@cart');
Route::match(['get', 'post'], 'remove', 'CartController@remove');


Route::get('formCustomer', 'PaymentController@getFormCustomers')->middleware('auth');
Route::get('formCustomerVnPay', 'VnPayController@getFormCustomersVnPay')->middleware('auth');
Route::post('/payment', 'PaymentController@payment')->name('payment')->middleware('auth');
Route::get('paySuccess', 'PaymentController@paySuccess')->name('paySuccess')->middleware('auth');
Route::post('vnPayment', 'VnPayController@payment')->middleware('auth');
Route::get('vnpay', 'VnPayController@vnpay')->name('vnpay')->middleware('auth');

