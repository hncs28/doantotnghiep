<?php

namespace App\Http\Controllers;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;
use App\Models\contracts;
use App\Models\cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\payment;

class StripeController extends Controller
{
    public function checkout($contractID)
{
    // Set the Stripe API key
    Stripe::setApiKey(config('stripe.sk'));

    $contract = DB::table('payment')
    ->join('services', 'payment.serviceID', '=', 'services.serviceID')   
    ->join('contracts', 'payment.contractID', '=', 'contracts.contractID')   
    ->where('payment.contractID','=',$contractID)
    ->where('payment.status','=','0')
    ->select('payment.*','services.serviceName', 'services.servicePrice','contracts.contractID')
    ->first();
    // Check if the contract was found
    if (!$contract) {
        return redirect()->route('getpayment')->with('error', 'Contract not found.');
    }

    // Create line items for Stripe
    $line_items = [];
    $line_items[] = [
        'price_data' => [
            'currency' => 'vnd',
            'product_data' => [
                'name' => $contract->contractID, // Access the property of the object
            ],
            'unit_amount' => $contract->servicePrice, // Access the property of the object
        ],
        'quantity' => 1, // Set quantity as needed
    ];

    // Create a Stripe session
    $session = Session::create([
        'line_items' => $line_items,
        'mode' => 'payment',
        'success_url' => route('success', ['contractID' => $contractID]),
        'cancel_url' => route('getpayment'),
    ]);

    // Redirect to the Stripe checkout page
    return redirect()->away($session->url);
}

    public function success($contractID)
    {   
      
        $userid = auth()->id(); // Get the authenticated user's ID
        $contracts = DB::table('contracts')
        ->where('userID', '=', $userid)
        ->select('contractID')
        ->get(); 
        // Update the paymentstate for contracts where paymentstate is 0
        DB::table('payment')
            ->where('contractID', $contractID)
            ->where('status', '0') // Ensure only unpaid contracts are updated
            ->update(['status' => '1']); // Change paymentstate to 1
  
            $paymentContracts = DB::table('payment')
            ->join('services', 'payment.serviceID', '=', 'services.serviceID')   
            ->join('contracts', 'payment.contractID', '=', 'contracts.contractID')   
            ->whereIn('payment.contractID', $contracts->pluck('contractID')) // Use whereIn for multiple IDs
            ->where('payment.status', '=', '0')
            ->select('payment.*', 'services.serviceName', 'services.servicePrice', 'contracts.contractID')
            ->get(); 
    
        // Return the payment view with updated contracts
        return view('payment', compact('paymentContracts'));}
    
}
