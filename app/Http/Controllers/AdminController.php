<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    function view_admin()
    {
        $admins = AdminModel::where('isadmin', 1)->get();
        return view('admin.admins', compact('admins'));
    }
    function add(Request $req)
    {
        $req->validate([
            "txtname" => "required|string|max:50",
            "txtemail" => "required|email|max:50",
            "txtphone" => "required|numeric",
            "txtdesignation" => "required|string|max:40",
            "txtexp_year" => "required|integer",
            "txtpass" => "required",
            "txtphoto" => "required|mimes:png,jpg,webp",
        ], [
            'txtemail.regex' => 'Please enter a valid email address.',
            'txtphone.numeric' => 'Phone number must be numeric.',
            'txtexp_year.integer' => 'Experience year must be an integer.',
        ]);
        $existingAdmin = AdminModel::where('email', $req->txtemail)->first();
        if ($existingAdmin) {
            return back()->with('error', 'Admin is already registered with this email!');
        }

        $admin = new AdminModel();
        $admin->name = $req->txtname;
        $admin->email = $req->txtemail;
        $admin->phone = $req->txtphone;
        $admin->gender = $req->txtgender;
        $admin->password = bcrypt($req->txtpass);

        if ($req->hasFile('txtphoto')) {
            $filename = time() . '.' . $req->file('txtphoto')->getClientOriginalExtension();
            $req->file('txtphoto')->move(public_path('assets/admin/images/admins'), $filename);
            $admin->photo = $filename;
        }
        $admin->isadmin = $req->has('txtisadmin') ? 1 : 0;
        $admin->isfaculty = $req->has('txtisfaculty') ? 1 : 0;
        $admin->isclubco = $req->has('txtisclubco') ? 1 : 0;
        $admin->islibrarian = $req->has('txtislibrarian') ? 1 : 0;
        $admin->isstaff = $req->has('txtisstaff') ? 1 : 0;
        $admin->designation = $req->txtdesignation;
        $admin->exp_year = $req->txtexp_year;
        $admin->save();
        return back()->with('success', 'Admin has been added successfully!');
    }
    function edit(Request $req)
    {
        $req->validate([
            "txtname" => "required|string|max:50",
            "txtemail" => "required|email|max:50",
            "txtphone" => "required",
            "txtphoto" => "mimes:png,jpg,webp",
        ], [
            'txtemail.regex' => 'Please enter a valid email address.',
            'txtphone.numeric' => 'Phone number must be numeric.',
            'txtexp_year.integer' => 'Experience year must be an integer.',
        ]);

        // dd($req->all());

        $admin = AdminModel::where("email", $req->txtemail)->first();
        if ($admin) {
            $admin->name = $req->txtname;
            $admin->email = $req->txtemail;
            $admin->phone = $req->txtphone;

            if ($req->hasFile('txtphoto')) {
                $filename = time() . '.' . $req->file('txtphoto')->getClientOriginalExtension();
                $req->file('txtphoto')->move(public_path('assets/admin/images/admins'), $filename);
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
    function delete($id)
    {
        $admin = AdminModel::find($id);
        if ($admin) {
            $imagePath = public_path('assets/admin/images/admins/' . $admin->photo);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $admin->delete();
            return redirect()->back()->with('success', 'admin deleted successfully.');
        }
        return redirect()->back()->with('error', 'admin not found.');
    }

    function view_faculties()
    {
        $admins = AdminModel::where('isfaculty', 1)->get();
        return view('admin.faculties', compact('admins'));
    }

    public function generatePassword(Request $req)
    {
        $staff_id = $req->txtid;
        $staff = AdminModel::findOrFail($staff_id);
        $password = Str::random(8);
        $staff->password = bcrypt($password);
        $staff->save();
        $details = [
            'title' => 'Your New Password',
            'body' => "Your new password is: $password"
        ];
        Mail::to($staff->email)->send(new \App\Mail\PasswordMail($details));
        return redirect()->back()->with('success', 'Password generated and emailed successfully!');
    }
}
