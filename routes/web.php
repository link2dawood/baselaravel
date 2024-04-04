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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['prefix'=>'/admin','middleware'=>'auth'],function(){
    /*
        Users
    */
    Route::get('user', [App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::get('profile', [App\Http\Controllers\Admin\UserController::class, 'profile']);
    Route::post('profile', [App\Http\Controllers\Admin\UserController::class, 'profile']);
    Route::get('user/edit/{id?}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::post('user/edit/{id?}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::get('user/create', [App\Http\Controllers\Admin\UserController::class, 'create']);
    Route::post('user/create', [App\Http\Controllers\Admin\UserController::class, 'create']);
    Route::get('user/delete/{id}', [App\Http\Controllers\Admin\UserController::class, 'delete']);

});
