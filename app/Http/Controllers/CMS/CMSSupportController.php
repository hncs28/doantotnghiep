<?php

namespace App\Http\Controllers\CMS;
use DB;
use app\Models\supports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CMSSupportController extends Controller
{
    public function index()
    {
        $supports = DB::table('supports')->get();
        return view('CMS/Supports/CMSSupports', compact('supports'));
    }
    public function edit($contractID)
    {
        $contract = supports::findOrFail($contractID);
        return view('/CMS/Supports/Supports_update', compact('contract'));
    }

    public function create() {
            $supports = DB::table('supports')->select('*')->get();
            return view('/CMS/Supports/Supports_create', compact('supports'));
    }
    public function store(Request $request)
    {   

        $contract = new supports;
        $contract->contractID = $request->contractID; 
        $contract->userID = $request->userID;
        $contract->serviceID = $request->serviceID;
        $contract->validateuntil = $request->validateuntil;
        $contract->paymentstate = "0";
        $contract->save();
        return redirect()->action([CMSSupportController::class,'index']);
    }

    public function show($supportID)
    {
        $contract = supports::where('contractID', '=',$supportID)->select('*')->first();
        
        return view('/CMS/supports/supports_detail', compact('contract'));
    }
    public function destroy($supportID)
    {
        $contract = supports::where('contractID', '=', $supportID)->delete();
    
        return redirect()->action([CMSSupportController::class,'index'])->with('success','Dữ liệu xóa thành công.');
    }
    public function update(Request $request, $supportID)
    {
        $contract = supports::find($supportID);
        $contract->contractID = $request->contractID; 
        $contract->userID = $request->userID;
        $contract->serviceID = $request->serviceID;
        $contract->validateuntil = $request->validateuntil;
        $contract->save();
        return redirect()->action([CMSContractController::class,'index']);
    }
}
