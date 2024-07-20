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

Route::group(['namespace' => 'Post'], function() {
    Route::get('/posts', 'IndexController');
});

Route::group(['namespace' => 'Category'], function() {
    Route::get('/categories', 'IndexController')->name('category.index');
    Route::get('/categories/create', 'CreateController')->name('category.create');
    Route::post('/categories', 'StoreController')->name('category.store');
    Route::get('/categories/{category}/edit', 'EditController')->name('category.edit');
    Route::patch('/categories/{category}', 'UpdateController')->name('category.update');
    Route::delete('/categories/{category}', 'DestroyController')->name('category.destroy');
});


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
