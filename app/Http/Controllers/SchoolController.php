<?php

namespace App\Http\Controllers;

use App\Models\School;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SchoolController extends Controller
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
    public function schoollist()
    {
        //
        $schools = School::all();
        if ($schools) {
            # code...
            return view('admin.schoollist', compact('schools'));
        
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
        $school = School::create([
            'school_code' => $request->input('code'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        
        if($school){
            return back()->with('success', 'School added successfully!');
        }

        else{
            return back()->with('error', 'Failed to add school!a');
        }
       
        
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        //
    }
}
