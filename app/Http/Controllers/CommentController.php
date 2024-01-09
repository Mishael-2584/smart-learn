<?php

namespace App\Http\Controllers;

use App\Models\ClassroomStreamPost;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function postcomment(Request $request, $pId)
    {
        //
        $post = ClassroomStreamPost::find($pId);
        
        $comment = $post->comments()->create([
            'content' => $request->input('content'),
        ]);


        if ($comment) {
            return response()->json($comment);
        }
        else{
            return response()->json(['error' => 'Something went wrong'], 500);

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
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
