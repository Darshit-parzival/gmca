<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function view_admin(){
        return view('admin.index');
    }
}
