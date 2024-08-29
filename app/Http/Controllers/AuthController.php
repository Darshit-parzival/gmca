<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
class AuthController extends Controller
{
    function view(){
        return view('admin.login');
    }
    
    public function login(Request $req)
    {
        $req->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $existingUser = AdminModel::where('email', $req->email)->first();

        if ($existingUser && Hash::check($req->password, $existingUser->password)) {
            session([
                'email' => $req->email,
                'role' => $this->getUserRole($existingUser)
            ]);
            return redirect("/admin");
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }

    public function logout(Request $req){
        $req->session()->flush();
        return redirect("/admin");
    }

    private function getUserRole($user) {
        if ($user->isadmin) {
            return 'admin';
        } elseif ($user->isfaculty) {
            return 'faculty';
        } elseif ($user->isclubco) {
            return 'clubco';
        } elseif ($user->islibrarian) {
            return 'librarian';
        } else {
            return 'staff';
        }
    }
    public function forgotPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $admin = AdminModel::where('email', $request->email)->first();
    if ($admin) {
        $password = Str::random(8);
        $admin->password = bcrypt($password);
        $admin->save();

        $details = [
            'title' => 'Your New Password',
            'body' => "Your new password is: $password"
        ];

        Mail::to($admin->email)->send(new \App\Mail\PasswordMail($details));

        return redirect('admin/login')->with('success','Password generated and emailed successfully!');
    } else {
        return redirect('admin/login')->with('error','This email is not registered!');
    }
}
}
