<?php

namespace App\Http\Controllers;

use App\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function setBaseCurrency(Request $request){

        $input = $request->all();
        $validate = \Illuminate\Support\Facades\Validator::make($input,
            [
               'base_currency' => 'required|string',
            ]);

        if($validate->fails()){
            return $this->sendError($validate->errors());
        }

        $user = Auth::user();
        if(empty($user)){
            return $this->sendError('User does not exist');
        }

        $user->base_currency = $request->base_currency;
        $user->save();

        return $this->sendResponse($user,'User set base currency successfully');

    }

    public function Login(Request $request){
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError( $validator->errors());
        }

        $user = User::where('email', $request->email)->first();
        if(isset($user)) {

            if (Hash::check($request->password, $user->password)) {

                $user['token'] = $user->createToken('BackendAssessment')->accessToken;
                $user['password'] = '';

                return $this->sendResponse($user->toArray(), 'User login successfully');

            }else{
                return $this->sendError('Your Password is not correct');
            }
        }else{
            return $this->sendError('User does not exist');
        }

    }
}
