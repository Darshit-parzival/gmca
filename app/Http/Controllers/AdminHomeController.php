<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    function view_admin(){
        return view('admin.index');
    }
}
