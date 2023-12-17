<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Lecturer;
use App\Models\LecturerCourse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function enrollmentapprovals(){

        $enrollments = LecturerCourse::all();


        return view('admin.enrollmentapprovals', compact('enrollments'));
    }

    public function approvecourses(Request $request){

        $selectedEnrollmentArray = explode(',', $request->input('selectedLecturers', []));
        
        foreach ($selectedEnrollmentArray as $lecturer_course_id) {
            $lc = LecturerCourse::find($lecturer_course_id);
            
            if ($lc) {
                // Update the lecturer's status to approved
                $lc->status = 1;
                $saved = $lc->save();
                
                
                
            }
        }
        if (!$saved) {
            return back()->with('error', 'Failed to approve lecturers.');
        }
        else{
            return back()->with('success', '.'.count($selectedEnrollmentArray).' Lecturers approved successfully.');
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
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
