<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['enrollment_id', 'title', 'description', 'deadline', 'time_limit'];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
