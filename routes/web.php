<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::post("/update-profile",[HomeController::class,"updateProfile"])->name("home.update");
Route::get("/edit-profile",[HomeController::class,'editProfile'])->name("home.edit");
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource("category",\App\Http\Controllers\CategoryController::class);
Route::resource("article",\App\Http\Controllers\ArticleController::class);
