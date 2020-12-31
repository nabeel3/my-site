<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;

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


//resource controller
Route::prefix('admin')->group(function () {
	Route::view('/','dashboard.admin');
Route::resource('posts', PostController::class);
Route::resource('profiles', ProfileController::class);
Route::resource('pages', PageController::class);
Route::resource('categories', CategoryController::class);
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

});



// Route::resource('profiles','ProfileController');
// Route::resource('users','UserController');
// Route::resource('users', UserController::class);

// Route::get('/users', [UserController::class, 'index']);

// Route::resource('pages','PageController');
// Route::resource('categories','CategoryController');
// Route::resource('roles','RoleController');