<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayController extends Controller
{
    public function getpayment() {
        $userid = auth()->id();

      
        $contracts = DB::table('contracts')
            ->where('userID', '=', $userid)
            ->select('contractID')
            ->get(); 
        $paymentContracts = DB::table('payment')
            ->join('services', 'payment.serviceID', '=', 'services.serviceID')   
            ->join('contracts', 'payment.contractID', '=', 'contracts.contractID')   
            ->whereIn('payment.contractID', $contracts->pluck('contractID')) // Use whereIn for multiple IDs
            ->where('payment.status', '=', '0')
            ->select('payment.*', 'services.serviceName', 'services.servicePrice', 'contracts.contractID')
            ->get(); // Use get() to retrieve all matching payment records
    
        // Dump the result for debugging
        // dd($paymentContracts);
        return view('payment',compact('paymentContracts'));
      }

      public function gethistory() {
        $userid = auth()->id();
        $contracts = DB::table('contracts')
            ->where('userID', '=', $userid)
            ->select('contractID')
            ->get(); 
        $history = DB::table('payment')
        ->join('contracts', 'payment.contractID', '=', 'contracts.contractID') 
        ->join('services', 'payment.serviceID', '=', 'services.serviceID')
        ->whereIn('payment.contractID', $contracts->pluck('contractID'))
        ->select('payment.*','services.servicePrice','services.serviceName')
        ->get();
        // dd($history);
        return view('payment-history',compact('history'));
      }
}
