<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    public function index(){
        $admin = AdminModel::where('email', session('email'))->first(); 
        return view('admin.profile')->with('admin', $admin);
    }
    public function edit_password(Request $req)
    {
        $admin = AdminModel::where('email', session('email'))->first();
        $req->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password'=>'required|same:new_password', 
        ]);
        if (Hash::check($req->current_password, $admin->password)) {
            $admin->password = Hash::make($req->new_password);
            $admin->save();
    
            return back()->with('success', 'Your password has been changed!');
        } else {
            return back()->with('error', 'You have entered the wrong current password!');
        }
    }
    public function edit_profile(Request $req){
        $admin = AdminModel::where('email', session('email'))->first(); 
        $req->validate([
            "name" => "required|string|max:50",
            "email" => "required|email|max:50",
            "phone" => "required",
        ]);
    
        $admin = AdminModel::where( "email",$req->email)->first();
        if ($admin) {
            $admin->name = $req->name;
            $admin->email = $req->email;
            $admin->phone = $req->phone;
            if ($req->hasFile('photo')) {
                $filename = time() . '.' . $req->file('photo')->getClientOriginalExtension();
                $req->file('photo')->move(public_path('assets/admin/images/admins'), $filename);
                if ($admin->photo && file_exists(public_path('assets/admin/images/admins/' . $admin->photo))) {
                    unlink(public_path('assets/admin/images/admins/' . $admin->photo));
                }
                $admin->photo = $filename;
            }
            $admin->save();
            return back()->with('success', 'Admin details updated successfully!');
        } else {
            return back()->with('error', 'Admin not found!');
        }
    }
}
