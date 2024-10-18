<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrondController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubCategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('home');
});




Auth::routes();

Route::get('/test', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::controller(CategoryController::class)->group(function () {
    Route::get('list', 'list')->name('list');
    Route::post('store', 'Store')->name('store');
    Route::post('update/{id}', 'update')->name('update');
    Route::get('delete/{id}', 'Delete')->name('delete');
});
//Langeuage
Route::controller(LanguageController::class)->group(function () {
    Route::get('khmer', 'Khmer')->name('khmer');
    Route::get('english', 'English')->name('english');
});
Route::controller(SubCategoryController::class)->group(function () {
    Route::prefix('sub')->group(function () {
        Route::get('list', 'list')->name('subcategory.list');
        Route::post('store', 'Store')->name('subcategory.store');
        Route::post('update/{id}', 'update')->name('subcategory.update');
        Route::get('delete/{id}', 'Delete')->name('subcategory.delete');
    });
});
Route::controller(PostController::class)->group(function () {
    Route::prefix('post')->group(function () {
        // Ajax get subcategory
        Route::get('get/subcategory/{id}', 'getSubcategory')->name('ajax.get.subcategory');
        Route::get('list', 'list')->name('post.list');
        Route::get('insert_form', 'InsertForm')->name('post.insert.form');
        Route::post('store', 'Store')->name('post.store');
        Route::post('update/{id}', 'update')->name('post.update');
        Route::get('delete/{id}', 'Delete')->name('post.delete');
        Route::get('edit/{id}', 'Edit')->name('post.edit');
    });
});


Route::controller(FrondController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('category/{id}', 'Category')->name('category');
    Route::get('sub/category/{id}', 'SubCategory')->name('sub.category');
    Route::get('detail/{id}', 'Detail')->name('detail');
});
//Admin route
Route::controller(AdminController::class)->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('index', 'Index')->name('admin.index');
        Route::post('update/profile', 'UpdateProfile')->name('admin.update');
        Route::post('update/password', 'UpdatePassword')->name('admin.password');
    });
    Route::prefix('user')->group(function () {
        Route::get('index', 'List')->name('user.index');
        Route::get('user/form', 'UserForm')->name('user.form');
        Route::post('add/user', 'StoreUser')->name('user.add');
        Route::post('updateuser/{id}', 'Update')->name('user.update');
        Route::get('delete/{id}', 'Delete')->name('user.delete');
        Route::get('edit/{id}', 'Edit')->name('user.edit');
    });
});
