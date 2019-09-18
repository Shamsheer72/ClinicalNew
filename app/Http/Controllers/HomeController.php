<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\VerifyUser;
use App\Mail\VerifyMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function mail()
    {
        $user = Auth::user();

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time()),
        ]);

        Mail::to($user->email)->send(new VerifyMail($user));

        return redirect('/home');
    }

    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();

        if(isset($verifyUser) )
        {
            $user = $verifyUser->user;
            if(!$user->verified)
            {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            }
            else
            {
                $status = "Your e-mail is already verified. You can now login.";
            }
        }
        else
        {
            return redirect('/home')->with('warning', "Sorry your email cannot be identified.");
        }

        return redirect('/home')->with('status', $status);
    }
}
