<?php

use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\HomeController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
    Route::get('logout',[HomeController::class,'logout'])->name('logout');
   Route::group(['prefix' => 'category'], function () {
        Route::get('/', [categoryController::class, 'index'])->name('category.list');
        Route::get('add', [categoryController::class, 'add'])->name('add.category');
        Route::post('create', [categoryController::class, 'create'])->name('create.category');
        Route::get('edit/{id}', [categoryController::class, 'edit'])->name('edit.category');
        Route::post('update', [categoryController::class, 'updatecategory'])->name('update.category');
        Route::get('delete/{id}', [categoryController::class, 'delete'])->name('delete.category');
    });
    Route::group(['prefix' => 'subcategory'], function () {
        Route::get('/', [SubcategoryController::class, 'index'])->name('subcategory.list');
        Route::get('add', [SubcategoryController::class, 'add'])->name('add.subcategory');
        Route::post('create', [SubcategoryController::class, 'create'])->name('create.subcategory');
        Route::get('edit/{id}', [SubcategoryController::class, 'edit'])->name('edit.subcategory');
        Route::post('update', [SubcategoryController::class, 'updateSubcategory'])->name('update.subcategory');
        Route::get('delete/{id}', [SubcategoryController::class, 'delete'])->name('delete.subcategory');
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.list');
        Route::get('add', [ProductController::class, 'add'])->name('add.product');
        Route::post('create', [ProductController::class, 'create'])->name('create.product');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit.product');
        Route::post('update', [ProductController::class, 'updateProduct'])->name('update.product');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('delete.product');
        Route::get('sub', [ProductController::class, 'loadeSubCate'])->name('loadSubCate');
    });
});

Route::group(['prefix' =>'/'],function(){
    Route::get('/', [HomeController::class, 'index'])->name('product.list');
    Route::get('pruduct/{id}', [HomeController::class, 'product_deatils'])->name('product.details');
});
