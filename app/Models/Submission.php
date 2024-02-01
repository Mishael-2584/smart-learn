<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'answer', 'score', 'quiz_id', 'assignment_id', 'answer'];


    protected $casts = [
        'answer' => 'array',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function calculateScore()
    {
        $score = 0;
        $answerArray = $this->answer;
    
        foreach ($answerArray as $questionId => $submittedAnswer) {
            $question = $this->quiz->questions()->find($questionId);
        
            switch ($question->type) {
                case 'mcq':
                    $correctAnswer = $question->choices->where('is_correct', 1)->first()->option_mcq;
                    if (strtolower($submittedAnswer) === strtolower($correctAnswer)) {
                        $score += floatval($question->points);
                    }
                    break;
                
                case 'truefalse':
                    $correctAnswer = $question->choices->first()->written_response === 'True' ? 1 : 0;
                    // Convert submitted answer to an integer (handle potential errors)
                    $submittedAnswer = intval($submittedAnswer);
                
                    // Ensure both values are 0 or 1 for comparison
                    if (in_array($submittedAnswer, [0, 1]) && $submittedAnswer === $correctAnswer) {
                        $score += floatval($question->points);
                    }
                    break;
                    
                
                case 'short':
                    $correctAnswer = $question->choices->first()->written_response;
                
                    // Handle exact matches with case-insensitive comparison
                    if (strtolower($submittedAnswer) === strtolower($correctAnswer)) {
                        $score += floatval($question->points);
                    } else {
                        // Handle related words (using a simplified example for demonstration)
                        $relatedWords = ['synonym', 'related_word1', 'related_word2'];
                        if (in_array(strtolower($submittedAnswer), $relatedWords)) {
                            $score += floatval($question->points) / 4;
                        } else {
                            // Handle misspellings (using a simple distance-based approach)
                            $distance = levenshtein($submittedAnswer, $correctAnswer);
                            $maxDistance = strlen($correctAnswer) / 4;  // Allow up to 25% misspelling
                            if ($distance <= $maxDistance) {
                                $score += floatval($question->points) * 0.75; // 3/4 of the grade
                            }
                        }
                    }
                    break;
                    
            }
        }
    
        $this->update(['score' => $score]);
    
        return $score;
    }

}
