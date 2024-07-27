<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
class AdminController extends Controller
{
    function view_admin() {
        $users = AdminModel::all();
        return view('admin.admins', compact('users'));
    }
    
}
