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
    return view('welcome');
});

Auth::routes();
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
	Route::get('/', 'HomeController@index')->name('index');
	Route::resource('category', 'CategoryController');
	Route::resource('product', 'ProductController');
	Route::resource('brand', 'BrandController');
	Route::resource('producttype', 'ProductTypeController');
	Route::resource('company', 'CompanyController');
	Route::resource('metatag', 'MetaTagController');
	Route::resource('unit', 'UnitController');
	Route::get('/get-product', 'CategoryPageController@Pageproduct')->name('list-product');
	Route::get('/data', 'CategoryPageController@Categoryproduct')->name('pageproduct');
	Route::get('/report', 'CategoryPageController@Report')->name('report');
	Route::get('/get-category', 'CategoryPageController@category')->name('categorys');
});


