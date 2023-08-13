<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\slip;
use App\Models\registration;




function badge($characters, $prefix)
{
    $possible = '0123456789';
    $code = $prefix;
    $i = 0;
    while ($i < $characters) {
        $code .= substr($possible, mt_rand(0, strlen($possible) - 1), 1);
        if ($i < $characters - 1) {
            $code .= "";
        }
        $i++;
    }
    return $code;
};

class userSlipGenerator extends Controller
{


    public function slipGenerator(Request $req)
    {
        if (Auth::check()) {
            $slip = new slip;
            $slipsData = [];
            for ($i = 0; $i < $req->numberOfslips; $i++) {
                $slipsNode = [
                    'Name' => $req->registrantName,
                    'PersonsId' => $req->registrantId,
                    'Badge' => $req->registrantBadge,
                    'SlipCode' => badge(10, "SL"),
                    'created_by' => Auth::id()
                ];
                array_push($slipsData, $slipsNode);
            }

            $savedSlip  = 0;
            try {
                $savedSlip = $slip->insert($slipsData);
                if ($savedSlip) {
                    $registration = registration::where('Badge', $req->registrantBadge)->update(['slipGenerated' => $req->numberOfslips]);
                }
                return redirect()->route('slipDashboard',['Badge' => $req->registrantBadge])->with('Badge',$req->registrantBadge);
            } catch (\Illuminate\Database\QueryException $exception) {
                // echo $exception->errorInfo[1];
                // return back()->withErrors(['msg' => $exception->errorInfo[1]]);
                return redirect()->route('dashboard')->with('message', $exception->errorInfo[2]);
            }
        } else {
            return redirect()->route('admin')->with('message', "Sorry We are unable to logged you in");
        }
    }
}
