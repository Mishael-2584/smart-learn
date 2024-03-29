<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    // public function generateToken()
    // {
    //     dd('hello');
    //     return response()->json(['csrfToken' => csrf_token()]);
    // }

    public function studentquizdetail($subId){

        $submission = Submission::find($subId);
        $quiz = Quiz::find($submission->quiz_id);
        $questions = Question::with('choices')->where('quiz_id', $submission->quiz->id)->get();

        // Prepare data for each question type
        $data = [
            'mcq' => [],
            'short' => [],
            'truefalse' => [],
        ];

        foreach ($questions as $question) {
            switch ($question->type) {
                case 'mcq':
                    $correctChoice = $question->choices->filter(function ($choice) {
                        return $choice->is_correct;
                    })->first();
                    $studentResponse = isset($submission->answer[$question->id]) ? $submission->answer[$question->id] : null;
                    $data['mcq'][] = [
                        'id' => $question->id,
                        'text' => $question->text,
                        'choices' => $question->choices->map(function ($choice) {
                            return [
                                'option' => $choice->option_mcq,
                                'written_response' => $choice->written_response,
                            ];
                        }),
                        'answer' => $correctChoice->written_response,
                        'points' => $question->points,
                        'student_response' => $studentResponse,
                    ];
                    break;
                case 'short':
                    $studentResponse = isset($submission->answer[$question->id]) ? $submission->answer[$question->id] : null;
                    $data['short'][] = [
                        'id' => $question->id,
                        'text' => $question->text,
                        'answer' => $question->choices->first()->written_response,
                        'points' => $question->points,
                        'student_response' => $studentResponse,
                    ];
                    break;
                case 'truefalse':
                    $studentResponse = isset($submission->answer[$question->id]) ? $submission->answer[$question->id] : null;
                    $data['truefalse'][] = [
                        'id' => $question->id,
                        'text' => $question->text,
                        'answer' => $question->choices->first()->written_response,
                        'points' => $question->points,
                        'student_response' => $studentResponse,
                    ];
                    break;
            }
        }

        // dd($data);

        return view('student.quizdetail', compact('quiz', 'questions', 'data', 'submission'));

    }

    public function lecturerquizviewgrade($qId){

        $submissions = Submission::where('quiz_id', $qId)->get();
        $quiz = Quiz::find($qId);


        return view('lecturer.viewgrades', compact('submissions', 'quiz'));


    }


    public function storeanswers(Request $request, $quizId)
    {
        // dd($request->all());

        $submissionTime = now(); // Get the current time
        $quiz = Quiz::find($quizId);
        
        $answers = []; // Initialize an empty array to store answers

        foreach ($request->questions as $questionData) {
            $answers[$questionData['id']] = $questionData['answer'];
        } // Initialize an empty array to store answers

        // Check if the submission time is after the quiz deadline
        $status = $submissionTime->subMinute(1) > $quiz->deadline ? 'late' : 'on time';

        $submission = Submission::create([
            'student_id' => session('id'),
            'answer' => $answers, // Convert answers to JSON
            'quiz_id' => $quizId,
            'score' => null, // Initially null, calculate later
            'status' => $status, // Set the status based on submission time
            'submittion_time' => $submissionTime->format('Y-m-d H:i:s'),
        ]);

        if($submission){
            return response()->json([
                'success' => true,
                'submissionId' => $submission->id
            ]);

        }
        else{
            return response()->json([
                'success' => false
            ]);
        }

        
    }

    public function calculateScore($submissionId)
    {
        $submission = Submission::findOrFail($submissionId);

        
        $score = $submission->calculateScore();
        $total = intval($submission->quiz->total_points);

        if ($score){
            return response()->json([
                'success' => true,
                'score' => $score,
                'total' => $total,
            ]);
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
    public function show(Submission $submission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Submission $submission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        //
    }
}
