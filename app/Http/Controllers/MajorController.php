<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Major;
use App\Models\School;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $schoolId)
    {
        $departments = Department::where('school_id', $schoolId)->get();
        return response()->json($departments);
    }

    public function newmajor()
    {
        $schools = School::all();
        return view('admin.newmajor', compact('schools'));
    }

    public function postmajor(Request $request)
    {

        $request->validate([
            'major' => 'required',
        ]);

        $major = Major::create([
            'title' => $request->major,
            'department_id' => $request->department,
        ]);

        if ($major) {
            return back()->with('success', 'Major added successfully!');
        } else {
            return back()->with('error', 'Failed to add Major!');
        }


    }
    
    public function majorlist()
    {
        $majors = Major::with('department.school')->get();
        return view('admin.majorlist', compact('majors'));
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
    public function show(Major $major)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Major $major)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        //
    }
}
