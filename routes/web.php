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
        Route::post('/orders/store', 'OrderController@store')->name('orders.store');
        Route::get('/orders/create', 'OrderController@create')->name('orders.create');
        Route::post('/orders/destroy', 'OrderController@destroy')->name('orders.destroy');
        Route::get('/orders/{id}/edit', 'OrderController@edit')->name('orders.edit');
        Route::post('/orders/update', 'OrderController@update')->name('orders.update');
        Route::get('/orders/{id}', 'OrderController@order')->name('orders.order');
        Route::get('/orders', 'OrderController@orderList')->name('orders.orders');
        Route::post('/orders/create', 'OrderController@storeItem')->name('orders.storeItem');
        Route::post('/orders/editItem', 'OrderController@editItem')->name('orders.editItem');
        Route::post('/orders/editHistoryItem', 'OrderController@editHistoryItem')->name('orders.editHistoryItem');
        Route::post('/orders/createHistory', 'OrderController@storeHistory')->name('orders.storeHistory');
        /**
         * User Routes
         */
        Route::get('/users', 'UserController@userList')->name('users.users');
        Route::get('/users/{id}', 'UserController@user')->where('id', '[0-9]+')->name('users.user');
        Route::post('/users/destroy', 'UserController@destroy')->name('users.destroy');
        Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');
        Route::post('/users/update', 'UserController@update')->name('users.update');
        Route::post('/users/updatePassword', 'UserController@updatePassword')->name('users.updatePassword');
        Route::get('/users/create', 'UserController@create')->name('users.create');
        Route::post('/users/create', 'UserController@store')->name('users.store');
    
    });
});
