<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['lecturer_course_id', 'title', 'description', 'total_points', 'deadline', 'time_limit', 'published_at'];

    public function lecturer_course(){
        return $this->belongsTo(LecturerCourse::class);
    }

    
    public function setTotalPointsAttribute()
    {
        $this->attributes['total_points'] = $this->questions()->sum('points');
    }
    

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

}
