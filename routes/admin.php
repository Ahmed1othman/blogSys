<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubDistrictController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Admin Routes
Route::group(['namespace' =>'App\Http\Controllers\Admin',],function() {
    Route::group(['middleware' => 'guest:web'], function () {
        Route::get('login', [AdminController::class, 'getLogin'])->name('get.admin.login');
    });

    Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

        //Admin Category Routes
        Route::group(['prefix'=>'category'],function (){
            Route::get('/',[CategoryController::class,'index'])->name('admin.category.index');
            Route::get('/add',[CategoryController::class,'add'])->name('admin.category.add');
            Route::post('/store',[CategoryController::class,'store'])->name('admin.category.store');
            Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
            Route::post('/update/{id}',[CategoryController::class,'update'])->name('admin.category.update');
            Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('admin.category.delete');
            Route::get('/destroy/{id}',[CategoryController::class,'destroy'])->name('admin.category.destroy');
            Route::get('/undelete/{id}',[CategoryController::class,'unDelete'])->name('admin.category.unDelete');
            Route::get('/archive',[CategoryController::class,'archive'])->name('admin.category.archive');

        });


        //Admin Subcategory Routes
        Route::group(['prefix'=>'subcategory'],function (){
            Route::get('/',[SubCategoryController::class,'index'])->name('admin.subcategory.index');
            Route::get('/add',[SubCategoryController::class,'add'])->name('admin.subcategory.add');
            Route::post('/store',[SubCategoryController::class,'store'])->name('admin.subcategory.store');
            Route::get('/edit/{id}',[SubCategoryController::class,'edit'])->name('admin.subcategory.edit');
            Route::post('/update/{id}',[SubCategoryController::class,'update'])->name('admin.subcategory.update');
            Route::get('/delete/{id}',[SubCategoryController::class,'delete'])->name('admin.subcategory.delete');
            Route::get('/destroy/{id}',[SubCategoryController::class,'destroy'])->name('admin.subcategory.destroy');
            Route::get('/undelete/{id}',[SubCategoryController::class,'unDelete'])->name('admin.subcategory.unDelete');
            Route::get('/archive',[SubCategoryController::class,'archive'])->name('admin.subcategory.archive');
            Route::get('/get/{id}',[SubCategoryController::class,'get'])->name('admin.subcategory.get');

        });




        //Admin district Routes
        Route::group(['prefix'=>'district'],function (){
            Route::get('/',[DistrictController::class,'index'])->name('admin.district.index');
            Route::get('/add',[DistrictController::class,'add'])->name('admin.district.add');
            Route::post('/store',[DistrictController::class,'store'])->name('admin.district.store');
            Route::get('/edit/{id}',[DistrictController::class,'edit'])->name('admin.district.edit');
            Route::post('/update/{id}',[DistrictController::class,'update'])->name('admin.district.update');
            Route::get('/delete/{id}',[DistrictController::class,'delete'])->name('admin.district.delete');
            Route::get('/destroy/{id}',[DistrictController::class,'destroy'])->name('admin.district.destroy');
            Route::get('/undelete/{id}',[DistrictController::class,'unDelete'])->name('admin.district.unDelete');
            Route::get('/archive',[DistrictController::class,'archive'])->name('admin.district.archive');

        });




        //Admin sub-district Routes
        Route::group(['prefix'=>'subdistrict'],function (){
            Route::get('/',[SubdistrictController::class,'index'])->name('admin.subdistrict.index');
            Route::get('/add',[SubdistrictController::class,'add'])->name('admin.subdistrict.add');
            Route::post('/store',[SubdistrictController::class,'store'])->name('admin.subdistrict.store');
            Route::get('/edit/{id}',[SubdistrictController::class,'edit'])->name('admin.subdistrict.edit');
            Route::post('/update/{id}',[SubdistrictController::class,'update'])->name('admin.subdistrict.update');
            Route::get('/delete/{id}',[SubdistrictController::class,'delete'])->name('admin.subdistrict.delete');
            Route::get('/destroy/{id}',[SubdistrictController::class,'destroy'])->name('admin.subdistrict.destroy');
            Route::get('/undelete/{id}',[SubdistrictController::class,'unDelete'])->name('admin.subdistrict.unDelete');
            Route::get('/archive',[SubdistrictController::class,'archive'])->name('admin.subdistrict.archive');
            Route::get('/get/{id}',[SubDistrictController::class,'get'])->name('admin.subdistrict.get');

        });


        //Admin Posts Routes
        Route::group(['prefix'=>'posts'],function (){
            Route::get('/',[PostController::class,'index'])->name('admin.post.index');
            Route::get('/add',[PostController::class,'add'])->name('admin.post.add');
            Route::post('/store',[PostController::class,'store'])->name('admin.post.store');
            Route::get('/edit/{id}',[PostController::class,'edit'])->name('admin.post.edit');
            Route::post('/update/{id}',[PostController::class,'update'])->name('admin.post.update');
            Route::get('/delete/{id}',[PostController::class,'delete'])->name('admin.post.delete');
            Route::get('/destroy/{id}',[PostController::class,'destroy'])->name('admin.post.destroy');
            Route::get('/undelete/{id}',[PostController::class,'unDelete'])->name('admin.post.unDelete');
            Route::get('/archive',[PostController::class,'archive'])->name('admin.post.archive');
        });




    });


});


