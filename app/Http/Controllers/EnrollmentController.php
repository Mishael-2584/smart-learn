<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\DepartmentCourse;
use App\Models\Enrollment;
use App\Models\LecturerCourse;
use Carbon\Carbon;
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

    public function lecturerenrollgedscourse($courseId)
    {
        $course = Course::where('id', $courseId)->first();
        return view('lecturer.enrollgedscourse', compact('course'));
    }

    public function lecturerenrolluniquecourse($courseId){

        $course = Course::where('id', $courseId)->first();
        if($course){
            return view('lecturer.enrolluniquecourse', compact('course'));
        }

        return view('lecturer.enrolluniquecourse');
        
    }

    public function enrollunique(Request $request, $courseId)
    {
        $carbonSTime = Carbon::parse($request->input('start-time'));
        $start_time = $carbonSTime->format('H:i:s');
        $carbonETime = Carbon::parse($request->input('end-time'));
        $end_time = $carbonETime->format('H:i:s');

        $uc = LecturerCourse::create([
            'lecturer_id' => session()->get('id'),
            'course_id' => $courseId,
            'department_courses_id' => null,
            'day' => $request->input('day'),
            'start_time' => $start_time,
            'end_time' => $end_time,
            'meet_url' => null,
        ]);

        if($uc){

            if($request->input('link-type') == 'generate'){
                $base_url = "https://meet.jit.si/"; // Replace with your Jitsi instance URL
                $room_name = uniqid(); // Generate a unique room name using PHP uniqid() function
                $url = $base_url . $room_name;
                $uc->meet_url = $url;
                
            }
            else{
                $uc->meet_url = $request->input('meet-url');
            }

            $saved = $uc->save();
            if($saved){
                return redirect()->route('myclasses')->with('success', 'Successfully Applied, Pending Admin Approval');
            }
            

        }
        else{

            return back()->with('error', 'Course not enrolled');
        }

    }

    public function enrollgeds(Request $request, $courseId)
    {
        $carbonSTime = Carbon::parse($request->input('start-time'));
        $start_time = $carbonSTime->format('H:i:s');
        $carbonETime = Carbon::parse($request->input('end-time'));
        $end_time = $carbonETime->format('H:i:s');

        $gc = LecturerCourse::create([
            'lecturer_id' => session()->get('id'),
            'course_id' => $courseId,
            'department_courses_id' => null,
            'day' => $request->input('day'),
            'start_time' => $start_time,
            'end_time' => $end_time,
            'meet_url' => null,
        ]);

        if($gc){

            if($request->input('link-type') == 'generate'){
                $base_url = "https://meet.jit.si/"; // Replace with your Jitsi instance URL
                $room_name = uniqid(); // Generate a unique room name using PHP uniqid() function
                $url = $base_url . $room_name;
                $gc->meet_url = $url;
                
            }
            else{
                $gc->meet_url = $request->input('meet-url');
            }

            $saved = $gc->save();
            if($saved){
                return redirect()->route('myclasses')->with('success', 'Successfully Applied, Pending Admin Approval');
            
            }
            

        }
        else{

            return back()->with('error', 'Course not enrolled');
        }

    }

    public function enrolldepartmental(Request $request, $courseId)
    {
    
        $carbonSTime = Carbon::parse($request->input('start-time'));
        $start_time = $carbonSTime->format('H:i:s');
        $carbonETime = Carbon::parse($request->input('end-time'));
        $end_time = $carbonETime->format('H:i:s');


        $lc = LecturerCourse::create([
            'lecturer_id' => session()->get('id'),
            'course_id' => null,
            'department_courses_id' => $courseId,
            'day' => $request->input('day'),
            'start_time' => $start_time,
            'end_time' => $end_time,
            'meet_url' => null,
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

               if($saved){
                return redirect()->route('myclasses')->with('success', 'Successfully Applied, Pending Admin Approval');
               }
               else{
                return back()->with('error', 'Failed to generate link!');
               }
            
        }
        else{
            return back()->with('error', 'Failed to enroll for course!');
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
