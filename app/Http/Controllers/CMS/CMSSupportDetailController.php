<?php

namespace App\Http\Controllers\CMS;
use App\Models\supportdetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CMSSupportDetailController extends Controller
{
    public function index()
    {
        $supportdetail = DB::table('supportdetail')->get();
        return view('CMS/Supportdetail/CMSSupportdetail', compact('supportdetail'));
    }
    public function edit($detailID)
    {
        $supportdetail = supportdetail::findOrFail($detailID);
        return view('/CMS/Supportdetail/Supportdetail_update', compact('supportdetail'));
    }

    public function create() {
            $supportdetail = DB::table('supportdetail')->select('*')->get();
            return view('/CMS/Supportdetail/Supportdetail_create', compact('supportdetail'));
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
    public function update(Request $request, $contractID)
    {
        $contract = supports::find($contractID);
        $contract->contractID = $request->contractID; 
        $contract->userID = $request->userID;
        $contract->serviceID = $request->serviceID;
        $contract->validateuntil = $request->validateuntil;
        $contract->save();
        return redirect()->action([CMSContractController::class,'index']);
    }
}
