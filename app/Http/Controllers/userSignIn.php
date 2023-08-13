<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class userSignIn extends Controller
{
    public function userSignIn(Request $req)
    {
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $req->session()->regenerate();
            return "Logged In Successfully";
        } else {
            return 'The provided credentials do not match our records.';
        }
    }
}
