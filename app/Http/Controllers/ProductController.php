<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
    
}
