<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;

class AuthController extends Controller
{
    function view(){
        return view('admin.login');
    }
    
    public function login(Request $req){
        $req->validate([
                "email"=>"required|email",
                "password"=>"required"
            ]);
        $existingUser = AdminModel::where('email', $req->email)->first();
        if ($existingUser) {
            if (md5($req->password) == $existingUser->password) {
                // if ($req->password == $existingUser->password) {
                session(['email' => $req->email]);
                return redirect("/admin");
            } else {
                return redirect()->back()->with('error', 'Invalid email or password');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    } 
    public function logout(Request $req){
        $req->session()->flush();
        return redirect("/");
    }
}
