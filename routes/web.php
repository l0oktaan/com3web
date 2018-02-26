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

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['admin'],
    'namespace' => 'Admin'
], function() {
    // your CRUD resources and other admin routes here
    CRUD::resource('product', 'ProductCrudController');
    CRUD::resource('category', 'CategoryCrudController');
    CRUD::resource('editor', 'EditorCrudController');
    
    CRUD::resource('depart', 'DepartCrudController');
});

Route::get('depart/ajax-depart-options', 'DepartCrudController@departOptions');
CRUD::resource('depart', 'DepartCrudController');
