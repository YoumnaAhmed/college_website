<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student_subject extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'Student_id',
        'Subject_id',
        'GPA',
        'Grade',



    ];
}
