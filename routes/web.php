<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ClassroomStreamPostController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\JitsiController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\LecturerCourseController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\LecturerMiddleware;
use App\Models\LecturerCourse;
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

Route::get('/student_signup', function () { return view('auths.studentregister'); })->name('studentssignup');
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

        Route::get('/enrollmentapprovals', [AdminController::class, 'enrollmentapprovals'])->name('enrollmentapprovals');

        Route::post('/approvecourses', [AdminController::class, 'approvecourses'])->name('approvecourses');

        Route::post('/approveStudents', [AdminController::class, 'approveStudents'])->name('adminapproveStudents');

        Route::get('/adminpendingstudents', [AdminController::class, 'adminpendingstudents'])->name('adminpendingstudents');

        


    });
});


// STUDENT ROUTES
Route::middleware('student')->group(function () {   
    Route::prefix('student')->group(function () {

        Route::get('', [StudentController::class, 'dashboard'])->name('studentdashboard');
        Route::get('/status', [StudentController::class, 'status'])->name('studentstatus');
        Route::match(['get', 'post'], '/studentprofileinfo', [StudentController::class, 'studentprofileinfo'])->name('studentprofileinfo');
        Route::post('/updatestudentprofileinfo', [StudentController::class, 'updatestudentprofileinfo'])->name('updatestudentprofileinfo');


        Route::group(['middleware' => 'verifyStudent'], function () {
            
            
            Route::get('/student_enrollcourse', [StudentController::class, 'studentenrollcourse'])->name('studentenrollcourse');
            Route::get('/studentenrolldept/{lcId}', [StudentController::class, 'studentenrolldept'])->name('studentenrolldept');
            Route::get('/studentenrollgeds/{lcId}', [StudentController::class, 'studentenrollgeds'])->name('studentenrollgeds');
            Route::get('/studentenrollunique/{lcId}', [StudentController::class, 'studentenrollunique'])->name('studentenrollunique');

            Route::post('/submitstudentenrolldept/{lcId}', [StudentController::class, 'submitstudentenrolldept'])->name('submitstudentenrolldept');
            Route::post('/submitstudentenrollgeds/{lcId}', [StudentController::class, 'submitstudentenrollgeds'])->name('submitstudentenrollgeds');
            Route::post('/submitstudentenrollunique/{lcId}', [StudentController::class, 'submitstudentenrollunique'])->name('submitstudentenrollunique');

            Route::get('/mystudentclasses', [StudentController::class, 'mystudentclasses'])->name('mystudentclasses');
            Route::get('/studentopencourse/{eId}', [StudentController::class, 'studentopencourse'])->name('studentopencourse');

            Route::get('/jitsimeetingstudent/{eId}', [JitsiController::class, 'jitsimeetingstudent'])->name('jitsimeetingstudent');

            
            



            

        });

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
            Route::get('/myclasses', [CourseController::class, 'myclasses'])->name('myclasses');
            Route::get('/enrollgedscourse/{courseId}', [EnrollmentController::class, 'lecturerenrollgedscourse'])->name('lecturerenrollgedscourse');
            Route::post('/enrollgeds/{courseId}', [EnrollmentController::class, 'enrollgeds'])->name('enrollgeds');
            Route::get('/enrolluniquecourse/{courseId}', [EnrollmentController::class, 'lecturerenrolluniquecourse'])->name('lecturerenrolluniquecourse');
            Route::post('/enrollunique/{courseId}', [EnrollmentController::class, 'enrollunique'])->name('enrollunique');
            
            Route::get('/lectureropencourse/{lcId}', [LecturerCourseController::class, 'lectureropencourse'])->name('lectureropencourse');
            Route::get('/jitsimeeting/{lcId}', [JitsiController::class, 'generatetoken'])->name('jitsimeeting');

            Route::get('/pendingstudents/{erId}', [EnrollmentController::class, 'pendingstudents'])->name('pendingstudents');
            
            Route::post('/approvestudents', [EnrollmentController::class, 'approvestudents'])->name('approvestudents');

            Route::get('/lectpendingopencourse', [LecturerCourseController::class, 'lectpendingopencourse'])->name('lectpendingopencourse');
            // Route::get('/lecturerapprovestudents', [EnrollmentController::class, 'lecturerapprovestudents'])->name('lecturerapprovestudents');


            Route::post('/lecturerpost/{lcId}', [ClassroomStreamPostController::class, 'lecturerpost'])->name('lecturerpost');
            
            Route::post('/lecturerpostedit/{pId}', [ClassroomStreamPostController::class, 'lecturerpostedit'])->name('lecturerpostedit');
            
            Route::delete('/lecturer/post/{id}', [ClassroomStreamPostController::class, 'lecturerpostdelete'])->name('lecturerpostdelete');
            



            
        });





    });
});

