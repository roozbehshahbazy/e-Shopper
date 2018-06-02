<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\VerificationToken;
use Auth;
use App\Events\UserRequestedVerificationEmail;

class VerificationController extends Controller
{
    public function verify(VerificationToken $token)
    {
    	
        $token->user()->update(['verified' => true]);
        //$token->delete();

        VerificationToken::where('user_id','=',$token->user_id)->delete();


    	//Auth::login($token->user);

    	return redirect('auth/login')->withInfo('Email verification succesful. Please login again');
    }

    public function resend(Request $request)
    {
    	$user = User::byEmail($request->email)->firstOrFail();

        if($user->hasVerifiedEmail()) {
            return redirect('home')->withInfo('Your email has already been verified');
        }

        event(new UserRequestedVerificationEmail($user));

        return redirect('auth/login')->withInfo('Verification email resent. Please check your inbox');
    }
}
