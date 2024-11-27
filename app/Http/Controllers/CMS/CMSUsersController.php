<?php

namespace App\Http\Controllers\CMS;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class CMSUsersController extends Controller
{
    public function getusers() {
        $users = DB::table('users')->where('role','=','user')->get();
        return view('CMS/Users/CMSUsers',compact('users'));
    }
    public function edit($userID)
    {
        $user = User::findOrFail($userID);
        return view('/CMS/Users/Users_update', compact('user'));
    }

    public function create() {
            return view('/CMS/Users/Users_create');
    }
    public function store(Request $request)
    {
        
        $user = new User;
        $user->name = $request->name; 
        $user->email = $request->email;
        $user->userAddress = $request->userAddress;
        $user->userPhone = $request->userPhone;
        $user->password = Hash::make($request->input('password'));
        $user->Role = $request->Role;
        $user->save();
        return redirect()->action([CMSUsersController::class,'getusers']);
    }

    public function show($userID)
    {
        $user = User::where('userID', '=',$userID)->select('*')->first();
        
        return view('/CMS/Users/Users_detail', compact('user'));
    }
    public function destroy($userID)
    {
        $user = User::where('userID', '=', $userID)->delete();
    
        return redirect()->action([CMSUsersController::class,'getusers'])->with('success','Dữ liệu xóa thành công.');
    }
    public function update(Request $request, $userID)
    {
        $user = User::find($userID);
        $user->name = $request->name; 
        $user->email = $request->email;
        $user->userAddress = $request->userAddress;
        $user->userPhone = $request->userPhone;
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect()->action([CMSUsersController::class,'getusers']);
    }
}
