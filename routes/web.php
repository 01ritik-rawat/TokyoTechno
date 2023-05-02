<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
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
Route::get("/detail/{id}",[ProductController::class,'detail']); //product detail page
Route::get("/search",[ProductController::class,'search']); //Search results page 
Route::post("add_to_cart",[ProductController::class,'addToCart']); //Search results page 
Route::get("logout",[UserController::class,'logout']); //Search results page w

Route::prefix('user')->middleware('UserLoginAuth')->group(function () {

    Route::get("cart_list",[ProductController::class,'cartList'])->name('cart_list');//cart List
    Route::get("remove_from_cart/{id}",[ProductController::class,'destroyFromCart']); //delete from cart List
    Route::get("order_now",[PurchaseController::class,'orderNow'])->name('order_now');//calculation n billing

    Route::prefix('purchase')->group(function () {
        Route::post("order-details",[PurchaseController::class,'placeOrder']); //enter final delivery and order details         
    });




});



Route::get("test",[UserController::class,'test']); //fro testing purposes only 



