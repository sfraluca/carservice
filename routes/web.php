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
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::group(['prefix'=>'admin'], function(){
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    // Route::get('/register','Auth\AdminRegisterController@createAdmin')->name('admin.createAdmin');
    // Route::post('/register','Auth\AdminRegisterController@storeAdmin')->name('admin.storeAdmin');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'AdminLoginController@logout')->name('admin.logout');

    //Password reset routes
    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

    

});

Route::get('/admin','CarController@dashboard')->name('dashboard');
Route::post('/admin','ImageController@storeImage')->name('store_image');
Route::get('/check/{ImageId}','CarController@check')->name('check');

Route::group(['prefix'=>'admins'], function(){


//ADMIN

    Route::get('/list', 'AdminController@index')
        ->name('list_all_admins');
        // ->middleware('auth');

    Route::get('/create', 'AdminController@create')
        ->name('create_admin');
        // ->middleware('can:create-admin');

    Route::post('/create', 'AdminController@store')
        ->name('store_admin');
       // ->middleware('can:create-admin');

    Route::get('/show/{id}', 'AdminController@show')
        ->name('show_admin');

    Route::get('/edit/{id}', 'AdminController@edit')
        ->name('edit_admin');
      //  ->middleware('can:update-admin,admin');
        
    Route::post('/edit/{id}', 'AdminController@update')
        ->name('update_admin');
       // ->middleware('can:update-admin,admin');
    Route::delete('/destroy/{id}', 'AdminController@destroy')
       ->name('delete_admin');


//CARS

    
    Route::get('/cars/list', 'CarController@index')
    ->name('list_all_cars');
    // ->middleware('auth');

    Route::get('/cars/create', 'CarController@create')
    ->name('create_car');
    //->middleware('can:create-car');

    Route::post('/cars/create', 'CarController@store')
    ->name('store_car');
    //->middleware('can:create-car');

    Route::get('/cars/show/{id}', 'CarController@show')
        ->name('show_car');

    Route::get('/cars/edit/{id}', 'CarController@edit')
        ->name('edit_car');

    Route::post('/cars/edit/{id}', 'CarController@update')
        ->name('update_car');

    Route::delete('/cars/destroy/{id}', 'CarController@destroy')
        ->name('delete_car');


//CAR SERVICE

    Route::get('/car/service/list', 'CarServiceController@index')
    ->name('list_all_car_service');
    // ->middleware('auth');

    Route::get('/car/service/create', 'CarServiceController@create')
    ->name('create_car_service');
    //->middleware('can:create-car');

    Route::post('/car/service/create', 'CarServiceController@store')
    ->name('store_car_service');
    //->middleware('can:create-car');

    Route::get('/service/show/{id}', 'CarServiceController@show')
        ->name('show_car_service');

    Route::get('/service/edit/{id}', 'CarServiceController@edit')
        ->name('edit_service');

    Route::post('/service/edit/{id}', 'CarServiceController@update')
        ->name('update_service');

    Route::delete('/service/destroy/{id}', 'CarServiceController@destroy')
       ->name('delete_service');


//Product

//to checked
Route::get('/product/list', 'ProductController@index')
->name('list_all_products');
// ->middleware('auth');

Route::get('/product/create', 'ProductController@create')
->name('create_product');
//->middleware('can:create-car');

Route::post('/product/create', 'ProductController@store')
->name('store_product');
//->middleware('can:create-car');

Route::get('/product/show/{id}', 'ProductController@show')
->name('show_product');

Route::get('/product/edit/{id}', 'ProductController@edit')
        ->name('edit_product');

Route::post('/product/edit/{id}', 'ProductController@update')
        ->name('update_product');

Route::delete('/product/destroy/{id}', 'ProductController@destroy')
       ->name('delete_product');


//Category

//to checked
Route::get('/category/list', 'CategoryController@index')
->name('list_all_category');
// ->middleware('auth');

Route::get('/category/create', 'CategoryController@create')
->name('create_category');
//->middleware('can:create-car');

Route::post('/category/create', 'CategoryController@store')
->name('store_category');
//->middleware('can:create-car');

Route::get('/category/show/{id}', 'CategoryController@show')
->name('show_category');

Route::get('/category/edit/{id}', 'CategoryController@edit')
        ->name('edit_category');

Route::post('/category/edit/{id}', 'CategoryController@update')
        ->name('update_category');

Route::delete('/category/destroy/{id}', 'CategoryController@destroy')
       ->name('delete_category');

//Image

//to checked
Route::get('/upload/image', 'ImageController@index')
->name('upload_image');
// ->middleware('auth');



});
