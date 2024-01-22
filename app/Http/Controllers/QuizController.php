<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Question;
use App\Models\Quiz;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function lecturerquizdetail($qId){
        $quiz = Quiz::find($qId);

        return view('lecturer.setquiz', compact('quiz'));


    }


    public function lectureraddquizform($lcId, Request $request){

        $start_time = new DateTime($request->quizTime);

        

        $time_limit_minutes = (int) $request->quizTimeLimit; // Make sure this is an integer
        $interval = new DateInterval("PT{$time_limit_minutes}M");
        $deadline = $start_time->add($interval);

        $deadline_formatted = $deadline->format('Y-m-d H:i:s');
        
        

        //create a new quiz
        $saved = Quiz::create([
            'title' => $request->quizTitle,
            'description' => $request->quizDescription,
            'lecturer_course_id' => $lcId,
            'total_points' => $request->quizTotalPoints,
            'deadline' => $deadline_formatted,
            'time_limit' => $request->quizTimeLimit,

        ]);

        if($saved){

            return back()->with('success', 'Quiz created successfully.');
        }
        else{

            return back()->with('error', 'Something went wrong.');
        }

    }

    public function saveQuiz(Request $request) {
        // Decode the URL-encoded form data
        $formDataObject = $request->json()->all();
        

        return json_encode($formDataObject);


        // Validation rules
        $rules = [
            'quiz_id' => 'required|exists:quizzes,id',
            'questions' => 'required',
            'questions.*.title' => 'required|string',
            'questions.*.type' => 'required|in:mcq,truefalse',
            'questions.*.answer' => 'required',
            'questions.*.options' => 'required_if:questions.*.type,mcq|array',
            'questions.*.options.*' => 'sometimes|required|string',
        ];

        // Create a validator instance and validate the form data
        $validator = Validator::make($formDataObject, $rules);
        if ($validator->fails()) {
            return response()->json(['error' => true, 'message' => $validator->errors()->first()]);
        }

        // Start a transaction in case anything goes wrong
        DB::beginTransaction();
        try {
            $quizId = $formDataObject['quiz_id'];
            $quiz = Quiz::find($quizId);


                      
            foreach ($formDataObject['questions'] as $questionData) {
                // Update or create question
                $question = $quiz->questions()->create([
                    'title' => $questionData['title'],
                    'type' => $questionData['type'],
                ]);

                if ($questionData['type'] === 'mcq') {
                    // Handle MCQ options
                    foreach ($questionData['options'] as $optionKey => $optionValue) {
                        $isCorrect = ($optionKey === $questionData['answer']);
                        // Create or update the option
                        $question->choices()->create([
                            'option_mcq' => $optionKey,
                            'written_response' => $optionValue,
                            'is_correct' => $isCorrect,
                        ]);
                    }
                }

                else {
                    // Handle non-MCQ question types
                    // Assuming the answer should be stored in 'written_response' for non-MCQs
                    $question->update([
                        'written_response' => $questionData['answer'],
                    ]);
                }
            }

            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Quiz saved successfully.', 'data' => $quiz]);
                
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function savesQuiz(Request $request) {
        
        $formData = $request->all();

         // Validation (you should expand this with actual validation rules)
         $validatedData = $request->validate([
             'title' => 'required|string',
             'questions.*.title' => 'required|string',
             'questions.*.options.*' => 'required|string',
             'questions.*.answer' => 'required|string|size:1', // Ensure answer is a single character like 'A', 'B', etc.
         ]);
        
         // Begin a transaction
        DB::beginTransaction();

        try {
            // Check if it's an update or create operation
            $quizId = $request->input('quiz_id');
            if ($quizId) {
                // Update operation
                $quiz = Quiz::findOrFail($quizId);
                $quiz->update([
                    // ... (attributes for the quiz)
                ]);
            } else {
                // Create operation
                $quiz = Quiz::create([
                    // ... (attributes for the quiz)
                ]);
            }

            // Update or create questions and choices
            foreach ($formData['questions'] as $questionData) {
                // If question ID is provided, update, otherwise create a new question
                $question = Question::updateOrCreate(
                    ['id' => $questionData['id'] ?? null], // Pass null if 'id' is not set
                    [
                        'quiz_id' => $quiz->id,
                        'number' => $questionData['number'],
                        'text' => $questionData['text'],
                        'type' => $questionData['type'],
                        'points' => $questionData['points'],
                        // ... (any other question attributes)
                    ]
                );

                // Update or create choices for the question
                if (isset($questionData['choices'])) {
                    foreach ($questionData['choices'] as $choiceData) {
                        $choice = Choice::updateOrCreate(
                            ['id' => $choiceData['id'] ?? null], // Pass null if 'id' is not set
                            [
                                'question_id' => $question->id,
                                'option_mcq' => $choiceData['option_mcq'],
                                'written_response' => $choiceData['written_response'],
                                'is_correct' => $choiceData['is_correct'],
                                'time_limit' => $choiceData['time_limit'], // Handle this according to your input format
                                // ... (any other choice attributes)
                            ]
                        );
                    }
                }
            }

            // Step 1: Collect question and choice IDs from the request
            $questionIds = collect($request->questions)->pluck('id')->filter()->all(); // Filter to remove null values
            $choiceIds = collect($request->questions)->pluck('choices')->flatten(1)->pluck('id')->filter()->all();

            // Step 2: Fetch current question and choice IDs from the database
            $currentQuestionIds = $quiz->questions()->pluck('id')->all();
            $currentChoiceIds = Question::whereIn('id', $currentQuestionIds)->with('choices')->get()->pluck('choices')->flatten()->pluck('id')->all();

            // Step 3: Determine which questions and choices were removed
            $questionsToDelete = array_diff($currentQuestionIds, $questionIds);
            $choicesToDelete = array_diff($currentChoiceIds, $choiceIds);

            // Step 4: Delete removed questions and choices
            Question::destroy($questionsToDelete); // This will also cascade delete related choices
            Choice::destroy($choicesToDelete);

            // Commit the transaction
            DB::commit();

            // Return success response
            return response()->json(['success' => true, 'message' => 'Quiz saved successfully']);

        } catch (\Exception $e) {
            // An error occurred; rollback the transaction
            DB::rollback();

            // Return error response
            return response()->json(['success' => false, 'message' => 'Failed to save the quiz', 'error' => $e->getMessage()]);
        }
    }


    public function index()
    {
        //
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
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
