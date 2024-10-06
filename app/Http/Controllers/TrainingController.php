<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingModel;  
use App\Models\AdminModel;
use Illuminate\Support\Facades\Validator;

class TrainingController extends Controller
{
    public function index()
    {
        $admin = AdminModel::where('email', session('email'))->first();
        $staff_id = $admin->staff_id; 
        $trainings = TrainingModel::where('staff_id', $staff_id)->get(); 
        return view('admin.training', compact('trainings'));
    }

    public function store(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:30',
            'organizer' => 'required|string|max:30',
            'duration' => 'required|integer|min:1',
            'status' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $training = new TrainingModel();
        $admin = AdminModel::where('email', session('email'))->first();
        $staff_id = $admin->staff_id;

        $training->staff_id = $staff_id;
        $training->title = $request->title;
        $training->organizer = $request->organizer;
        $training->duration = $request->duration;
        $training->status = $request->status ? 1 : 0;
        $training->save();

        return redirect()->back()->with('success', 'Training added successfully');
    }

    public function update(Request $request)
    {
        $id = $request->training_id;
        $training = TrainingModel::find($id);
        
        if (!$training) {
            return redirect()->back()->with('error', 'Training not found');
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:30',
            'organizer' => 'required|string|max:30',
            'duration' => 'required|integer|min:1',
            'status' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $training->title = $request->title;
        $training->organizer = $request->organizer;
        $training->duration = $request->duration;
        $training->status = $request->status ? 1 : 0;
        $training->save();

        return redirect()->back()->with('success', 'Training updated successfully');
    }

    public function destroy($id)
    {
        $training = TrainingModel::find($id);
        if (!$training) {
            return redirect()->back()->with('error', 'Training not found');
        }
        $training->delete();
        return redirect()->back()->with('success', 'Training deleted successfully');
    }
}
