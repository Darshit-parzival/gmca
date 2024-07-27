<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHomeController;

use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('index');
});
route::get('/admin',[AdminHomeController::class,'view_admin']);
route::get('/admin/admins',[AdminController::class,'view_admin']);
