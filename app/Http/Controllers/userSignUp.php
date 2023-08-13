<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userSignUp extends Controller
{
    public function userSignUp(Request $req)
    {
        $resp = 0;
        $err = "";
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        if ($req->password === $req->confirmPass) {
            if ($req->csrf === "34821159") {
                $resp = $user->save();
            } else {
                $err =  "CSRF is not correct";
            }
        } else if ($req->password !== $req->confirmPass) {
            $err =  "Password does not match";
        }
        return $resp ? $resp : $err;
    }
}
