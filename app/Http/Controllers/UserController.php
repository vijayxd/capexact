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
            return response(['message' => $e->getMessage()], 400);
        }
    }


    public function Login(Request $request)
    {

        $user = User::Where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $user->api_token = sha1($user->id_user . time());
                $user->save();
                return $user;
            }
            return response(['message' => 'invalid password'], 400);
        }
        return response(['message' => 'user not found'], 400);
    }


    public function Auth(Request $request)
    {
        return ['user' => Auth::user(), 'properties' => Auth::user()->properties];
    }

    public function ResetPassword(Request $request)
    {
        $user = User::Where('email', Auth::user()->email)->first();

        $user->password = Hash::make($request->newpassword);

        $user->save();

        return $user;
    }

    public function ForgotPassword(Request $request)
    {


        $user = User::Where('email', $request->email)->first();

        if ($user) {
            Mail::send(
                new ResetPassword(
                    $user->email,
                    $user->api_token
                )
            );
            return response(['message' => 'please check your email and enter verification code']);
        } else {
            return response(['message' => 'no user available with this email id'], 400);
        }
    }

    public function ChangeRole(Request $request)
    {
        $user = User::find($request->id);
        $user->role = $request->role;
        $user->save();
        return $user;
    }

    public function GetAllUsers(){
        return User::all();
    }
    //
}
