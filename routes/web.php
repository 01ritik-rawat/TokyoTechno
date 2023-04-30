<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("login",function(){
    return view('login');
});
Route::post("login",[UserController::class,'login']);
Route::get("/",[ProductController::class,'index']); //redirected here after successful login. 
Route::get("/detail/{id}",[ProductController::class,'detail']); //redirected here after successful login. 
