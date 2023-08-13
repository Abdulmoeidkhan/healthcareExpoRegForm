<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\registration;

class userDashboard extends Controller
{
    public function dashboard(Request $req)
    {
        $host = request()->getHttpHost();
        if (Auth::check()) {
            if (count( $req->query())) {
                foreach ($req->query() as $key => $value) {
                    $registrations = registration::where($key, '=', $value)->orderBy('Name')->get();
                    $registrationsLength = sizeof(json_decode($registrations));
                }
                $tableData = ["user" => Auth::user()->role, "registrations" => $registrations, "registrationsLength" => registration::where('status', 1)->count(), "host" => $host];
            } else {
                $tableData = ["user" => Auth::user()->role, "registrations" => [], "registrationsLength" => registration::where('status', 1)->count(), "host" => $host];
            }
            return view("dashboard", $tableData);
        } else {
            return redirect()->route('admin')->with('message', "Sorry We are unable to logged you in");
        }
    }
}
