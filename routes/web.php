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

Route::get('/', function () {
    return view('landingpage');
});

Route::group(['prefix' => 'lp', 'as' => 'lp.'], function () {
    Route::get('/', 'LandingPageController@index')->name('index');

    //bos section
    Route::get('/dashboardbos', 'LandingPageController@dashboardbos')->name('dashboardbos');
    Route::get('/transaksibos', 'LandingPageController@transaksibos')->name('transaksibos');
    Route::get('/produkbos', 'LandingPageController@produkbos')->name('produkbos');

    //staff section
    Route::get('/dashboardstaff', 'LandingPageController@dashboardstaff')->name('dashboardstaff');
    Route::get('/transaksistaff', 'LandingPageController@transaksistaff')->name('transaksistaff');
    Route::get('/produkstaff', 'LandingPageController@produkstaff')->name('produkstaff');

    Route::get('/profile/{id}', 'LandingPageController@profile')->name('profile');
    Route::get('/daftar', 'LandingPageController@daftar')->name('daftar');
});

Route::group(['prefix' => 'home', 'as' => 'home.'], function () {
    Route::get('/index', 'HomeController@index')->name('index');
    Route::get('/bosPage', 'HomeController@bosPage')->name('bosPage');
    Route::get('/show', 'HomeController@show')->name('show');
    Route::get('/edit/{id}', 'HomeController@edit')->name('edit');
    Route::get('/login', 'HomeController@login')->name('login');
    Route::post('/loginPost', 'HomeController@loginPost')->name('loginPost');
    Route::post('/destroy/{id}', 'HomeController@destroy')->name('destroy');
    Route::post('/store', 'HomeController@store')->name('store');
    Route::post('/update', 'HomeController@update')->name('update');
    Route::get('/logout', 'HomeController@logout')->name('logout');
});

Route::group(['prefix' => 'proses', 'as' => 'proses.'], function () {
    //transaksi
    Route::get('/index', 'ProsesController@index')->name('index');
    Route::get('/addTrans', 'ProsesController@addTrans')->name('addTrans');
    Route::get('/addProduk', 'ProsesController@addProduk')->name('addProduk');
    Route::post('/storeTrans', 'ProsesController@storeTrans')->name('storeTrans');
    Route::get('/edit/{id}', 'ProsesController@edit')->name('edit');
    Route::get('/destroy/{id}', 'ProsesController@destroy')->name('destroy');
    Route::post('/update', 'ProsesController@update')->name('update');

    //produk
    Route::get('/prodList', 'ProsesController@prodList')->name('prodList');
    Route::get('/addProduk', 'ProsesController@addProduk')->name('addProduk');
    Route::post('/storeProduk', 'ProsesController@storeProduk')->name('storeProduk');
    Route::get('/editProd/{id}', 'ProsesController@editProd')->name('editProd');
    Route::get('/destroyProd/{id}', 'ProsesController@destroyProd')->name('destroyProd');
    Route::post('/updateProd', 'ProsesController@updateProd')->name('updateProd');

});
