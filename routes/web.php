<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('index');
});
route::get('/admin',[AdminController::class,'view_admin']);