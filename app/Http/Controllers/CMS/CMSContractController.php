<?php

namespace App\Http\Controllers\CMS;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contracts;

class CMSContractController extends Controller
{
    public function index()
    {
        $contracts = DB::table('contracts')
            ->join('users', 'contracts.userID', '=', 'users.userID')
            ->join('services','contracts.serviceID','=','services.serviceID')
            ->select('contracts.*', 'users.name','services.serviceName')->get();
        return view('CMS/Contracts/CMSContracts', compact('contracts'));
    }
    public function edit($contractID)
    {
        $contract = contracts::findOrFail($contractID);
        return view('/CMS/Contracts/Contracts_update', compact('contract'));
    }

    public function create() {
            $services = DB::table('services')->select('*')->get();
            return view('/CMS/Contracts/Contracts_create', compact('services'));
    }
    public function store(Request $request)
    {   
        // $test = $request->serviceName;
        // $service = DB::table('services')->where('serviceName','=',$test)->first();

        $contract = new contracts;
        $contract->contractID = $request->contractID; 
        $contract->userID = $request->userID;
        $contract->serviceID = $request->serviceID;
        $contract->validateuntil = $request->validateuntil;
        $contract->paymentstate = "0";
        $contract->save();
        return redirect()->action([CMSContractController::class,'index']);
    }

    public function show($contractID)
    {
        $contract = contracts::where('contractID', '=',$contractID)->select('*')->first();
        
        return view('/CMS/contracts/contracts_detail', compact('contract'));
    }
    public function destroy($contractID)
    {
        $contract = contracts::where('contractID', '=', $contractID)->delete();
    
        return redirect()->action([CMSContractController::class,'index'])->with('success','Dữ liệu xóa thành công.');
    }
    public function update(Request $request, $contractID)
    {
        $contract = contracts::find($contractID);
        $contract->contractID = $request->contractID; 
        $contract->userID = $request->userID;
        $contract->serviceID = $request->serviceID;
        $contract->validateuntil = $request->validateuntil;
        $contract->save();
        return redirect()->action([CMSContractController::class,'index']);
    }
}
