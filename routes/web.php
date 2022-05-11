<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

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

Route::get('/cc', function() {
    $exitCode  = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');
    echo 'Cache Clear';
})->name('cc');

Route::get('/', [HomeController::class, 'index'])->name('HOME');
Route::get('/about_us', [AboutController::class, 'index'])->name('ABOUT US');

Route::get('/products_/{id}', 'ProductController@ui_products')->where(['id'=>'[0-9]+'])->name('products_');
Route::get('/product-detail/{id}', 'ProductController@ui_product_detail')->where(['id'=>'[0-9]+'])->name('product_detail');
Route::post('/submit-order/{id}', 'OrderController@index')->where(['id'=>'[0-9]+'])->name('submit-order');
Route::get('/order_placed', 'OrderController@order_placed')->name('order_placed');

Route::get('/contact_us', [ContactController::class, 'index'])->name('CONTACT US');
Route::post('/contact_us', [ContactController::class, 'form_submit'])->name('contact_us_form_submit');
Route::get('/request_received', [ContactController::class, 'request_received'])->name('request_received');

Route::get('/ajax_request', 'AjaxController@index')->name('ajax_request');
Route::get('/send_email', 'ContactController@send_email')->name('send_email');


Route::group(['prefix'=>'admin','middleware'=>'web'], function () {

    Route::get('/cc', function() {
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $exitCode  = Artisan::call('cache:clear');
        $exitCode = Artisan::call('route:clear');
        $exitCode = Artisan::call('view:clear');
        $exitCode = Artisan::call('config:cache');
        //return redirect()->route('dashboard');
        //return Redirect::back()->withErrors(['msg', 'The Message']);
    })->name('cc');


    Route::get('/','AdminController@index')->name('login');
    Route::get('/login','AdminController@index')->name('login');
    Route::post('/login','AdminController@login')->name('login');
    Route::get('/dashboard','AdminController@dashboard')->name('dashboard');
    Route::get('/logout','AdminController@logout')->name('logout');

    // Logos CRUD Routs
    Route::get('/logos','LogoController@index')->name('logos');
    Route::get('/logo-add','LogoController@add_logo_form')->name('add_logo');
    Route::post('/logo-add','LogoController@add_logo_method')->name('add_logo');
    Route::get('/logo-set/{id}','LogoController@set_logo')->where(['id'=>'[0-9]+'])->name('set_logo');
    Route::get('/logo-dell/{id}','LogoController@dell_logo')->where(['id'=>'[0-9]+'])->name('dell_logo');

    // Categories CRUD Routs
    Route::get('/categories','CategoryController@index')->name('categories');
    Route::get('/category-add','CategoryController@add_category_form')->name('add_category');
    Route::post('/category-add','CategoryController@add_category_method')->name('add_category');
    Route::get('/category-update/{id}/{status}','CategoryController@category_update')->where(['id'=>'[0-9]+','status'=>'[a,d]+'])->name('update_category');
    Route::get('/category-view/{id}','CategoryController@view_category')->where(['id'=>'[0-9]+'])->name('view_category');
    Route::get('/category-edit/{id}','CategoryController@edit_category_form')->where(['id'=>'[0-9]+'])->name('edit_category');
    Route::post('/category-edit/{id}','CategoryController@edit_category_method')->where(['id'=>'[0-9]+'])->name('edit_category');
    Route::get('/category-dell/{id}','CategoryController@dell_category')->where(['id'=>'[0-9]+'])->name('dell_category');

    // Product CRUD Routs
    Route::get('/products','ProductController@index')->name('products');
    Route::get('/product-add','ProductController@add_product_form')->name('add_product');
    Route::post('/product-add','ProductController@add_product_method')->name('add_product');
    Route::get('/product-update/{id}/{status}','ProductController@product_update')->where(['id'=>'[0-9]+','status'=>'[a,d]+'])->name('update_product');
    Route::get('/product-view/{id}','ProductController@view_product')->where(['id'=>'[0-9]+'])->name('view_product');
    Route::get('/product-edit/{id}','ProductController@edit_product_form')->where(['id'=>'[0-9]+'])->name('edit_product');
    Route::post('/product-edit/{id}','ProductController@edit_product_method')->where(['id'=>'[0-9]+'])->name('edit_product');
    Route::get('/product-dell/{id}','ProductController@dell_product')->where(['id'=>'[0-9]+'])->name('dell_product');

    // Product CRUD Routs
    Route::get('/product-image','Product_imagesController@index')->name('product_images');
    Route::get('/product-image-add','Product_imagesController@add_product_image_form')->name('add_product_image');
    Route::post('/product-image-add','Product_imagesController@add_product_image_method')->name('add_product_image');

    Route::get('/product-image-update/{id}/{status}','Product_imagesController@productimage_update')->where(['id'=>'[0-9]+','status'=>'[a,d]+'])->name('update_productimage');

    Route::get('/set-main/{id}','Product_imagesController@set_main')->where(['id'=>'[0-9]+'])->name('set_main');
    Route::get('/set-hover/{id}','Product_imagesController@set_hover')->where(['id'=>'[0-9]+'])->name('set_hover');

    Route::get('/product-image-edit/{id}','Product_imagesController@edit_product_image_form')->where(['id'=>'[0-9]+'])->name('edit_product_image');
    Route::post('/product-image-edit/{id}','Product_imagesController@edit_product_image_method')->where(['id'=>'[0-9]+'])->name('edit_product_image');
    Route::get('/product-image-dell/{id}','Product_imagesController@dell_product_image')->where(['id'=>'[0-9]+'])->name('dell_product_image');

});
