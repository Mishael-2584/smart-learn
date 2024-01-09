<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomStreamPost extends Model
{
    use HasFactory;

    protected $fillable = ['lecturer_course_id', 'student_id', 'lecturer_id', 'content'];

    public function student(){

        return $this->belongsTo(Student::class);
    }

    public function lecturer(){

        return $this->belongsTo(Lecturer::class);
    }

    public function lecturerCourse(){

        return $this->belongsTo(LecturerCourse::class, 'lecturer_course_id');
    }

    //has many relationship with comment model
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
