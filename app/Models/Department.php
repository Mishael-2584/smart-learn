<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'school_id'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function majors()
    {
        return $this->hasMany(Major::class);
    }
}
