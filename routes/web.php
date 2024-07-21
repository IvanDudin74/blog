<?php

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

Route::group(['namespace' => 'Main'], function() {
    Route::get('/', 'IndexController');
});

Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function() {
    Route::get('/', 'IndexController')->name('tag.index');
    Route::get('/create', 'CreateController')->name('tag.create');
    Route::post('/', 'StoreController')->name('tag.store');
    Route::get('/{tag}/edit', 'EditController')->name('tag.edit');
    Route::patch('/{tag}', 'UpdateController')->name('tag.update');
    Route::delete('/{tag}', 'DestroyController')->name('tag.destroy');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function() {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function() {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DestroyController')->name('admin.category.destroy');
    });
});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
