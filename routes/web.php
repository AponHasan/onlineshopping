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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/addproduct','ProductController@create')->name('create.product');
Route::post('/saveproduct','ProductController@store')->name('save.product');
Route::view('/products','admin.product.product',[
	'data' => App\Product::all()
]);

 //edit product
 Route::get('/editProduct/{id}', function($id){
      return view('admin.product.edit',[
        'data' => App\Product::where('id',$id)->get()
      ]);
    });
