<?php

namespace App\Http\Controllers;

use App\Console\ConsumerValidator;
use App\Console\CustomValidator ;
use App\Console\CustomValidators\ConsumerValidator as CustomValidatorsConsumerValidator;
use App\Events\SendMail;
use App\Listeners\SendEmailListener;
use App\Mail\VerifyOtp;
use App\Models\User;
use App\Models\UserOtp;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Return_;

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

    public function signUpForm(Request $request){
        $message=null;
        if($request->message){
            $message = $request->message;
        }        
        return view('signUpForm',['message'=>$message]);
        
    }

    public function signUp(Request $request){


        $response = CustomValidatorsConsumerValidator::validateSignUp($request);

        if($response)  {
            // return (array)json_decode($response->getContent())->errors ;
            foreach((array)json_decode($response->getContent())->errors as $eachError){
                $message= $eachError[0];
                return view('signUpForm',['message'=>$message]);

            } 
        }

        $user= new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->name=$request->name;        
        $user->sign_up_type='email';
        $saved= $user->save();
        
        
        // TODO:OTP VERIFY 
        if ($saved) {
            $otp = random_int(100000, 999999);
            // TODO: SAVE THE VALUE IN TABLE
            $emailData = ['email' => $user->email, 'otp' => $otp];
            $userOtp=new UserOtp;
            $userOtp->otp=$otp;
            $userOtp->user_id=$user->id;
            $userOtp->email=$user->email;
            $userOtp->save();


            try {
                Mail::to( $emailData['email'])->send(new VerifyOtp($emailData) );
                //echo "email sent" ;
            } catch (Exception $e) {
                //echo "email not sent ";
            }
            event(new SendMail($emailData));
            
            return view('signupOtpVerify', ['userId'=>$user->id, 'opt'=>$otp]);
        }

        return view('signUpForm',['message'=>'something went wrong. Try again after some time']);
    }

    public function logout(){
        Session::forget('user');
         return redirect('/login');
    }

    public function verifyOtp(Request $request)
    {

        $userOtp = $request->otp;
        $userId = $request->userId;
        $originalOtp = UserOtp::where('user_id', $userId)->where('expired', false)->latest()->first('otp');
        if (empty($originalOtp)) {
            return view('signUpForm', ['message' => 'something went Wrong Pls try again']);
        }
        $originalOtp = $originalOtp->otp;
        if ($originalOtp) {
            // echo"hi";
            $masterOtpOn = env('MASTER_OTP_ON', true);
            $masterOtp = env('MASTER_OTP');

            if ($originalOtp == $userOtp || ($masterOtpOn && $userOtp == $masterOtp)) {
                UserOtp::where('user_id', $userId)->where('expired', false)->update(['expired' => true]);
                //echo "OTP verified";
                return view('login', ['message' => 'signed up successfully.']);
            }
        }
        //echo "OTP Not verified";

        return view('signupOtpVerify', ['userId' => $userId, 'opt' => $userOtp, 'message' => 'invalid OTP. Try again please']);


        // return view('signUpForm',['message'=>$message]);

    }
    

}
