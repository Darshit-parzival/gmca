<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    function view_admin() {
        $admins = AdminModel::all();
        return view('admin.admins', compact('admins'));
    }

    function edit(Request $req){
        $req->validate([
            "txtname" => "required|string|max:255",
            "txtemail" => "required|email|max:255",
            "txtphone" => "required|numeric",
            "txtdesignation" => "required|string|max:255",
            "txtexp_year" => "required|integer",
        ], [
            'txtemail.regex' => 'Please enter a valid email address.',
            'txtphone.numeric' => 'Phone number must be numeric.',
            'txtexp_year.integer' => 'Experience year must be an integer.',
        ]);
    
        $admin = AdminModel::find($req->staff_id);
        if ($admin) {
            $admin->name = $req->txtname;
            $admin->email = $req->txtemail;
            $admin->phone = $req->txtphone;
            $admin->gender = $req->txtgender;

            if ($req->hasFile('txtphoto')) {
                $filename = time() . '.' . $req->file('txtphoto')->getClientOriginalExtension();
                $req->file('txtphoto')->move(public_path('assets/images/admins'), $filename);
                if ($admin->photo && file_exists(public_path('assets/images/admins/' . $admin->photo))) {
                    unlink(public_path('assets/images/admins/' . $admin->photo));
                }
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
    
            return back()->with('success', 'Admin details updated successfully!');
        } else {
            return back()->with('error', 'Admin not found!');
      
        }
    }
    function delete($id){
        $admin=AdminModel::find($id);
        if(!is_null($admin)){
            $admin->delete();
            return redirect('/admin/admins')->with('success','Admin has been deleted!');
        }
        else{
            return redirect('/admin/admins')->with('error','Something went wrong!');
        }
    }
}
