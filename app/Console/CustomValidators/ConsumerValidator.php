<?php

namespace App\Console\CustomValidators;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password as FacadesPassword;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ConsumerValidator {

    public static function validateSignUp(Request $request){
        
        $rules = [
            'name' => 'required',
            'email' => [
                'required',
                'max:255',
                Rule::unique('users')->where(function ($query) {
                    $query->where('email_verified_at', '=', null);
                }),
            ],
        
            'password' => [
                'required'
            ],
            'confirmPassword' => 'required|same:password'
        ];
        $validation= FacadesValidator::make(
            $request->all(),
            $rules
        );
        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors(),
            ], 422);
        }
       return false;


        
    }
}

?>