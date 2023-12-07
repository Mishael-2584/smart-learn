<?php

namespace App\Http\Controllers;

use App\Models\DepartmentCourse;
use App\Models\Enrollment;
use App\Models\LecturerCourse;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function lecturerenrollcourse($courseId)
    {   

        // $lect_enrollment = LecturerCourse::where('course_id', $courseId)->first();
        $coursedept = DepartmentCourse::where('course_id', $courseId)->first();
        // $lect_enrollment = LecturerCourse::where('department_course_id', $coursedept->id)->get();

        $coursedept = DepartmentCourse::where('course_id', $courseId)->first();

        return view('lecturer.enrolldepartmental', compact('coursedept'));

    } 

    public function enrolldepartmental(Request $request, $courseId)
    {
    

        dd($courseId);

        $lc = LecturerCourse::create([
            'department_courses_id' => $courseId,
            'lecturer_id' => session()->get('id'),
            'course_id' => null,
            'day' => $request->input('day'),
            'start_time' => $request->input('start-time'),
            'end_time' => $request->input('end-time'),
            'meet_url' => $request->input('meet-link'),
            'status' => 0,
        ]);

        if($lc){

            $ct = LecturerCourse::where('department_courses_id', $courseId)->first();
        


                    if ($request->input('link-type') == 'generate') {
                        $base_url = "https://meet.jit.si/"; // Replace with your Jitsi instance URL
                        $room_name = uniqid(); // Generate a unique room name using PHP uniqid() function
                    
                        $meet_link = $base_url . $room_name;
                        $ct->meet_url = $meet_link;
                    
                    }
                    else{
                     $ct->meet_url = $request->input('meet-link');
                    }


               $saved = $ct->save();
            
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }
}
