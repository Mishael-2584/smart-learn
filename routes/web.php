<?php

use App\Http\Controllers\AuthenticationController;
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

Route::get('/login', function () { return view('auths.login');})->name('login');

Route::post('/submitlogin', [AuthenticationController::class, 'submitlogin'])->name('submitlogin');


Route::get('/', function () { return view('front.home'); })->name('front');

Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::get('/redirect', [AuthenticationController::class, 'redirect'])->name('redirect');

Route::get('/student_signup', function () { return view('auths.register1'); })->name('studentssignup');
Route::post('/student_submit', [AuthenticationController::class, 'studentssubmit'])->name('studentssubmit');

Route::get('/lecturer_signup', function () { return view('auths.lecturerregister'); })->name('lecturersignup');
Route::post('/lecturer_submit', [AuthenticationController::class, 'staffsubmit'])->name('lecturersubmit');
Route::get('/classroom', function () { return view('classroom'); })->name('classroom');




// ADMIN ROUTES
Route::middleware('admin')->group( function () {
    Route::prefix('admin')->group(function() {

        Route::get('', function () { return view('admin.dashboard'); })->name('admindashboard');
        Route::get('/newschool', function () { return view('admin.newschool'); })->name('newschool');
        Route::post('/post_school', [SchoolController::class, 'postschool'])->name('postschool');
        Route::get('/schoollist', [SchoolController::class, 'schoollist'])->name('schoollist');
    });
});


// STUDENT ROUTES
Route::middleware('student')->group(function () {   
    Route::prefix('student')->group(function () {

        Route::get('', function () { return view('student.dashboard'); })->name('studentdashboard');
        Route::get('studentclassroom', function () { return view('student.class'); })->name('studentclassroom');

    });
});


// LECTURER ROUTES

Route::group(['middleware' => 'lecturer'], function () {
    Route::prefix('lecturer')->group(function () {
        Route::get('', function () {
            return view('lecturer.dashboard');
        })->name('lecturerdashboard');
    });
});

