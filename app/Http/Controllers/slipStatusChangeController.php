<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\slip;

class slipStatusChangeController extends Controller
{
    public function slipStatusChange(Request $req, $badge, $SlipCode, $status)
    {
        if (Auth::check()) {
            $updatedSlip = slip::where('SlipCode', $SlipCode)->update(['status' => $status,'updated_by'=>Auth::id()]);
            // $slipsData = slip::where('Badge', '=', $badge)->orderBy('id')->get();
            // $slipsLength = sizeof(json_decode($slipsData));
            // $tableData = ["slipsData" => $slipsData, "slipsLength" => $slipsLength, "host" => $host];
            // return view("slipDashboard", $tableData);
            if($updatedSlip){
                return redirect()->route('slipDashboard', ['Badge' => $badge])->with('Badge', $badge);
            }
            else{
                return redirect()->route('slipDashboard', ['Badge' => $badge])->with('Badge', $badge)->with('message', "Please Try Again");
            }
        } else {
            return redirect()->route('admin')->with('message', "Sorry We are unable to logged you in");
        }
    }
}
