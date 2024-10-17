<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\EducationModel;
use App\Models\ExperienceModel;
use App\Models\StaffBackgroundModel;
use App\Models\TrainingModel;
use App\Models\ExpertLectureModel;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    function get_staff(){
        $staff = AdminModel::where('isfaculty', 1)
                     ->orWhere('isstaff', 1)
                     ->get();
        return view('staff', compact('staff'));
    }

    function get_staff_details($staff_id){
        $staffdata = AdminModel::find($staff_id);
        if(!$staffdata){
            return redirect('/staff');
        }
        $educations = EducationModel::where('staff_id', $staff_id)->where('status',1)->get();
        $experience = ExperienceModel::where('staff_id', $staff_id)->where('status',1)->get();
        $expertLectures = ExpertLectureModel::where('staff_id', $staff_id)->where('status',1)->get();
        $trainings = TrainingModel::where('staff_id', $staff_id)->where('status',1)->get();
        $backgrounds = StaffBackgroundModel::where('staff_id', $staff_id)->where('status',1)->get();

        return view('staffdetails', compact('staffdata', 'educations', 'experience', 'expertLectures', 'trainings', 'backgrounds'));
    }
}
