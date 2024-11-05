<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\requests;
use App\Models\supportdetail;

class RequestController extends Controller
{
 public function index() {
    $technical = DB::table('supportdetail')
    ->join('supports','supportdetail.supportID','=','supports.supportID')
    ->where('supportdetail.supportID','=','1')
    ->select('supportdetail.*','supports.supportName')
    ->get();
    $formality = DB::table('supportdetail')
    ->join('supports','supportdetail.supportID','=','supports.supportID')
    ->where('supportdetail.supportID','=','2')
    ->select('supportdetail.*','supports.supportName')
    ->get();
    $payment = DB::table('supportdetail')
    ->join('supports','supportdetail.supportID','=','supports.supportID')
    ->where('supportdetail.supportID','=','3')
    ->select('supportdetail.*','supports.supportName')
    ->get();
    $supports = DB::table('supports')->select('*')->get();

return view('request',compact('technical','formality','payment','supports'));
 }
 public function store(Request $request) {
    $userID = auth()->id();
   $supportID = DB::table('supportdetail')->where('detailID','=',$request->detail)->value('supportID');
    $support = new requests;
    $support->userID = $userID;
    $support->detailID = $request->detail;
    $support->supportID = $supportID;
    $support->requestState = 'Đang tiếp nhận';
    $support->requestdetail = $request->requestDetails;
    $support->save();
    return redirect()->action([RequestController::class,'index']);
 }
 public function history() {
    $userID = auth()->id();
    $requests = DB::table('requests')
    ->join('users','requests.userID','=','users.userID')
    ->join('supportdetail','requests.detailID','=','supportdetail.detailID')
    ->where('requests.userID','=',$userID)
    ->select('requests.*','users.name','supportdetail.detailName')->get();
    return view('history',compact('requests'));
 }
    
 }
