<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\slip;

class userSlipDashboard extends Controller
{
    public function slipDashboard(Request $req)
    {
        $host = request()->getHttpHost();
        if (Auth::check()) {
            if (count($req->query())) {
                foreach ($req->query() as $key => $value) {
                    $slipsData = slip::where($key, '=', $value)->orderBy('Name')->get();
                    $slipsLength = sizeof(json_decode($slipsData));
                    $tableData = ["slipsData" => $slipsData, "slipsLength" => $slipsLength, "host" => $host];
                }
                $tableData = ["user" => Auth::user()->role, "slipsData" => $slipsData, "slipsLength" => $slipsLength, "host" => $host];
            } else {
                $tableData = ["user" => Auth::user()->role, "slipsData" => [], "slipsLength" => slip::where('status', 1)->count(), "host" => $host];
            }
            return view("slipDashboard", $tableData);
        } else {
            return redirect()->route('admin')->with('message', "Sorry We are unable to logged you in");
        }
    }
}
