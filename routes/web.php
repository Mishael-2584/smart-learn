<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\SchoolController;
use App\Http\Middleware\LecturerMiddleware;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () { return view('auths.login'); })->name('login');

Route::post('/submitlogin', [AuthenticationController::class, 'submitlogin'])->name('submitlogin');



Route::get('/', function () { return view('front.home'); })->name('front');

Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::get('/redirect', [AuthenticationController::class, 'redirect'])->name('redirect');

Route::get('/student_signup', function () { return view('auths.register1'); })->name('studentssignup');
Route::post('/student_submit', [AuthenticationController::class, 'studentssubmit'])->name('studentssubmit');

Route::get('/lecturer_signup', function () { return view('auths.lecturerregister'); })->name('lecturersignup');
Route::post('/lecturer_submit', [AuthenticationController::class, 'staffsubmit'])->name('lecturersubmit');



// ADMIN ROUTES
Route::middleware('admin')->group( function () {
    Route::prefix('admin')->group(function() {

        Route::get('', function () { return view('admin.dashboard'); })->name('admindashboard');
        Route::get('/newschool', function () { return view('admin.newschool'); })->name('newschool');
        Route::post('/post_school', [SchoolController::class, 'postschool'])->name('postschool');
        Route::get('/schoollist', [SchoolController::class, 'schoollist'])->name('schoollist');

        Route::get('/newdepartment', [DepartmentController::class, 'newdepartment'])->name('newdepartment');
        Route::post('/post_department', [DepartmentController::class, 'postschool'])->name('postdepartment');
        Route::get('/departmentlist', [DepartmentController::class, 'departmentlist'])->name('departmentlist');
        
        Route::get('/newmajor', [MajorController::class, 'newmajor'])->name('newmajor');
        Route::post('/post_major', [MajorController::class, 'postmajor'])->name('postmajor');
        Route::get('/majorlist', [MajorController::class, 'majorlist'])->name('majorlist');

        
        Route::get('/departments/{schoolId}', [MajorController::class, 'index'])->name('schoollookup');
        // Route::get('/majors/{departmentId}', [CourseController::class, 'index'])->name('departmentlookup');
        Route::get('/newcourse', [CourseController::class, 'newcourse'])->name('newcourse');
        Route::post('post_course', [CourseController::class, 'postcourse'])->name('postcourse');
        Route::post('post_course_geds', [CourseController::class, 'postcoursegeds'])->name('postcoursegeds');
        Route::post('/post_course_unique', [CourseController::class, 'postcourseunique'])->name('postcourseunique');
        Route::get('/courselist', [CourseController::class, 'courselist'])->name('courselist');

        Route::get('pendinglecturers', [LecturerController::class, 'pendinglecturers'])->name('pendinglecturers');
        Route::post('approvelecturers', [LecturerController::class, 'approvelecturers'])->name('approvelecturers');



    });
});


// STUDENT ROUTES
Route::middleware('student')->group(function () {   
    Route::prefix('student')->group(function () {

        Route::get('', function () {
            return view('student.dashboard');
        })->name('studentdashboard');

    });
});


// LECTURER ROUTES

Route::group(['middleware' => 'lecturer'], function () {
    Route::prefix('lecturer')->group(function () {
        Route::get('', [LecturerController::class, 'dashboard'])->name('lecturerdashboard');
        Route::get('/status', [LecturerController::class, 'status'])->name('status');

        Route::match(['get', 'post'], '/lecturerprofileinfo', [LecturerController::class, 'lecturerprofileinfo'])->name('lecturerprofileinfo');
        Route::post('/updatelecturerprofileinfo', [LecturerController::class, 'updatelecturerprofileinfo'])->name('updatelecturerprofileinfo');

        Route::group(['middleware' => 'verifyLecturer'], function () {
            Route::get('/enrollcourse', [LecturerController::class, 'enrollcourse'])->name('enrollcourse');
            Route::get('/lecturer_enrollcourse/{courseId}', [EnrollmentController::class, 'lecturerenrollcourse'])->name('lecturerenrollcourse');
            Route::post('/enrolldepartmental/{courseId}', [EnrollmentController::class, 'enrolldepartmental'])->name('enrolldepartmental');
            
        });





    });
});

