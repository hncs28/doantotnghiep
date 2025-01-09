<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\routers;
use DB;
class CMSRouterController extends Controller
{
    public function index()
    {
        $routers = DB::table('routers')
            ->select('*')->get();
        return view('CMS/Routers/CMSRouters', compact('routers'));
    }
    public function edit($routerID)
    {
        $routers = routers::findOrFail($routerID);
        return view('/CMS/Routers/Routers_update', compact('routers'));
    }

    public function create() {
            $routers = DB::table('routers')->select('*')->get();
            return view('/CMS/Routers/Routers_create', compact('routers'));
    }
    public function store(Request $request)
    {   
        // $test = $request->serviceName;
        // $service = DB::table('services')->where('serviceName','=',$test)->first();

        $routers = new routers;
        $routers->routerName = $request->routerName;
        $routers->contractID = $request->contractID;
        $routers->routerState = "1";
        $routers->save();
        return redirect()->action([CMSRouterController::class,'index']);
    }

    public function show($routerID)
    {
        $routers = routers::where('contractID', '=',$routerID)->select('*')->first();
        
        return view('/CMS/Routers/Routers_detail', compact('routers'));
    }
    public function destroy($routerID)
    {
        $contract = routers::where('routerID', '=', $routerID)->delete();
    
        return redirect()->action([CMSRouterController::class,'index'])->with('success','Dữ liệu xóa thành công.');
    }
    public function update(Request $request, $routerID)
    {
        $routers = routers::find($routerID);
        $routers->routerName = $request->routerName;
        $routers->contractID = $request->contractID;
        $routers->routerState = "1";
        $routers->save();
        return redirect()->action([CMSRouterController::class,'index']);
    }
}
