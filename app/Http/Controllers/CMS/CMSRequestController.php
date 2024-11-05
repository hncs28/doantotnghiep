<?php

namespace App\Http\Controllers\CMS;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CMSRequestController extends Controller
{
  public function gettech() {
    $requests= DB::table('requests')
    ->join('users','requests.userID','=','users.userID')
    ->join('supportdetail','requests.detailID','=','supportdetail.detailID')
    ->where('requests.supportID','=','1')
    ->select('requests.*','users.name','supportdetail.detailName')->get();
   return view('CMS\Requests\CMSTechRequests',compact('requests'));

  }
  public function getpay() {
    $requests= DB::table('requests')
    ->join('users','requests.userID','=','users.userID')
    ->join('supportdetail','requests.detailID','=','supportdetail.detailID')
    ->where('requests.supportID','=','3')
    ->select('requests.*','users.name','supportdetail.detailName')->get();
   return view('CMS\Requests\CMSPayRequests',compact('requests'));

  }
  public function getforma() {
    $requests= DB::table('requests')
    ->join('users','requests.userID','=','users.userID')
    ->join('supportdetail','requests.detailID','=','supportdetail.detailID')
    ->where('requests.supportID','=','2')
    ->select('requests.*','users.name','supportdetail.detailName')->get();
   return view('CMS\Requests\CMSFormaRequests',compact('requests'));

  }
  public function approvetech($requestID){
        DB::table('requests')
        ->where('requestID','=',$requestID)
        ->update(['requestState'=>'Đã xử lý']);
        return redirect()->action([CMSRequestController::class,'gettech']);
  }
  public function approvepay($requestID){
    DB::table('requests')
    ->where('requestID','=',$requestID)
    ->update(['requestState'=>'Đã xử lý']);
    return redirect()->action([CMSRequestController::class,'getpay']);
}
public function approveforma($requestID){
  DB::table('requests')
  ->where('requestID','=',$requestID)
  ->update(['requestState'=>'Đã xử lý']);
  return redirect()->action([CMSRequestController::class,'getforma']);
}
}

