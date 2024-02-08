<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\DepartmentCourse;
use App\Models\Lecturer;
use App\Models\LecturerCourse;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\error;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function enrollcourse(){

        $lecturer = Lecturer::where('id', session('id'))->first();
        $schools = School::all();


        $schoolIds = $lecturer->school_ids;
        $departmentIds = Department::whereIn('school_id', $schoolIds)->get('id');

        //get schools where id is with schoolIds
        $gedscourses = Course::where('isGEDS', 1)->get();
        $uniquecourses = Course::where('isGEDS', 0)->where('course_code', null)->get();
        // $myschools = School::whereIn('id', $schoolIds)->get();
        $coursedeps = DepartmentCourse::whereIn('department_id', $departmentIds)->get();
        

        return view('lecturer.enrollcourse', ['schools' => $schools, 'coursedeps' => $coursedeps, 'gedscourses' => $gedscourses, 'uniquecourses' => $uniquecourses]);
    }

    public function status(){

        return view('lecturer.status');
    }

    public function dashboard()
    {
        // count number of lecturer_courses with lecturer_id from session('id')
        $numberOfCourses = LecturerCourse::where('lecturer_id', session('id'))->where('status', 1)->count();
        $studentCount = DB::table('enrollments')
            ->join('lecturer_courses', 'enrollments.lecturer_course_id', '=', 'lecturer_courses.id')
            ->where('lecturer_courses.lecturer_id', session('id'))
            ->distinct('enrollments.student_id')
            ->count('enrollments.student_id');

        //find lecturer by session id fron lecturer table
        $lecturer = Lecturer::where('id', session('id'))->first();
        if ($lecturer->verified == 2) {
            return view('lecturer.dashboard', ['lecturer' => $lecturer, 'numberOfCourses' => $numberOfCourses, 'studentCount' => $studentCount]);
        } else {
            return view('lecturer.status', ['lecturer' => $lecturer]);
        }
        
        return back()->with('error', 'Lecturer not found');
    
    }

    public function pendinglecturers()
    {

        //find lecturers where lecturer->verified = 1
        $lecturers = Lecturer::where('verified', 1)->get();

        if ($lecturers) {
            return view('admin.pendinglecturers', ['lecturers' => $lecturers]);
        }

        return view('admin.pendinglecturers')->with('warning', 'No lecturers found');
    }
    
    public function approvelecturers(Request $request)
    {

        $selectedLecturersArray = explode(',', $request->input('selectedLecturers', []));
        
        foreach ($selectedLecturersArray as $lecturerId) {
            $lecturer = Lecturer::find($lecturerId);
            
            if ($lecturer) {
                // Update the lecturer's status to approved
                $lecturer->verified = 2;
                $saved = $lecturer->save();
                
                
                
            }
        }
        if (!$saved) {
            return back()->with('error', 'Failed to approve lecturers.');
        }
        else{
            return back()->with('success', '.'.count($selectedLecturersArray).' $Lecturers approved successfully.');
        }
        
        
    }

    public function confirmpassword(Request $request)
    {
        dd($request->all());
        // Validate the form data
        $request->validate([
            'password' => 'required',
        ]);
        
        dd($request->all());
        $lecturer = Lecturer::where('id', session('id'))->first();

        // Check if the password is correct
        if (Hash::check($request->password, $lecturer->password)) {
           // Password is correct, redirect to the user details update form
            return redirect()->route('updatelecturerprofileinfo');
        
        } else {

        // Password is incorrect, show an error message
            return redirect()->back()->with('error', 'Incorrect password.');
        }

            

    }

    public function updatelecturerprofileinfo(Request $request)
    {
        // Check if the password is correct
        $lecturer = Lecturer::where('id', session('id'))->first();
        if (!Hash::check($request->password, $lecturer->password)) {
            // Password is incorrect, show an error message
            return redirect()->back()->with('error', 'Incorrect password.');
        }
    
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'bio' => 'required',
            'phone' => 'required',
            'password' => 'required',
            // Add validation rules for other fields
        ]);
    
        // Update the lecturer's profile information
        $lecturer->name = $request->name;
        $lecturer->email = $request->email;
        $lecturer->bio = $request->bio;
        $lecturer->phone = $request->phone;
        $lecturer->school_ids = $request->school;
        $lecturer->verified = 1;
        $lecturer->twitter = $request->twitter;
        $lecturer->facebook = $request->facebook;
        $lecturer->instagram = $request->instagram;
        $lecturer->youtube = $request->youtube;
        $lecturer->linkedin = $request->linkedin;
        
        // Update other fields as needed
        $lecturer->save();
    
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function lecturerprofileinfo(){
        $lecturer = Lecturer::where('id', session('id'))->first();
        $schools = School::all();

        if($schools){
            $schoolIds = $lecturer->school_ids;
            //get schools where id is with schoolIds

            if (isset($schoolIds)){
                $myschools = School::whereIn('id', $schoolIds)->get();

                if(isset($myschools)){
                    return view('lecturer.lecturerprofileinfo', ['lecturer' => $lecturer, 'schools' => $schools, 'schoolIds' => $schoolIds, 'myschools' => $myschools]);
                }
                
            }
            


            return view('lecturer.lecturerprofileinfo', ['lecturer' => $lecturer, 'schools' => $schools, 'schoolIds' => $schoolIds]);
        }

        return view('lecturer.lecturerprofileinfo', ['lecturer' => $lecturer]);
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
    public function show(Lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecturer $lecturer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturer $lecturer)
    {
        //
    }
}
