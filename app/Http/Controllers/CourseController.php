<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\DepartmentCourse;
use App\Models\LecturerCourse;
use App\Models\School;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function myclasses(){

        $lecturerId = session()->get('id');
        $lcs = LecturerCourse::where('lecturer_id', $lecturerId)->where('course_id', null)->get();
        $gcs = LecturerCourse::where('lecturer_id', $lecturerId)->where('course_id', '!=', null)->get();
        if(isset($lcs) || isset($gcs)){
            // dd($lcs);
            return view('lecturer.mycourses', compact('lcs', 'gcs'));
        }
        else{
            return view('lecturer.mycourses');
        }

    }

    public function courselist(){

        $courses = Course::all();
        $coursedeps = DepartmentCourse::all();

        if($courses){
            return view('admin.courselist', compact('courses', 'coursedeps'));
        }

    }

    public function newcourse()
    {
        $schools = School::all();
        if($schools){
        return view('admin.newcourse', compact('schools'));    
        }
        
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */        
    public function postcourse(Request $request)
    {

        
        try {
            DB::beginTransaction();
            // dd($request->all());
            // Create a new course
            $course = Course::create([
                'imgpath' => $request->imgpath,
                'course_code' => $request->code,
                'title' => $request->title,
                'description' => $request->description,
                'isGEDS' => 0,
            ]);

            
    
            // Check if course creation is successful
            if ($course) {
                $departmentCourse = DepartmentCourse::create([
                    'course_id' => $course->id,
                    'department_id' => $request->department,
                ]);
    
                // Check if department course creation is successful
                if ($departmentCourse) {
                    DB::commit();
                    return back()->with('success', 'Course created successfully');
                } else {
                    DB::rollBack();
                    return back()->with('error', 'Department course not created');
                }
            } else {
                DB::rollBack();
                return back()->with('error', 'Course not created!');
            }
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Course not created');
        }
    }

    public function postcoursegeds(Request $request)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();
            // Create a new course
            $course = Course::create([
                'imgpath' => $request->imgpath,
                'course_code' => $request->code,
                'title' => $request->title,
                'description' => $request->description,
                'isGEDS' => 1,
            ]);
    
            // Check if course creation is successful
            if ($course) {
                DB::commit();
                return back()->with('success', 'Course created successfully');
            } else {
                DB::rollBack();
                return back()->with('error', 'Course not created');
            }
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Course not created');
        }
    }

    public function postcourseunique(Request $request){
        try{
            DB::beginTransaction();
        
            $course = Course::create([
                'imgpath' => $request->imgpath,
                'title' => $request->title,
                'description' => $request->description,
                'isGEDS' => 0,
            ]);

            if($course){
                DB::commit();
                return back()->with('success', 'Course created successfully');
            }

        } catch(Exception $e){
            DB::rollBack();
            return back()->with('error', 'Course not created');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
