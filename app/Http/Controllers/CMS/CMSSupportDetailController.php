<?php

namespace App\Http\Controllers\CMS;
use App\Models\supportdetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;;

class CMSSupportDetailController extends Controller
{
    public function index()
    {
        $supportdetail = DB::table('supportdetail')
        ->join('supports','supportdetail.supportID','=','supports.supportID')
        ->select('supportdetail.*','supports.supportName')
        ->get();
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

        $supportdetail = new supportdetail;
        $supportdetail->detailID = $request->detailID; 
        $supportdetail->supportID = $request->supportID;
        $supportdetail->detailName = $request->detailName;
        $supportdetail->save();
        return redirect()->action([CMSSupportDetailController::class,'index']);
    }

    public function show($detailID)
    {
        $contract = supportdetail::where('contractID', '=',$detailID)->select('*')->first();
        
        return view('/CMS/supports/supports_detail', compact('contract'));
    }
    public function destroy($detailID)
    {
        $contract = supportdetail::where('contractID', '=', $detailID)->delete();
    
        return redirect()->action([CMSSupportDetailController::class,'index'])->with('success','Dữ liệu xóa thành công.');
    }
    public function update(Request $request, $contractID)
    {
        $supportdetail = supportdetail::find($contractID);
        $supportdetail->contractID = $request->contractID; 
        $supportdetail->userID = $request->userID;
        $supportdetail->serviceID = $request->serviceID;
        $supportdetail->validateuntil = $request->validateuntil;
        $supportdetail->save();
        return redirect()->action([CMSSupportDetailController::class,'index']);
    }
}
