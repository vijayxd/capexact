<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function Register(Request $request)
    {

        $userDetails = $request->all();

        $userDetails['password'] = Hash::make($request->password);

        try {
            $user = User::create($userDetails);

            return $user;
        } catch (Exception $e) {
            return $e;
        }
    }


    public function Login(Request $request)
    {


        $user = User::Where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $user->api_token = sha1($user->id_user . time());
                $user->save();
                return ['api_token' => $user->api_token];
            }
            return response(['message' => 'invalid password'], 400);
        }
        return response(['message' => 'user not found'], 400);
    }


    public function Auth(Request $request)
    {
        return Auth::user()->properties;
    }

    public function ForgotPassword(Request $request)
    {

        // $mail =  Mail::send(
        //     new ResetPassword(
        //         'vijayxd@gmail.com',
        //         'verificationCode'
        //     )
        // );;

        return '$mail';
    }

    public function ChangeRole(Request $request)
    {
        $user = User::find($request->id);
        $user->role = $request->role;
        $user->save();
        return $user;
    }
    //
}
