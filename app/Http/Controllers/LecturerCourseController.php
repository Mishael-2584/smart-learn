<?php

namespace App\Http\Controllers;

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
        if ($lc){
            return view('lecturer.courseroom', compact('lc'));
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
