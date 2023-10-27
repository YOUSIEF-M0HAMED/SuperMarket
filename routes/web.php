<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderItemController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Front\FrontController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[FrontController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// ------------------------------------------Admin routes --------------------------------


Route::group(['prefix' => 'admin','middleware'=>['auth','IsAdmin']], function() {


    Route::get('dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');

    Route::resource('products',ProductController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('brands',BrandController::class);
    Route::resource('orders',OrderController::class);
    Route::resource('orderitems',OrderItemController::class);
    Route::resource('customers',CustomerController::class);
    Route::get('Customers/Archive',[CustomerController::class,'archive'])->name('customers.archive');
    Route::post('Customers/Restore/{employee}',[CustomerController::class,'restore'])->name('customers.restore');
    Route::post('Customers/deleteArchive/{employee}',[CustomerController::class,'deleteArchive'])->name('customers.deleteArchive');

    Route::get('category/archive',[CategoryController::class,'archive'])->name('categories.archive');
    Route::post('category/restore/{category}',[CategoryController::class,'restore'])->name('categories.restore');
    Route::post('category/deleteArchive/{category}',[CategoryController::class,'deleteArchive'])->name('categories.deleteArchive');


    Route::get('brand/archive',[BrandController::class,'archive'])->name('brands.archive');
    Route::post('brand/restore/{brand}',[BrandController::class,'restore'])->name('brands.restore');
    Route::post('brand/deleteArchive/{brand}',[BrandController::class,'deleteArchive'])->name('brands.deleteArchive');


    Route::get('order/archive',[OrderController::class,'archive'])->name('orders.archive');
    Route::post('order/restore/{order}',[OrderController::class,'restore'])->name('orders.restore');
    Route::post('order/deleteArchive/{order}',[OrderController::class,'deleteArchive'])->name('orders.deleteArchive');


    Route::get('product/archive',[ProductController::class,'archive'])->name('products.archive');
    Route::post('product/restore/{product}',[ProductController::class,'restore'])->name('products.restore');
    Route::post('product/deleteArchive/{product}',[ProductController::class,'deleteArchive'])->name('products.deleteArchive');

    });


    // --------------------------------front routes --------------------------------

    Route::group(['prefix' => 'front'], function() {

        Route::get('index',[FrontController::class,'index'])->name('index');
        Route::get('aboutUs',[FrontController::class,'AboutUs'])->name('AboutUs');
        Route::get('contactUs',[FrontController::class,'ContactUs'])->name('ContactUs');
        Route::get('handeleSearch',[FrontController::class,'handeleSearch'])->name('handle-search');

    Route::group(['middleware'=>'auth'], function() {

        Route::POSt('AddToCart/{id}',[FrontController::class,'AddToCart'])->name('AddToCart');
        Route::GET('GetFromCart',[FrontController::class,'GetFromCart'])->name('GetFromCart');
        Route::POST('ConfirmCart',[FrontController::class,'ConfirmCart'])->name('cart.confirm');
        Route::Delete('DeleteCart/{id}',[FrontController::class,'DeleteCart'])->name('cart.delete');
    });

    });

