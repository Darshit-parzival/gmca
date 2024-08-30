<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
// use App\Models\ContactController; 
use App\Models\EventModel; 
use App\Models\StudentModel; 
use App\Models\NewsModel;

class AdminHomeController extends Controller
{
    function view_admin()
    {
        if (session('email') != NULL) {
            $sessionData = session()->all();
            
            // Fetching data from the database
            $totalAdmins = AdminModel::where('isadmin', 1)->count();
            $totalFaculties = AdminModel::where('isfaculty', 1)->count();
            // $totalContacts = Contact::count();
            $totalContacts=0;
            $totalEvents = EventModel::count();
            $totalStudents = StudentModel::count();
            $totalNews = NewsModel::count();

            // Passing data to the view
            return view('admin.index', compact('totalAdmins', 'totalFaculties', 'totalContacts', 'totalEvents', 'totalStudents', 'totalNews'));
        } else {
            return redirect('admin/login');
        }
    }
}
