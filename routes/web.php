<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DummyController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WebPortalController;
use App\Http\Controllers\IndexController;

// Client Routes

route::get('/', [IndexController::class, 'view_index']);


Route::get('/about', function () {
    return view('about');
});
Route::get('/news', function () {
    return view('news');
});
Route::get('/notice', function () {
    return view('notice');
});
route::get('/gallery', [DummyController::class, 'fetch_gallery']);

// Authentication Routes (Accessible to all users)
Route::get('/admin/login', [AuthController::class, 'view']);
Route::get('/admin/logout', [AuthController::class, 'logout']);
Route::post('/admin/login', [AuthController::class, 'login']);

// Protected Routes (Require Authentication)
// Route::middleware(['auth'])->group(function () {
// Admin Routes
Route::get('/admin', [AdminHomeController::class, 'view_admin']);
Route::get('/admin/admins', [AdminController::class, 'view_admin']);
Route::post('/admin/edit', [AdminController::class, 'edit']);
Route::post('/admin/add', [AdminController::class, 'add']);
Route::get('/admin/delete/{id}', [AdminController::class, 'delete']);

// Event Routes
Route::get('/admin/events', [EventController::class, 'view_events']);
Route::post('/event/add', [EventController::class, 'add']);
Route::get('/event/delete/{id}', [EventController::class, 'delete']);
Route::post('/event/edit/', [EventController::class, 'edit']);

// Gallery Routes
Route::get('/admin/gallery', [GalleryController::class, 'view_gallery']);
Route::post('/admin/gallery/add', [GalleryController::class, 'add']);
Route::get('/admin/gallery/delete/{id}', [GalleryController::class, 'delete']);
Route::get('/admin/gallery/op/{id}', [GalleryController::class, 'change_status']);

// News Routes
Route::get('/admin/news', [NewsController::class, 'view_news']);
Route::post('/news/add', [NewsController::class, 'add']);
Route::post('/news/edit', [NewsController::class, 'edit']);
Route::get('/news/delete/{id}', [NewsController::class, 'delete']);

// Faculties Routes
Route::get('/admin/faculties', [AdminController::class, 'view_faculties']);

// Web Portal Routes (Slider)
Route::get('/admin/webportal', [WebPortalController::class, 'view_webportal']);
Route::post('/admin/webportal/add', [WebPortalController::class, 'add']);
Route::get('/admin/webportal/op/{id}', [WebPortalController::class, 'change_status']);
Route::get('/admin/webportal/delete/{id}', [WebPortalController::class, 'delete']);

// Web Portal Routes (About)
Route::get('/admin/webportal/about', [WebPortalController::class, 'view_webportal']);
Route::post('/admin/webportal/about/add', [WebPortalController::class, 'about_add']);

// Web Portal Routes (Vision & Mission)
Route::get('/admin/webportal/vision', [WebPortalController::class, 'view_webportal']);
Route::post('/admin/webportal/vision/add', [WebPortalController::class, 'vision_add']);
Route::post('/admin/webportal/mission', [WebPortalController::class, 'view_webportal']);
Route::post('/admin/webportal/mission/add', [WebPortalController::class, 'mission_add']);
// });
