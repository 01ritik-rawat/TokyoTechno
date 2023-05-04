<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\ConsumerLookup;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Return_;

class AdminController extends Controller
{
    //
    public function index(Request $request ){
        $message= isset($request->message)?$request->message :'';

        return view('adminHome');
    }

    public function login(Request $request){
        //validate user
        //this first thingy has to be fixed // add more checks
        $user=AdminUser::where('email',$request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return view('adminLogin',['message'=>"Admin Username or password incorrect."]);
        }
        else{
            $request->session()->put('adminUser',$user);            
            return view('adminHome');
        }
        
    }

    public function openProductForm(Request $request){
        // return "let's add product";
        $categoryLookup=ConsumerLookup::where('lookup_KEY','CONSUMER_PRODUCT_CATEGORY')->get('lookup_value');
        

        $categoryLookup= (array)json_decode($categoryLookup['0']['lookup_value']); 

        return view('adminAddProduct',['categoryLookup'=>$categoryLookup]);

    }
    public function addProduct(Request $request){
        $product =new Product;
        
        $product->name=$request->productName;
        $product->price=14999;
        $product->category=$request->productCategory;
        $product->gallery=$request->productBanner;
        $product->description=$request->productDescription;
        $product->product_display_image=json_encode([
            'image_1'=> $request->productImage
        ]);
        $product->save();       
        return view('adminHome',['message' => 'Product Has Been Added']);


    }
    public function getProduct($request='' ){         
        echo Session::get('message');

        $products=Product::get();
        return view('adminGetProducts',['products'=>$products, 'message'=>NULL]);
    }
    
    public function deleteProduct(Request $request ){

        $productId = $request->id;
        $product = Product::find($productId);
        if ($product) {
            $product->delete();
            $message = 'Product has been deleted';
        } else {
            $message = 'Product not found';
        }

        return redirect()->route('admin.get_product')->with('message',$message);

    }

}
