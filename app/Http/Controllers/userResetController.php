<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userResetController extends Controller
{

    public function userReset(Request $req)
    {
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            return $req->newPass === $req->newConfirmPass ?
                // $resp = 1 :
                $resp = User::where('Email', $req->email)->update(['password' => Hash::make($req->newPass)]) :
                "Your Password did not Match";
            $req->session()->regenerate();
            Auth::logout();
            $req->session()->invalidate();
            $req->session()->regenerateToken();
        } else {
            return 'The provided credentials do not match our records.';
        }
    }
}
