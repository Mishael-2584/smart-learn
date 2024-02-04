<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class CheckSubmissionController extends Controller
{
    //
    public function checkSubmission(Request $request)
    {
        $alreadySubmitted = Submission::where('student_id', $request->student_id)
                                       ->where('quiz_id', $request->quiz_id)
                                       ->exists();

        return response()->json([
            'alreadySubmitted' => $alreadySubmitted
        ]);
    }
}
