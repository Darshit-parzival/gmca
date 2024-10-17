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
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ExpertLectureController;
use App\Http\Controllers\StaffBackgroundController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StaffController;

// Client Routes

route::get('/', [IndexController::class, 'view_index']);

Route::get('/student', function () {
    return view('students/index');
});
Route::get('/about', function () {
    return view('static-pages/about');
});
Route::get('/contact', function () {
    return view('static-pages/contact');
});
Route::get('/news', function () {
    return view('news');
});
Route::get('/notice', function () {
    return view('notice');
});
Route::get('/disclaimer', function () {
    return view('static-pages/disclaimer');
});
Route::get('/library', function () {
    return view('static-pages/library');
});
Route::get('/academic', function () {
    return view('static-pages/academic');
});
Route::get('/clubs', function () {
    return view('clubs/student_clubs');
});

Route::get('/staff', [StaffController::class, 'get_staff']);
Route::get('/staffdetails/{staff_id}', [StaffController::class, 'get_staff_details']);

Route::get('/event', [EventController::class, 'view_public_events']);

Route::get('/giyf', [EventController::class, 'view_iyfevents']);
Route::get('/gcs', [EventController::class, 'view_csevents']);
Route::get('/mandatory', function () {
    return view('mandatory');
});
Route::get('/rti', function () {
    return view('static-pages/rti');
});
 
//contactus client side

route::post('/contact/add', [ContactController::class, 'store']);


route::get('/gallery', [DummyController::class, 'fetch_gallery']);

// Authentication Routes (Accessible to all users)
Route::get('/admin/login', [AuthController::class, 'view']);
Route::get('/admin/logout', [AuthController::class, 'logout']);
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/forgot-password', [AuthController::class, 'forgotPassword']);


// Protected Routes (Require Authentication)
Route::get('/admin', [AdminHomeController::class, 'view_admin']);

// Admin Routes (only admin role should have access)
Route::middleware(['auth:admin'])->group(function () {
    
    Route::get('/admin/admins', [AdminController::class, 'view_admin']);
    Route::post('/admin/edit', [AdminController::class, 'edit']);
    Route::post('/admin/add', [AdminController::class, 'add']);
    Route::get('/admin/delete/{id}', [AdminController::class, 'delete']);
    Route::post('/admin/generate-password', [AdminController::class, 'generatePassword']);

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
});

Route::middleware(['auth:faculty,admin'])->group(function () {
    // Student Routes
    Route::get('/admin/students', [StudentController::class, 'view_students']);
    Route::post('/student/add', [StudentController::class, 'add']);
    Route::post('/student/edit', [StudentController::class, 'edit']);
    Route::get('/student/delete/{id}', [StudentController::class, 'delete']);

    Route::get('/admin/profile', [ProfileController::class, 'index']);
    Route::post('/admin/profile/edit_profile', [ProfileController::class, 'edit_profile']);
    Route::post('/admin/profile/edit_password', [ProfileController::class, 'edit_password']);
    

    //experience
    Route::get('/admin/experience', [ExperienceController::class, 'index']);
    Route::post('/admin/experience/add', [ExperienceController::class, 'store']);
    Route::post('/admin/experience/edit', [ExperienceController::class, 'update']);
    Route::get('/admin/experience/delete/{id}', [ExperienceController::class, 'destroy']);


    //education
    Route::get('/admin/education', [EducationController::class, 'index']);
    Route::post('/admin/education/add', [EducationController::class, 'store']);
    Route::post('/admin/education/edit', [EducationController::class, 'update']);
    Route::get('/admin/education/delete/{id}', [EducationController::class, 'destroy']);

    //training
    Route::get('/admin/training', [TrainingController::class, 'index']);
    Route::post('/admin/training/add', [TrainingController::class, 'store']);
    Route::post('/admin/training/edit', [TrainingController::class, 'update']);
    Route::get('/admin/training/delete/{id}', [TrainingController::class, 'destroy']);

    // Expert Lecture Routes
    Route::get('/admin/expert-lecture', [ExpertLectureController::class, 'index'])->name('expert.index');
    Route::post('/admin/expert-lecture/add', [ExpertLectureController::class, 'store'])->name('expert.add');
    Route::post('/admin/expert-lecture/edit', [ExpertLectureController::class, 'update'])->name('expert.edit');
    Route::get('/admin/expert-lecture/delete/{id}', [ExpertLectureController::class, 'destroy'])->name('expert.delete');

    Route::get('/admin/staff-background', [StaffBackgroundController::class, 'index']);
    Route::post('/admin/staff-background/add', [StaffBackgroundController::class, 'store']);
    Route::post('/admin/staff-background/edit', [StaffBackgroundController::class, 'update']);
    Route::get('/admin/staff-background/delete/{id}', [StaffBackgroundController::class, 'destroy']);
});

Route::middleware(['auth:faculty,admin,clubco'])->group(function () {

    //Event Routes
    Route::get('/admin/events', [EventController::class, 'view_events']);
    Route::post('/event/add', [EventController::class, 'add']);
    Route::get('/event/delete/{id}', [EventController::class, 'delete']);
    Route::post('/event/edit/', [EventController::class, 'edit']);

    // Gallery Routes
    Route::get('/admin/gallery', [GalleryController::class, 'view_gallery']);
    Route::post('/admin/gallery/add', [GalleryController::class, 'add']);
    Route::get('/admin/gallery/delete/{id}', [GalleryController::class, 'delete']);
    Route::get('/admin/gallery/op/{id}', [GalleryController::class, 'change_status']);
});

