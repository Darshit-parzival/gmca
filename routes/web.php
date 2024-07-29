<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('index');
});

//Authentication Routes
route::get('/admin/login',[AuthController::class,'view']);
Route::get('/admin/logout',[AuthController::class,'logout'] );
Route::post('/admin/login',[AuthController::class,'login'] );

//Admin Routes
route::get('/admin',[AdminHomeController::class,'view_admin']);
route::get('/admin/admins',[AdminController::class,'view_admin']);
route::post('/admin/edit',[AdminController::class,'edit']);
route::post('/admin/add',[AdminController::class,'add']);
route::get('/admin/delete/{id}',[AdminController::class,'delete']);
