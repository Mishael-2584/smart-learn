<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;

    protected $fillable = ['submission_id', 'score'];

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }
}
