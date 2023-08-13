<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\slip;

class userSlipPrintController extends Controller
{
    public function slipPrint(Request $req, $badge, $SlipCode)
    {
        try {
            $slip = slip::where("SlipCode", $SlipCode)->firstOrFail();
            $host = request()->getHttpHost();
            if ($slip) {
                return view("slip", ["slip" => $slip, 'host' => $host, 'badge' => $badge]);
            }
        } catch (QueryException $exception) {
            return redirect()->route('slipDashboard', ['badge' => $badge])->with(
                'message',
                "500 Page not Found"
            );
        }
    }
}
