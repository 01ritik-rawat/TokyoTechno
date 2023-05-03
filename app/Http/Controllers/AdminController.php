<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function login(Request $request){
        //validate user
        //this first thingy has to be fixed // add more checks
        $user=AdminUser::where('email',$request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return view('adminLogin',['message'=>"incorrect password/ username"]);
        }
        else{
            $request->session()->put('adminUser',$user);
            $consumerUser=User::take(1)->get();
            
            return view('adminHome',['consumerUser'=>$consumerUser]);
        }
        
    }

}
