<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpertLectureModel;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Validator;

class ExpertLectureController extends Controller
{
    public function index()
    {
        $admin = AdminModel::where('email', session('email'))->first();
        $staff_id = $admin->staff_id;
        $lectures = ExpertLectureModel::where('staff_id', $staff_id)->get();
        return view('admin.expert_lecture', compact('lectures'));
    }

    public function store(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:30',
            'details' => 'required|string',
            'location' => 'required|string|max:40',
            'status' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $lecture = new ExpertLectureModel();
        $admin = AdminModel::where('email', session('email'))->first();
        $lecture->staff_id = $admin->staff_id;
        $lecture->title = $request->title;
        $lecture->details = $request->details;
        $lecture->location = $request->location;
        $lecture->status = $request->status ? 1 : 0;
        $lecture->save();

        return redirect()->back()->with('success', 'Expert lecture added successfully.');
    }

    public function update(Request $request)
    {
        $id = $request->el_id;
        $lecture = ExpertLectureModel::find($id);
        if (!$lecture) {
            return redirect()->back()->with('error', 'Expert lecture not found.');
        }

        // Validation rules
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:30',
            'details' => 'required|string',
            'location' => 'required|string|max:40',
            'status' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $admin = AdminModel::where('email', session('email'))->first();
        $lecture->staff_id = $admin->staff_id;
        $lecture->title = $request->title;
        $lecture->details = $request->details;
        $lecture->location = $request->location;
        $lecture->status = $request->status ? 1 : 0;
        $lecture->save();

        return redirect()->back()->with('success', 'Expert lecture updated successfully.');
    }

    public function destroy($id)
    {
        $lecture = ExpertLectureModel::find($id);
        if (!$lecture) {
            return redirect()->back()->with('error', 'Expert lecture not found.');
        }

        $lecture->delete();
        return redirect()->back()->with('success', 'Expert lecture deleted successfully.');
    }
}
