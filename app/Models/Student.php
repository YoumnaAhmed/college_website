<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'GPA',
        'registered_hours',
        'completed_hours',

    ];

    public function Subject(){
        return $this->belongsToMany(Subject::class,'student_subject');

    }
}
