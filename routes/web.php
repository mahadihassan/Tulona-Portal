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
    return view('auth.login');
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
	Route::resource('attributegroups', 'AttributeGroupController');
	Route::resource('attributes', 'AttributeController');
	Route::get('/get-product', 'ProductReportController@Pageproduct')->name('list-product');
	Route::get('/data', 'ProductReportController@Categoryproduct')->name('pageproduct');
	Route::get('/report', 'ProductReportController@Report')->name('report');
	Route::get('/get-category', 'ProductReportController@category')->name('categorys');
});


