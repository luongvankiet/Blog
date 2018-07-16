<?php

namespace App\Http\Controllers\ApiControllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Mail\ResetPasswordMail;
use Carbon\Carbon;
use DB;
use App\User;
use Hash;
use Validator;
use Mail;


class ResetPasswordController extends Controller
{
    public function resetPassword(ResetPasswordRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user == null)
        {
            return response()->json(['error'=>'Email doesn\'t found on our database']);
        }
        $this->send($request->email);
        return $this->success();
    }

    public function send($email)
    {
        $token = $this->createToken($email);
        Mail::to($email)->send(new ResetPasswordMail($token));
    }

    public function createToken($email)
    {
        $oldToken = DB::table('password_resets')->where('email', $email)->first();
        if($oldToken){
            return $oldToken->token;
        }
        else{
            $token = str_random(60);

            $this->saveToken($token, $email);

            return $token;
        }
    }

    public function saveToken($token, $email)
    {
        return DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
    }


    public function success()
    {
        return response()->json([
            'data' => 'Mail has been sent successfully, please check your inbox.'
        ]);

    }


    public function changePassword(ChangePasswordRequest $request)
    {
        $token = DB::table('password_resets')->where(['email'=>$request->email, 'token'=>$request->resetToken])->count();
        if($token > 0){
            return $this->processChange($request);
        }
        return response()->json(['error'=>'Email or token is incorrect']);
    }

    public function processChange($request)
    {
        $user = User::where('email', $request->email)->first();
        $user->update(['password'=>Hash::make($request->password)]);
        $token = DB::table('password_resets')->where(['email'=>$request->email, 'token'=>$request->resetToken]);
        $token->delete();
        return response()->json(['data'=>'Password is successfully changed']);
    }
}

