<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'major_id', 'role_id', 'major_id', 'level', 'group'];
    
    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
