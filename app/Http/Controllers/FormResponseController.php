<?php

namespace App\Http\Controllers;

use App\Models\registration;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Http;

function createSalt()
{
    $string = md5(uniqid(rand(), true));
    return substr($string, 5, 13);
}

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

class FormResponseController extends Controller
{

    function formResponse(Request $req)
    {

        // echo $req;
        // Personal Data
        $personal = new registration;
        $idNumber = $req->identity;
        $idNumber = str_replace("-", "", $idNumber);
        $personal->name = $req->Name;
        $personal->nationalID = $idNumber;
        $personal->dOB = $req->dob;
        $personal->gender = $req->gender;
        $personal->badge = badge(8, "VS");
        $personal->slips = $req->nos;
        $personal->nationality = $req->nationality;
        $personal->email = $req->email;
        $personal->cellPhone = $req->Ctc;
        $personal->personsId = $req->sessionId;
        $personal->interests = json_encode($req->interests);


        $savedPersonal  = 0;
        try {
            $savedPersonal = $personal->save();
            return redirect('badge/' . $personal->personsId);
        } catch (\Illuminate\Database\QueryException $exception) {
            print_r($exception->errorInfo);
            // return back()->withErrors(['msg' => $exception->errorInfo[1]]);
            // return redirect()->route('form')->with('message', $exception->errorInfo[2]);
        }
    }
}
