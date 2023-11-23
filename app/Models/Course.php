<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['course_code', 'title', 'description', 'major_id', 'isGEDS'];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

}
