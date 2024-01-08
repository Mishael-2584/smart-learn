<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function newdepartment()
    {
        //
        $schools = School::all();

        if($schools){
            return view('admin.newdepartment', compact('schools')) ;
        }
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function postschool(Request $request)
    {
        //

        $rules = [
            'name' => 'required|string',
            
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->response()->json($validator->errors(), 400);
        }
        
        else{
        //new user
        // dd($request->input('school')->id());
        $dep = Department::create([
            'school_id' => $request->input('school'),
            'name' => $request->input('name'),
        ]);
        
        if($dep){
            return back()->with('success', 'Department added successfully!');
        }

        else{
            return back()->with('error', 'Failed to add Department!');
        }
       
        
        }
    }

    /**
     * Display the specified resource.
     */
    public function departmentlist(Department $department)
    {
        //

        $departments = Department::all();
        if ($departments) {
            # code...
            return view('admin.departmentlist', compact('departments'));
        
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
    }
}
