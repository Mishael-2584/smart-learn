<?php

namespace App\Http\Controllers;

use App\Models\ClassroomStreamPost;
use App\Models\Enrollment;
use App\Models\LecturerCourse;
use Illuminate\Http\Request;

class LecturerCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function lectureropencourse($lcId){

        $lc = LecturerCourse::find($lcId);
        $po = ClassroomStreamPost::where('lecturer_course_id', $lcId)
                            ->orderBy('created_at', 'desc') // Order by creation time, newest first
                            ->get();
        $er = Enrollment::where('lecturer_course_id', $lcId)->where('status', 2)->get();
        if ($lc || $er){
            return view('lecturer.courseroom', compact('lc', 'er', 'po'));
        }
    }

    

    public function lectpendingopencourse()
    {
        // Get all the courses for the current logged-in lecturer
        $lecturerCourses = LecturerCourse::where('lecturer_id', session('id'))->get();
    
        // Create an array with the IDs of the lecturer's courses
        $lecturerCourseIds = $lecturerCourses->pluck('id')->toArray();
    
        // Get enrollments for the lecturer's courses where status is pending (1)
        $pendingEnrollments = Enrollment::whereIn('lecturer_course_id', $lecturerCourseIds)
                                        ->where('status', 1)
                                        ->with('lecturercourse') // Eager load the related LecturerCourse
                                        ->get();
    
        // Count the number of pending students for each course
        $pendingStudentsCounts = $pendingEnrollments->groupBy('lecturer_course_id')
                                                     ->mapWithKeys(function ($group, $key) {
                                                         return [$key => $group->count()];
                                                     });
    
        // Pass the enrollments and pending students count to the view
        return view('lecturer.pendingstudentscourses', [
            'er' => $pendingEnrollments,
            'pendingStudentsCounts' => $pendingStudentsCounts,
            'lecturerCourses' => $lecturerCourses
        ]);
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
    public function show(LecturerCourse $lecturerCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LecturerCourse $lecturerCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LecturerCourse $lecturerCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LecturerCourse $lecturerCourse)
    {
        //
    }
}
