<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\DepartmentCourse;
use App\Models\Enrollment;
use App\Models\LecturerCourse;
use App\Models\Student;
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
        // if exists redirect back with error you have already enrolled for this lecturer course
        $exist = LecturerCourse::where('lecturer_id', session()->get('id'))->where('department_courses_id', $courseId)->first();
        if($exist){
            return back()->with('error', 'You have already enrolled for this lecturer course');
        }

    
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

            // $ct = LecturerCourse::where('department_courses_id', $courseId)->first();
        


                    if ($request->input('link-type') == 'generate') {
                        $base_url = "https://meet.jit.si/"; // Replace with your Jitsi instance URL
                        $room_name = uniqid(); // Generate a unique room name using PHP uniqid() function
                    
                        $meet_link = $base_url . $room_name;
                        $lc->meet_url = $meet_link;
                    
                    }
                    else{
                     $lc->meet_url = $request->input('meet-link');
                    }


               $saved = $lc->save();

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


    public function pendingstudents($lcId){

        $er = Enrollment::where('lecturer_course_id', $lcId)->where('status', 1)->get();
        if ($er){
            $lc = LecturerCourse::where('id', $lcId)->first();
            return view('lecturer.pendingstudents', compact('er', 'lc'));
        }
        else{
            return view('lecturer.pendingstudents');
        }


    }


    public function approvestudents(Request $request){
        

        
        $selectedStudentsArray = explode(',', $request->input('selectedStudents', []));
        
        foreach ($selectedStudentsArray as $studentId) {
            $student = Student::find($studentId);
            
            if ($student) {
                // Update the lecturer's status to approved
                $er = Enrollment::where('student_id', $student->id)->first();

                $er->status = 2;
                $saved = $er->save();

                
                
                
                
            }
        }
        if (!$saved) {
            return back()->with('error', 'Failed to approve students.');
        }
        else{
            return back()->with('success', '.'.count($selectedStudentsArray).' students approved successfully.');
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
