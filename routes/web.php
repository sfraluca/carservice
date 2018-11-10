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

Route::get('/admins','AdminController@index')->name('list_admins');

Route::group(['prefix'=>'admins'], function(){


//ADMIN



    //to checked
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

    Route::get('/edit/{admin}', 'AdminController@edit')
        ->name('edit_admin')
        ->middleware('can:update-admin,admin');
        
    Route::post('/edit/{admin}', 'AdminController@update')
        ->name('update_admin')
        ->middleware('can:update-admin,admin');

    Route::get('/publish/{admin}', 'AdminController@publish')
        ->name('publish_admin')
        ->middleware('can:publish-admin');

//CARS

        //to checked
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

//CAR SERVICE

    //to checked
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

//Product

//to checked
Route::get('/product/list', 'ProductController@index')
->name('list_all_product');
// ->middleware('auth');

Route::get('/product/create', 'ProductController@create')
->name('create_product');
//->middleware('can:create-car');

Route::post('/product/create', 'ProductController@store')
->name('store_product');
//->middleware('can:create-car');

Route::get('/product/show/{id}', 'ProductController@show')
->name('show_product');


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

//Image

//to checked
Route::get('/upload/image', 'ImageController@index')
->name('upload_image');
// ->middleware('auth');



});
