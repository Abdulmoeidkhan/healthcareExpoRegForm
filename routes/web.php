<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormResponseController;
use App\Http\Controllers\BadgeController;
use App\Http\Controllers\userSignUp;
use App\Http\Controllers\userSignIn;
use App\Http\Controllers\userSignOut;
use App\Http\Controllers\userResetController;
use App\Http\Controllers\userDashboard;
use App\Http\Controllers\fetchDataController;
use App\Http\Controllers\userSlipDashboard;
use App\Http\Controllers\userSlipGenerator;
use App\Http\Controllers\slipStatusChangeController;
use App\Http\Controllers\slipValidityChangeController;
use App\Http\Controllers\userSlipPrintController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('form');
})->name('form');

Route::get('/admin', function () {
    return view('signUp', ["user" => auth()->user()]);
})->name("admin");

Route::get('/badge/{id}', [BadgeController::class, "badgePrint"])->name("badge");
Route::get('/logout', [userSignOut::class, 'logout'])->name("logout");

Route::post('/submitForm', [FormResponseController::class, 'formResponse'])->name("formResponse");
Route::post('/userSignUp', [userSignUp::class, 'userSignUp'])->name("userSignUp");
Route::post('/userSignIn', [userSignIn::class, 'userSignIn'])->name("userSignIn");
Route::post('/userReset', [userResetController::class, 'userReset'])->name("userReset");

Route::group(['middleware' => 'prevent-back-history'], function () {
    // Route::post('/updateStatus', [statusUpdateController::class, 'updateStatus'])->name("updateStatus");
    Route::get('/slipPrint/{badge}/{SlipCode}', [userSlipPrintController::class, 'slipPrint'])->name("slipPrint");
    Route::get('/updateSlipStatus/{badge}/{SlipCode}/{status}', [slipStatusChangeController::class, 'slipStatusChange'])->name("slipStatusChange");
    Route::get('/updateSlipValidity/{badge}/{SlipCode}/{status}', [slipValidityChangeController::class, 'slipValidityChange'])->name("slipValidityChange");
    Route::post('/slipGenerator', [userSlipGenerator::class, 'slipGenerator'])->name("slipGenerator");
    Route::any('/dashboard', [userDashboard::class, 'dashboard'])->name("dashboard");
    Route::any('/slipDashboard', [userSlipDashboard::class, 'slipDashboard'])->name("slipDashboard");
    // Route::get('/NCCData', [userNCCData::class, 'NCCData'])->name("NCCData");
    // Route::get('/dashboardCompany', [companyDashboard::class, 'dashboardCompany'])->name("dashboardCompany");
    // Route::get('/completeProfile/{id}', [completeProfile::class, 'completeProfile'])->name("completeProfile");
});
