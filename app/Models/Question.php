<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_id', 'text', 'type','number', 'points'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    protected static function booted()
    {
        static::created(function ($question) {
            $question->quiz->setTotalPointsAttribute();
            $question->quiz->save();
        });
    
        static::updated(function ($question) {
            $question->quiz->setTotalPointsAttribute();
            $question->quiz->save();
        });
    }
    

}


