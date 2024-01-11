<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'classroom_stream_post_id',
        'student_id',
        'lecturer_id',
        'content',
    ];

    public function post(){
        return $this->belongsTo(ClassroomStreamPost::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function lecturer(){
        return $this->belongsTo(Lecturer::class);
    }

}
