<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EducationModel;  
use App\Models\AdminModel;

use Illuminate\Support\Facades\Validator;

class EducationController extends Controller
{
    public function index()
    {
        $admin = AdminModel::where('email', session('email'))->first();
        $staff_id = $admin->staff_id;
        $educations = $admin->educations; // Assuming you have a relationship defined in AdminModel
        return view('admin.education', compact('educations'));
    }

    public function store(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'degree' => 'required|string|max:50',
            'university' => 'required|string|max:50',
            'percentage' => 'required|numeric',
            'cgpa' => 'required|numeric',
            'passyear' => 'required|integer',
            'status' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $education = new EducationModel();
        $admin = AdminModel::where('email', session('email'))->first();
        $staff_id = $admin->staff_id;
        $education->staff_id = $staff_id;
        $education->degree = $request->degree;
        $education->university = $request->university;
        $education->percentage = $request->percentage;
        $education->cgpa = $request->cgpa;
        $education->passyear = $request->passyear;
        $education->status = $request->status ? 1 : 0;
        $education->save();
        
        return redirect()->back()->with('success', 'Education added successfully');
    }

    public function update(Request $request)
    {
        $id = $request->edu_id; // Assuming you have a hidden input for education ID
        $education = EducationModel::find($id);
        if (!$education) {
            return redirect()->back()->with('error', 'Education not found');
        }
        
        $validator = Validator::make($request->all(), [
            'degree' => 'required|string|max:50',
            'university' => 'required|string|max:50',
            'percentage' => 'required|numeric',
            'cgpa' => 'required|numeric',
            'passyear' => 'required|integer',
            'status' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $admin = AdminModel::where('email', session('email'))->first();
        $staff_id = $admin->staff_id;
        $education->staff_id = $staff_id;
        $education->degree = $request->degree;
        $education->university = $request->university;
        $education->percentage = $request->percentage;
        $education->cgpa = $request->cgpa;
        $education->passyear = $request->passyear;
        $education->status = $request->status ? 1 : 0;
        $education->save();
        
        return redirect()->back()->with('success', 'Education updated successfully');
    }

    public function destroy($id)
    {
        $education = EducationModel::find($id);
        if (!$education) {
            return redirect()->back()->with('error', 'Education not found');
        }
        $education->delete();
        return redirect()->back()->with('success', 'Education deleted successfully');
    }
}
