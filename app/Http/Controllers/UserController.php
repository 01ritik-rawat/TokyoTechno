<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller 
{
    public function test(){
        // $instance=new User;
        // $id=Session::get('user')->id;
        // $data= $instance->cart($id);
        $user = User::find(1);
        $carts = $user->cart;
        return $carts;

    }

    public function login(Request $request){

        //validate user
        //this first thingy has to be fixed // add more checks
        $user=User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            
            return view('login',['message'=>"incorrect password/ username"]);
        }
        else{
            $request->session()->put('user',$user);
            return redirect('/');
        }
        
    }
    public function logout(){
        Session::forget('user');
         return redirect('/login');
    }

    

}
