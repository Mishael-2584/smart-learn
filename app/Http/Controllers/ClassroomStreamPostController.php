<?php

namespace App\Http\Controllers;

use App\Models\ClassroomStreamPost;
use Illuminate\Http\Request;

class ClassroomStreamPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function lecturerpost(Request $request, $lcId)
    {

        $post = ClassroomStreamPost::create([
            'lecturer_course_id' => $lcId,
            'lecturer_id' => session('id'),
            'content' => $request->input('content'),
        ]);

        if ($post) {

            
            return back()->with('success', 'Post created successfully!', ['post' => $post]);
        }
        else{

            return back()->with('error', 'Something went wrong!');
        }

    }

    public function lecturerpostedit(Request $request, $pId){
    
        $post = ClassroomStreamPost::find($pId);
        $post->content = $request->input('editcontent');
        $saved = $post->save(); 
    
        if($saved){
            return back()->with('success', 'Post updated successfully!');
        }
        else{
            return back()->with('error', 'Something went wrong!');
        }
    }


    public function lecturerpostdelete($id)
    {
        $post = ClassroomStreamPost::findOrFail($id);
        if ($post->delete()) {
            return response()->json(['message' => 'Post deleted successfully']);
        } else {
            return response()->json(['message' => 'Something went wrong!'], 500);
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
    public function show(ClassroomStreamPost $classroomStreamPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassroomStreamPost $classroomStreamPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassroomStreamPost $classroomStreamPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassroomStreamPost $classroomStreamPost)
    {
        //
    }
}
