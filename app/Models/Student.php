<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'major_id', 'role_id', 'major_id', 'level', 'group', 'status', 'matric_no'];
    
    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function getInitialsAttribute()
    {
        $words = explode(' ', $this->name);
        $initials = '';
    
        foreach ($words as $word) {
            $initials .= strtoupper(substr($word, 0, 1));
        }
    
        return $initials;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
