<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class ProductController extends Controller
{
    //
    public function index(Request $request){

        $data=Product::all();
        // return $data;

        return view('product',['products'=>$data]);

    }
    public function detail($id){
        $data= Product::find($id);
        $imgUrls=json_decode($data['product_display_image']);

        // return $imgUrls->{'1'};
        return view('detail',['product'=>$data,  'urls'=>$imgUrls]);

    }


    public function search(Request $request) {
        $query = $request->input('query');
        $products = Product::where('name', 'like', '%' . $query . '%')->get();
        return view('search', ['products' => $products, 'query' => $query]);
    }

    public function addToCart(Request $request) {

        if($request->session()->has('user')){
            $cart=new Cart;
            $cart->user_id=$request->session()->get('user')->id;
            $cart->product_id=$request->product_id;
            $cart->save();

        return redirect('/');
        }
        return redirect('/login');
    }

    public static function cartItem()
    {
        $user_id = session()->get('user')['id'];

        $items = Cart::where('user_id', $user_id)->count('item_count');
        return $items;
    }

    public function cartList(){
        $userId=FacadesSession::get('user')->id;

        $cartItems = Cart::with('product')->where('user_id', $userId)->get();
        return view('cartList', ['products' => $cartItems]);


    }
    
}
