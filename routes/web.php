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


//ATTRIBUTE
Route::get('admin/attribute', 'AttributeController@attribute');
Route::get('admin/attribute/list', 'AttributeController@attlist');
Route::post('admin/attribute', 'AttributeController@store');
Route::delete('admin/attribute/{id}', 'AttributeController@destroy');
//SIZECOLOR
Route::get('admin/size','SizeColorController@size');
Route::get('admin/size/list', 'SizeColorController@sizelist');
Route::post('admin/size', 'SizeColorController@sizestore');
Route::delete('admin/size/{id}', 'SizeColorController@sizedestroy');

Route::get('admin/color', 'SizeColorController@color');
Route::get('admin/color/list', 'SizeColorController@colorlist');
Route::post('admin/color', 'SizeColorController@colorstore');
Route::delete('admin/color/{id}', 'SizeColorController@colordestroy');
Route::post('admin/adddetail', 'SizeColorController@adddetail');
//PRODUCT


Route::get('admin/products', 'ProductController@index');
Route::get('admin/products/list', 'ProductController@anyData');
Route::post('admin/products', 'ProductController@store');
Route::delete('admin/products/{id}', 'ProductController@destroy');
Route::post('admin/products/upload', 'ProductController@upload');
Route::get('admin/products/addlist/{id}','ProductController@editList');
Route::get('admin/products/{id}', 'ProductController@show');


//CATEGORY

Route::get('admin/category', 'CategoryController@category');
Route::get('admin/category/list', 'CategoryController@catelist');
Route::post('admin/category', 'CategoryController@store');
Route::delete('admin/category/{id}', 'CategoryController@destroy');

Route::get('admin/subcategory', 'SubCategoryController@category');
Route::get('admin/subcategory/list', 'SubCategoryController@catelist');
Route::get('admin/subcategory/{id}', 'SubCategoryController@catesub');
Route::post('admin/subcategory', 'SubCategoryController@store');
Route::delete('admin/subcategory/{id}', 'SubCategoryController@destroy');