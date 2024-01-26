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
        $questions = Question::with('choices')->where('quiz_id', $qId)->get();

        if($questions){
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
                            ];
                            
                            break;
                        case 'short':
                            $data['short'][] = [
                                'id' => $question->id,
                                'text' => $question->text,
                                'answer' => $question->choices->first()->written_response,
                            ];
                            break;
                        case 'truefalse':
                            $data['truefalse'][] = [
                                'id' => $question->id,
                                'text' => $question->text,
                                'answer' => $question->choices->first()->written_response,
                            ];
                            break;
                    }
                }
            
                // return response()->json($data);
                return view('lecturer.setquiz', compact('quiz', 'questions', 'data'));

        }

        


    }

    public function fetchQuizQuestions(Request $request)
    {
        $quizId = $request->input('quiz_id'); // Get quiz ID from request
    
        // Fetch questions with related choices
        $questions = Question::with('choices')
            ->where('quiz_id', $quizId)
            ->get();
    
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
                    
                    $data['mcq'][] = [
                        'id' => $question->id,
                        'text' => $question->text,
                        'choices' => $question->choices->map(function ($choice) {
                            return [
                                'option' => $choice->option_mcq,
                                'written_response' => $choice->written_response,
                            ];
                        }),
                        'answer' => $correctChoice->id,
                    ];
                    break;
                case 'short':
                    $data['short'][] = [
                        'id' => $question->id,
                        'text' => $question->text,
                        'answer' => $question->answer,
                    ];
                    break;
                case 'truefalse':
                    $data['truefalse'][] = [
                        'id' => $question->id,
                        'text' => $question->text,
                        'answer' => $question->answer,
                    ];
                    break;
            }
        }
    
        return response()->json($data);
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
            $redirectUrl = route('lectureropencourse', ['lcId' => $lcId]) . '#submissions';

            return redirect($redirectUrl)->with('success', 'Quiz created successfully.');
        }
        else{

            return back()->with('error', 'Something went wrong.');
        }

    }

    public function saveQuiz(Request $request) {
        // Decode the URL-encoded form data
        $formDataObject = $request->json()->all();
        // $quizId = $formDataObject['quiz_id'];
        // $quiz = Quiz::find($quizId);

        // Validation rules
        $rules = [
            'quiz_id' => 'required|exists:quizzes,id',
            'questions' => 'sometimes',
            'questions.*.title' => 'required|string',
            'questions.*.type' => 'required|in:mcq,truefalse,short',
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

                if(count($formDataObject['questions']) == 0){
                    $quiz->questions()->delete();
                }
       
                foreach ($formDataObject['questions'] as $questionData) {
                    $questionId = $questionData['id'] ?? null; // Check for existing question ID
                    if (isset($questionId)) {

                        $existingQuestionIds = $quiz->questions()->pluck('id')->toArray();
                        $submittedQuestionIds = collect($formDataObject['questions'])
                            ->filter(function ($question) {
                                return isset($question['id']); // Only consider questions with IDs
                            })
                            ->map(function ($question) {
                                return $question['id']; // Keep IDs of existing questions
                            })
                            ->all();
                        
                        // Identify questions to delete (existing but not submitted)
                        $questionsToDelete = array_diff($existingQuestionIds, $submittedQuestionIds);
                        
                        // Delete identified questions using whereIn
                        Question::whereIn('id', $questionsToDelete)->delete();

                        // Update existing question
                        $question = Question::find($questionId);     
                        $question->update([
                            'text' => $questionData['title'],
                            'type' => $questionData['type'],
                            'quiz_id' => $quizId // Assign quiz ID explicitly
                        ]);

                        if ($questionData['type'] === 'mcq') {
                            // Fetch existing choices, keyed by option_mcq for efficient comparison
                            $existingChoices = $question->choices()->get()->keyBy('option_mcq');
                        
                            foreach ($questionData['options'] as $optionKey => $optionValue) {
                                $isCorrect = ($optionKey === $questionData['answer']);
                            
                                // Check for existing choice with same option_mcq
                                if (isset($existingChoices[$optionKey])) {
                                    $existingChoice = $existingChoices[$optionKey];
                                
                                    // // Update only if content or correctness has changed
                                    if ($existingChoice->written_response !== $optionValue || $existingChoice->is_correct !== (int)$isCorrect) {
                                        $existingChoice->update([
                                            'option_mcq' => $optionKey,
                                            'written_response' => $optionValue,
                                            'is_correct' => (int)$isCorrect,
                                        ]); 
                                    }
                                    else{

                                    }
                                } 

                                else 
                                {
                                    // // Create a new choice if it doesn't exist
                                    $question->choices()->create([
                                        'option_mcq' => $optionKey,
                                        'written_response' => $optionValue,
                                        'is_correct' => (int)$isCorrect,
                                    ]);
                                }
                            }
                        
                            // Delete choices that weren't updated or created (not present in submitted options)
                            $choicesToDelete = $existingChoices->filter(function ($choice) use ($questionData) {
                                return !array_key_exists($choice->option_mcq, $questionData['options']);
                            });

                            $choicesToDelete->each->delete();
                        }

                        elseif ($questionData['type'] === 'short') {
                            // Handle short answer type
                            $question->choices()->update([
                                'written_response' => $questionData['answer'], 
                            ]);
                        }
                    
                        else {
                            // Handle trueFalse question types
                            $question->choices()->update([
                                'written_response' => $questionData['answer'],
                            ]);
                        }
                        if (!$question) {
                            throw new \Exception('Question not found'); // Handle potential errors
                        }
                    } 

                    else 
                    {
                        // Create new question
                        $question = $quiz->questions()->create([
                            'text' => $questionData['title'],
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
                    
                        elseif ($questionData['type'] === 'short') {
                            // Handle short answer type
                            $question->choices()->create([
                                'written_response' => $questionData['answer'], 
                            ]);
                        }
                    
                        elseif ($questionData['type'] === 'truefalse') {
                            // Handle trueFalse question types
                            $question->choices()->create([
                                'written_response' => $questionData['answer'],
                            ]);
                        }   
                    }
                }

            // Commit the changes
            DB::commit();
            //  dd($quiz->lecturer_course->id);
            return response()->json(['status' => 'success', 'message' => 'Quiz saved successfully.', 'lcId' => $quiz->lecturer_course->id]);
                
        } 
        catch (\Exception $e) {
            // DB::rollback();
            return response()->json(['error' => true, 'message' => $e->getMessage()]);
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
