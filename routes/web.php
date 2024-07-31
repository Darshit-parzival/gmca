<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;


//Client Routes
Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/news', function () {
    return view('news');
});
Route::get('/notice', function () {
    return view('notice');
});

//Authentication Routes
route::get('/admin/login', [AuthController::class, 'view']);
Route::get('/admin/logout', [AuthController::class, 'logout']);
Route::post('/admin/login', [AuthController::class, 'login']);

//Admin Routes
route::get('/admin', [AdminHomeController::class, 'view_admin']);
route::get('/admin/admins', [AdminController::class, 'view_admin']);
route::post('/admin/edit', [AdminController::class, 'edit']);
route::post('/admin/add', [AdminController::class, 'add']);
route::get('/admin/delete/{id}', [AdminController::class, 'delete']);

//Event Routes
route::get('/admin/events', [EventController::class, 'view_events']);
route::post('/event/add', [EventController::class, 'add']);
route::post('/event/delete/{id}', [EventController::class, 'delete']);
route::post('/event/edit/', [EventController::class, 'edit']);

//Gallery Routes
route::get('/admin/gallery', [GalleryController::class, 'view_gallery']);
