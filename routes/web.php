<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PDFController;
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
// Route::get('generate_invoice_pdf', [PDFController::class, 'index'])->name('generate_invoice_pdf'); //for downloading PDF 

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
        Route::get("all_orders",[PurchaseController::class,'getAllOrders'])->name('all_orders');// get all orders of user
        Route::get("get_order_by_id/{id}",[PurchaseController::class,'getOrderById'])->name('get_order_by_id');// get order by using order Id

    });




});

Route::prefix('admin')->middleware('AdminLoginAuth')->group(function () {
    Route::get("/login",function(){
        return view('adminLogin'); 
    }); // takes us to login page
    Route::get("/",[AdminController::class,'index']); //redirected here after successful login. 

    
    Route::post("login",[AdminController::class,'login']);
    Route::get("add_products_form",[AdminController::class,'openProductForm']); //opens the  add product form 
    Route::post("add_product",[AdminController::class,'addProduct']); //Adds the product  
    Route::put("edit_product",[AdminController::class,'editProduct']); //edit the product  
    Route::delete("delete_product/{id}",[AdminController::class,'deleteProduct']); //delete the product  
    Route::get("get_product",[AdminController::class,'getProduct'])->name('admin.get_product'); //delete the product  


});




Route::get("test",[UserController::class,'test']); //fro testing purposes only 



