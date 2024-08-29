<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    function view_admin(){
        if (session('email') != NULL) {
        $sessionData = session()->all();
        return view('admin.index');
        }
        else{
            return redirect('admin/login');
        }
    }
}
