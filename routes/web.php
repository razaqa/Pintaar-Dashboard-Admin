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

Route::get('/dashboard', function () {
    return view('dashboard.home');
});

Route::get('/charts', function () {
    return view('dashboard.charts');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
  Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('home', 'DashboardController@index')->name('home');
    Route::group(['prefix' => 'chart', 'as' => 'chart.'], function () {
      Route::get('user', 'DashboardController@totalUserChart')->name('user');
      Route::get('revenue', 'DashboardController@revenueChart')->name('revenue');
      Route::get('checkout', 'DashboardController@abandonCheckoutChart')->name('checkout');
      Route::get('order', 'DashboardController@averageOrderChart')->name('order');
      Route::get('transaction', 'DashboardController@totalTransactionChart')->name('transaction');
      Route::get('paid', 'DashboardController@paidUserChart')->name('paid');
    });
  });
  Route::group(['prefix' => 'data', 'as' => 'data.'], function () {
    Route::get('user/{startDate}/{endDate}', 'ChartDataController@totalUser')->name('user');
    Route::get('revenue/{startDate}/{endDate}', 'ChartDataController@revenue')->name('revenue');
    Route::get('checkout/{startDate}/{endDate}', 'ChartDataController@abandonCheckout')->name('checkout');
    Route::get('order/{startDate}/{endDate}', 'ChartDataController@averageOrder')->name('order');
    Route::get('transaction/{startDate}/{endDate}', 'ChartDataController@totalTransaction')->name('transaction');
    Route::get('paid/{startDate}/{endDate}', 'ChartDataController@paidUser')->name('paid');
  });
  Route::get('login', 'Auth\LoginController@showAdminLoginForm')->name('login.form');
  Route::get('register', 'Auth\RegisterController@showAdminRegisterForm')->name('register.form');
  Route::post('login', 'Auth\LoginController@loginAdmin')->name('login.post');
  Route::post('register', 'Auth\RegisterController@createAdmin')->name('register.post');
});
