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

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//上記デフォルト

Route::get('/', 'HomeController@index')->name('home');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/confirm', 'ContactController@confirm')->name('confirm');
Route::post('/complete', 'ContactController@complete')->name('complete');
Route::get('/admin.login', 'AdminController@index')->name('admin.login');

Route::post('/admin.manage', 'AdminController@confirm')->name('admin.confirm');

Route::group(['middleware' => ['auth.admin']], function () {	
    Route::get('/admin.manage', 'AdminController@viewList')->name('admin.manage');
    Route::post('/admin.realUpdate', 'AdminController@realUpdate')->name('admin.realUpdate');
    Route::post('/admin.cancel', 'AdminController@cancel')->name('admin.cancel');
    Route::post('/admin.tempUpdate', 'AdminController@tempUpdate')->name('admin.tempUpdate');
    Route::get('/admin.logout', 'AdminController@logout')->name('admin.logout');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
