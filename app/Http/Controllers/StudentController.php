<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\StudentModel;

class StudentController extends Controller
{
    public function view_students(){
        $students=StudentModel::all();
        return view('admin.students')->with(compact('students'));
    }

    public function delete($id){
        $student=StudentModel::find($id);
        if ($student) {
            $student->delete();
            return redirect()->back()->with('success', 'Student deleted successfully.');
        }
        return redirect()->back()->with('error', 'Student not found.');
    }

    public function add(Request $req) {
        // $req->validate([
        //     'fname' => 'required|string|max:255',
        //     'lname' => 'required|string|max:255',
        //     'gender' => 'required',
        //     'enroll' => 'required|string|unique:student_data,enroll',
        //     'mobile' => 'required|string|max:15',
        //     'email' => 'required|email|unique:student_data,email',
        //     'admission_year' => 'required|integer',
        //     'dob' => 'required|date',
        //     'city' => 'required|string|max:255',
        //     'district' => 'required|string|max:255',
        //     'state' => 'required|string|max:255',
        //     'pincode' => 'required|string|max:10',
        //     'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        // ]);
        $student = new StudentModel;
        
        $student->enroll = $req->enroll;
        $student->fname = $req->fname;
        $student->mname = $req->mname;
        $student->lname = $req->lname;
        $student->gender = $req->gender;
        $student->mobile = $req->mobile;
        $student->alt_mobile = $req->alt_mobile;
        $student->wmobile = $req->wmobile;
        $student->email = $req->email;
        $student->admission_year = $req->admission_year;
        $student->aadhar = $req->aadhar;
        $student->isstudent = 1;
        $student->caste_type = $req->caste_type;
        $student->abc_id = $req->abc_id;
        $student->address = $req->address;
        $student->graduation_stream = $req->graduation_stream;
        $student->acpc_rollno = $req->acpc_rollno;
        $student->dob = $req->dob;
        $student->voterid = $req->voterid;
        $student->city = $req->city;
        $student->district = $req->district;
        $student->state = $req->state;
        $student->pincode = $req->pincode;
        $student->admission_cat = $req->admission_cat;
        $student->minority = $req->minority;
        $student->admission_round = $req->admission_round;
        $student->tfw = $req->tfw;
        
        // Handle file upload for photo
        if ($req->hasFile('photo')) {
            $file = $req->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/images/students'), $filename);
            $student->photo = $filename;
        }
        
        $student->save();
    
        return redirect('/students')->with('success', 'Student added successfully.');
    }
    
    public function edit(Request $req){
        $student = StudentModel::find($req->id);
    
        $student->enroll = $req->enroll;
        $student->fname = $req->fname;
        $student->mname = $req->mname;
        $student->lname = $req->lname;
        $student->gender = $req->gender;
        $student->mobile = $req->mobile;
        $student->alt_mobile = $req->alt_mobile;
        $student->wmobile = $req->wmobile;
        $student->email = $req->email;
        $student->admission_year = $req->admission_year;
        $student->aadhar = $req->aadhar;
        $student->isstudent = $req->isstudent;
        $student->caste_type = $req->caste_type;
        $student->abc_id = $req->abc_id;
        $student->address = $req->address;
        $student->graduation_stream = $req->graduation_stream;
        $student->acpc_rollno = $req->acpc_rollno;
        $student->dob = $req->dob;
        $student->voterid = $req->voterid;
        $student->city = $req->city;
        $student->district = $req->district;
        $student->state = $req->state;
        $student->pincode = $req->pincode;
        $student->admission_cat = $req->admission_cat;
        $student->minority = $req->minority;
        $student->admission_round = $req->admission_round;
        $student->tfw = $req->tfw;
        
        // Handle file upload for photo
        if ($req->hasFile('photo')) {
            $file = $req->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/admin/images/students'), $filename);
            $student->photo = $filename;
        }
        
        $student->save();
    
        return redirect('/students')->with('success', 'Student updated successfully.');
    }
}
