<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    function view_admin(){
        $sessionData = session()->all();

        // return response()->json($sessionData);
        return view('admin.index');
    }
}
