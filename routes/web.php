<?php

use App\Http\Controllers\CMS\CMSContractController;
use App\Http\Controllers\CMS\CMSRequestController;
use App\Http\Controllers\CMS\CMSUsersController;
use App\Http\Controllers\CMS\CMSServicesController;
use App\Http\Controllers\CMS\CMSSupportDetailController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\CMS\CMSSupportController;
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

#CMSServices
Route::get('CMS/Services',[CMSServicesController::class,'index'])->name('CMSServices');
Route::get('CMS/Services/edit/{serviceID}', [CMSServicesController::class,'edit']);
Route::get('/CMS/Services/create', [CMSServicesController::class,'create']);
Route::post('/CMS/Services/store', [CMSServicesController::class,'store']);
Route::get('/CMS/Services/{serviceID}', [CMSServicesController::class,'show']);
Route::DELETE('/CMS/Services/destroy/{serviceID}', [CMSServicesController::class,'destroy']);
Route::patch('CMS/Services/update/{serviceID}',[CMSServicesController::class,'update']);

#CMSSupports
Route::get('CMS/Supports',[CMSSupportController::class,'index']);
Route::get('CMS/Supports/edit/{suportID}', [CMSSupportController::class,'edit']);
Route::get('/CMS/Supports/create', [CMSSupportController::class,'create']);
Route::post('/CMS/Supports/store', [CMSSupportController::class,'store']);
Route::get('/CMS/Supports/{suportID}', [CMSSupportController::class,'show']);
Route::DELETE('/CMS/Supports/destroy/{suportID}', [CMSSupportController::class,'destroy']);
Route::patch('CMS/Supports/update/{suportID}',[CMSSupportController::class,'update']);

#CMSDetail
Route::get('CMS/Supportdetail',[CMSSupportDetailController::class,'index']);
Route::get('CMS/Supportdetail/edit/{detailID}', [CMSSupportDetailController::class,'edit']);
Route::get('/CMS/Supportdetail/create', [CMSSupportDetailController::class,'create']);
Route::post('/CMS/Supportdetail/store', [CMSSupportDetailController::class,'store']);
Route::get('/CMS/Supportdetail/{detailID}', [CMSSupportDetailController::class,'show']);
Route::DELETE('/CMS/Supportdetail/destroy/{detailID}', [CMSSupportDetailController::class,'destroy']);
Route::patch('CMS/Supportdetail/update/{detailID}',[CMSSupportDetailController::class,'update']);