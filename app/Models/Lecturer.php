<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'role_id', 'school_ids', 'verified', 'phone', 'imgpath', 'bio', 'linkedin', 'facebook', 'twitter', 'instagram', 'youtube'];

    public function role()
    {
        return $this->belongsTo(Role::class);
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

    public function getSchoolIdsAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setSchoolIdsAttribute($value)
    {
        $this->attributes['school_ids'] = json_encode($value);
    }
}
