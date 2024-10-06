<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExperienceModel;  
use App\Models\AdminModel;

use Illuminate\Support\Facades\Validator;

class ExperienceController extends Controller
{
    public function index()
    {
        $admin = AdminModel::where('email', session('email'))->first();
        $staff_id = $admin->staff_id;
        $admin = AdminModel::find($staff_id); 
        $experiences = $admin->experiences;
        return view('admin.experience', compact('experiences'));
    }

    public function store(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'designation' => 'required|string',
            'from' => 'required|integer',
            'to' => 'required|integer|gte:from',
            'organization' => 'required|string',
            'status' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $experience = new ExperienceModel();
        $admin = AdminModel::where('email', session('email'))->first();
        $staff_id = $admin->staff_id;
        $experience->staff_id = $staff_id;
        $experience->designation = $request->designation;
        $experience->from = $request->from;
        $experience->to = $request->to;
        $experience->organization = $request->organization;
        $experience->status = $request->status ? 1 : 0;
        $experience->save();
        return redirect()->back()->with('success', 'Experience added successfully');
    }
    public function update(Request $request)
    {
        $id=$request->exp_id;
        $experience = ExperienceModel::find($id);
        if (!$experience) {
            return redirect()->back()->with('error', 'Experience not found');
        }
        $validator = Validator::make($request->all(), [
            'designation' => 'required|string|max:30',
            'from' => 'required|integer',
            'to' => 'required|integer|gte:from',
            'organization' => 'required|string|max:50',
            'status' => 'nullable|boolean',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $admin = AdminModel::where('email', session('email'))->first();
        $staff_id = $admin->staff_id;
        $experience->staff_id = $staff_id;
        $experience->designation = $request->designation;
        $experience->from = $request->from;
        $experience->to = $request->to;
        $experience->organization = $request->organization;
        $experience->status = $request->status ? 1 : 0;
        $experience->save();
        return redirect()->back()->with('success', 'Experience updated successfully');
    }

    public function destroy($id)
    {
        $experience = ExperienceModel::find($id);
        if (!$experience) {
            return redirect()->back()->with('error', 'Experience not found');
        }
        $experience->delete();
        return redirect()->back()->with('success', 'Experience deleted successfully');
    }
}
