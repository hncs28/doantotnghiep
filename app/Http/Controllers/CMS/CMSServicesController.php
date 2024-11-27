<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\services;
use DB;
class CMSServicesController extends Controller
{
    public function index()
    {
      $services = DB::table('services')->get();
      return view('CMS/Services/CMSServices',compact('services'));
    }
    public function edit($serviceID)
    {
        $service = services::findOrFail($serviceID);
        return view('/CMS/Services/Services_update', compact('service'));
    }

    public function create() {
            $services = DB::table('services')->select('*')->get();
            return view('/CMS/Services/Services_create', compact('services'));
    }
    public function store(Request $request)
    {   
        // $test = $request->serviceName;
        // $service = DB::table('services')->where('serviceName','=',$test)->first();

        $service = new services;
        $service->serviceID = $request->serviceID; 
        $service->serviceName = $request->serviceName;
        $service->servicePrice = $request->servicePrice;
        $service->bandwidth = $request->bandwidth;
        $service->save();
        return redirect()->action([CMSServicesController::class,'index']);
    }

    public function show($serviceID)
    {
        $service = services::where('contractID', '=',$serviceID)->select('*')->first();
        
        return view('/CMS/Services/Service_detail', compact('service'));
    }
    public function destroy($serviceID)
    {
        $contract = services::where('contractID', '=', $serviceID)->delete();
    
        return redirect()->action([CMSServicesController::class,'index'])->with('success','Dữ liệu xóa thành công.');
    }
    public function update(Request $request, $contractID)
    {
        $service = services::find($contractID);
        $service->serviceID = $request->serviceID; 
        $service->serviceName = $request->serviceName;
        $service->servicePrice = $request->servicePrice;
        $service->bandwidth = $request->bandwidth;
        $service->save();
        return redirect()->action([CMSServicesController::class,'index']);
    }
}
