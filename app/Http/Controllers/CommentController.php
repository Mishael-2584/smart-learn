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
        if (session('role') == 4) {

            $comment = $post->comments()->create([
                'content' => $request->input('comment'),
                'student_id' => session('id'),
            ]);

            if ($comment) {

                // Load the student relationship if it's not already loaded
                $comment->load('student');

                return response()->json([
                    'comment' => $comment,
                    'initials' => $comment->student->getInitialsAttribute(),
                    'name' => $comment->student->name,
                    'created_at' => $comment->created_at->toDateTimeString(), // Format the date as string
                ]);
            } else {
                return response()->json(['error' => 'Something went wrong'], 500);
            }
        } 
        
        else {
                $comment = $post->comments()->create([
                    'content' => $request->input('comment'),
                    'lecturer_id' => session('id'),
                ]);
            

            
                if ($comment) {
                
                        // Load the lecturer relationship if it's not already loaded
                    $comment->load('lecturer');
                
                    // Return the comment as a JSON response
                    return response()->json([
                        'comment' => $comment,
                        'initials' => $comment->lecturer->getInitialsAttribute(),
                        'name' => $comment->lecturer->name,
                        'created_at' => $comment->created_at->toDateTimeString(), // Format the date as string
                    ]);

                }
                else{
                    return response()->json(['error' => 'Something went wrong'], 500);
                
                }

            }
    }

    public function getcomment($postId)
    {
        $post = ClassroomStreamPost::with('comments')->findOrFail($postId);
        $comments = $post->comments; // Access comments through the relationship

        return view('lecturer.commentsmodal', compact('comments'));
    }

    public function commentdelete($cId){


        
        
            $comment = Comment::find($cId);
            if ($comment->delete()) {
                return response()->json([
                    'message' => 'Comment deleted successfully',
                    'deletedCommentId' => $comment->id
                ]);
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
