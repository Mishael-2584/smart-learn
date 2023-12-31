<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\LecturerCourse;
use App\Models\Major;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        //
        //find lecturer by session id fron lecturer table
        $student = Student::where('id', session('id'))->first();
        if ($student->status == 2) {
            return view('student.dashboard', ['student' => $student]);
        } else {
            return view('student.status', ['student' => $student]);
        }
        
        return back()->with('error', 'Student not found');
    }

    public function studentprofileinfo(){
        $student = Student::where('id', session('id'))->first();
        $majors = Major::all();

        if($student){
            return view('student.studentprofileinfo', ['student' => $student, 'majors' => $majors]);
        }

        return view('student.studentprofileinfo');       
        
    }

    public function updatestudentprofileinfo(Request $request)
    {
        // Check if the password is correct
        $student = Student::where('id', session('id'))->first();
        if (!Hash::check($request->password, $student->password)) {
            // Password is incorrect, show an error message
            return redirect()->back()->with('error', 'Incorrect password.');
        }
    
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'level' => 'required',
            'matric' => 'required',
            'group' => 'required',
            'major' => 'required',
            // Add validation rules for other fields
        ]);
    
        // Update the student's profile information
        $student->name = $request->name;
        $student->email = $request->email;
        $student->matric_no = $request->matric;
        $student->major_id = $request->major;
        $student->level = $request->level;
        $student->group = $request->group;
        $student->status = 1;
        // Update other fields as needed
        $student->save();
    
        return redirect()->back()->with('warning', 'Profile updated successfully! Pending approval.');
    }

    

    public function status(){

        return view('student.status');
    }

    public function studentenrollcourse(){


        $student = Student::where('id', session('id'))->first();
        //lecturer course where department_course_id is not null
        $lcs = LecturerCourse::whereNotNull('department_courses_id')->get();
        $gds = LecturerCourse::whereNull('department_courses_id')->get();

        

        if($lcs){
            
            return view('student.studentenrollcourse', ['lc' => $lcs, 'student' => $student, 'gds' => $gds]);
        }

        return view('student.studentenrollcourse');

    }

    public function studentenrolldept($lcid){

        $lc = LecturerCourse::where('id', $lcid)->whereNotNull('department_courses_id')->first();

        ;

        if ($lc){

            
            return view('student.studentenrolldept', ['lc' => $lc]);
        }

        return view('student.studentenrolldept');

    }

    public function studentenrollgeds($lcid){


        $lc = LecturerCourse::where('id', $lcid)->first();

        if ($lc){
            return view('student.studentenrollgeds', ['lc' => $lc]);
        }

        
        return view('student.studentenrollgeds');
    }

    public function studentenrollunique($lcid){

        $lc = LecturerCourse::where('id', $lcid)->first();

        if ($lc){
            return view('student.studentenrollunique', ['lc' => $lc]);
        }

        return view('student.studentenrollunique');
    }

    public function submitstudentenrolldept($lcid){

        //a student can only enroll for a course once
        $existingEnrollment = Enrollment::where('student_id', session('id'))
                                ->where('lecturer_course_id', $lcid)
                                ->first();

        if ($existingEnrollment) {
            // Enrollment already exists, handle this case accordingly

            return back()->with('error', 'You have already enrolled for this course.');
        } 
        else {


        $er = Enrollment::create([
            'student_id' => session('id'),
            'lecturer_course_id' => $lcid,
            'status' => 1,
        ]);

        if ($er){

            


            //redirect to route myclasses with success message
            return redirect()->route('mystudentclasses')->with('success', 'Enrolled successfully.');

        }

        return redirect()->back()->with('error', 'Failed to enroll student.');

    }

    }

    
    public function submitstudentenrollgeds($lcId){


    }

    public function submitstudentenrollunique($lcId){


    }

    public function mystudentclasses(){


        $er = Enrollment::where('student_id', session('id'))->get();
        if ($er){

            return view('student.myclasses', ['er' => $er]);
        }


    }

    public function studentopencourse($eId){

        // $lc = LecturerCourse::find($eId->lecturercourse->id);
        $en = Enrollment::where('id', $eId)->first();
        $lc = LecturerCourse::where('id', $en->lecturercourse->id)->first();
        $er = Enrollment::where('lecturer_course_id', $en->lecturercourse->id)->where('status', 2)->get();

        
        if ($lc || $er){
            return view('student.courseroom', compact('lc', 'er', 'en'));
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
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
