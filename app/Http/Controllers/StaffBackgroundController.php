<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaffBackgroundModel;
use App\Models\AdminModel; // Assuming you have this model for staff data
use Illuminate\Support\Facades\Validator;

class StaffBackgroundController extends Controller
{
    public function index(Request $request)
{
    $admin = AdminModel::where('email', session('email'))->first();
    $staff_id = $admin->staff_id;

    // Get the filter type from the request
    $filterType = $request->get('filterType');

    // Query for staff backgrounds
    $query = StaffBackgroundModel::where('staff_id', $staff_id);

    if ($filterType) {
        $query->where('type', $filterType);
    }

    $staffBackgrounds = $query->get();

    return view('admin.staff_background', compact('staffBackgrounds'));
}


    public function store(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'type' => 'required|string|in:skills,course_taught,portfolio,publication,patent,prof_inst,research_project,academic_project,awards',
            'name' => 'required|string|max:30',
            'details' => 'required|string',
            'status' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new staff background entry
        $admin = AdminModel::where('email', session('email'))->first();
        $staff_id = $admin->staff_id;

        $background = new StaffBackgroundModel();
        $background->staff_id = $staff_id;
        $background->type = $request->type;
        $background->name = $request->name;
        $background->details = $request->details;
        $background->status = $request->status ? 1 : 0;
        $background->save();

        return redirect()->back()->with('success', 'Background added successfully');
    }

    public function update(Request $request)
    {
        $background = StaffBackgroundModel::find($request->bg_id);
        if (!$background) {
            return redirect()->back()->with('error', 'Background not found');
        }

        // Validation rules
        $validator = Validator::make($request->all(), [
            'type' => 'required|string|in:skills,course_taught,portfolio,publication,patent,prof_inst,research_project,academic_project,awards',
            'name' => 'required|string|max:30',
            'details' => 'required|string',
            'status' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $background->type = $request->type;
        $background->name = $request->name;
        $background->details = $request->details;
        $background->status = $request->status ? 1 : 0;
        $background->save();

        return redirect()->back()->with('success', 'Background updated successfully');
    }

    public function destroy($id)
    {
        $background = StaffBackgroundModel::find($id);
        if (!$background) {
            return redirect()->back()->with('error', 'Background not found');
        }
        
        $background->delete();
        return redirect()->back()->with('success', 'Background deleted successfully');
    }
}
