<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class major extends Model
{
    protected $fillable = [
        'name',
        'is_active'
    ];


    public function instructors()
    {
        return $this->belongsToMany(Instructor::class, 'instructor_major', 'major_id', 'instructor_id');
    }
}
