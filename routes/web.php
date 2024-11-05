<?php

use App\Http\Controllers\CMS\CMSContractController;
use App\Http\Controllers\CMS\CMSRequestController;
use App\Http\Controllers\CMS\CMSUsersController;
use App\Http\Controllers\MqttController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\PayController;

Route::get('/', function () {
    return view('trangchu');
})->name('trangchu');

#auth
Route::get('/login', function () {
    return view('auth/login');
});
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/registerform', function () {
    return view('auth/register');
});
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/contract', [ContractController::class, 'get']);

Route::get('/infor', [AccountController::class, 'first'])->name('infor');

Route::get('/account', [AccountController::class, 'index'])->name('account');
Route::get('/change-password', [ChangePasswordController::class, 'showChangePasswordForm'])->name('change.password.form');
Route::post('/change-password', [ChangePasswordController::class, 'changePassword'])->name('change.password');

#payment
Route::get('/payment', [PayController::class, 'getpayment'])->name('getpayment');
Route::post('/checkout/{contractID}', [StripeController::class, 'checkout'])->name('checkout');
Route::get('/success/{contractID}', [StripeController::class, 'success'])->name('success');
Route::get('/payment-history', [PayController::class, 'gethistory'])->name('gethistory');
#request
Route::get('/getrequest',[RequestController::class,'index'])->name('request');
Route::post('/storerequest',[RequestController::class,'store'])->name('request-store');
Route::get('/history',[RequestController::class,'history'])->name('history');
#CMSUSers
Route::get("/CMS/Users",[CMSUsersController::class,'getusers']);
Route::get('CMS/Users/edit/{userID}', [CMSUsersController::class,'edit']);
Route::get('/CMS/Users/create', [CMSUsersController::class,'create']);
Route::post('/CMS/Users/store', [CMSUsersController::class,'store']);
Route::get('/CMS/Users/{userID}', [CMSUsersController::class,'show']);
Route::DELETE('/CMS/Users/destroy/{userID}', [CMSUsersController::class,'destroy']);
Route::patch('CMS/Users/update/{userID}',[CMSUsersController::class,'update']);

#CMSContract
Route::get('/CMS/Contracts', [CMSContractController::class, 'index'])->name('CMSContract');
Route::get('CMS/Contracts/edit/{contractID}', [CMSContractController::class,'edit']);
Route::get('/CMS/Contracts/create', [CMSContractController::class,'create']);
Route::post('/CMS/Contracts/store', [CMSContractController::class,'store']);
Route::get('/CMS/Contracts/{contractID}', [CMSContractController::class,'show']);
Route::DELETE('/CMS/Contracts/destroy/{contractID}', [CMSContractController::class,'destroy']);
Route::patch('CMS/Contracts/update/{contractID}',[CMSContractController::class,'update']);

#CMSRequest
Route::get('/CMS/TechRequests',[CMSRequestController::class,'gettech'])->name('CMSTechRequest');
Route::post('CMS/TechRequests/update/{requestID}',[CMSRequestController::class,'approvetech'])->name('approvetech');
Route::get('/CMS/PayRequests',[CMSRequestController::class,'getpay'])->name('CMSPayRequests');
Route::post('CMS/PayRequests/update/{requestID}',[CMSRequestController::class,'approvepay'])->name('approvepay');
Route::get('/CMS/FormaRequests',[CMSRequestController::class,'getforma'])->name('CMSFormaRequests');
Route::post('CMS/FormaRequests/update/{requestID}',[CMSRequestController::class,'approveforma'])->name('approveforma');
