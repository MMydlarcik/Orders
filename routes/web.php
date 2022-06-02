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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function () {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
        
    });

    Route::group(['middleware' => ['auth']], function () {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        /**
         * Order Routes
         */
        Route::post('/orders/create', 'OrderListController@store')->name('orders.store');
        Route::get('/orders/create', 'OrderListController@create')->name('orders.create');
        Route::post('/orders/destroy', 'OrderListController@destroy')->name('orders.destroy');
        Route::get('/orders/{id}/edit', 'OrderListController@edit')->name('orders.edit');
        Route::post('/orders/update', 'OrderListController@update')->name('orders.update');
        Route::get('/orders/{id}', 'OrderListController@order')->name('orders.order');
        Route::get('/orders', 'OrderListController@orderList')->name('orders.orders');
        /**
         * User Routes
         */
        Route::get('/users', 'UserListController@userList')->name('users.users');
    });
});
