<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'Subject_name',
        'Credit_Hours',
        
    ];

    public function Student(){
        return $this->belongsToMany(Student::class,'student_subject');

    }
}
