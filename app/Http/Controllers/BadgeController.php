<?php

namespace App\Http\Controllers;

use App\Models\registration;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class BadgeController extends Controller
{
    function badgePrint(Request $req, $id)
    {
        try {
            $registration = registration::where("personsId", $id)->firstOrFail();
            $registration = json_decode($registration);
            $host = request()->getHttpHost();
            if ($registration) {
                return view("badge", ["registration" => $registration,'host' => $host]);
            }
        } catch (QueryException $exception) {
            return redirect()->route('root')->with('message', "500 Page not Found"
            // $exception->errorInfo[2]
            );
        }
    }
}
