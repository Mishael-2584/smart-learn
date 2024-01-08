<?php

namespace App\Models;

use App\Http\Controllers\DepartmentCourseController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerCourse extends Model
{
    use HasFactory;

    protected $table = 'lecturer_courses';
    protected $fillable = ['day', 'start_time', 'end_time', 'meet_url', 'lecturer_id', 'course_id', 'status', 'department_courses_id'];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function departmentcourse()
    {
        return $this->belongsTo(DepartmentCourse::class, 'department_courses_id');
    }
}
