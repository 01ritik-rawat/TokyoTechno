<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class UserController extends Controller 
{
    public function login(Request $request){

        //validate user
        //this first thingy has to be fixed // add more checks
        $user=User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return "incorrect password/ username";
        }
        else{
            $request->session()->put('user',$user);
            return redirect('/');
        }
        
    }
}
