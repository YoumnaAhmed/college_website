<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Subject;
use App\Models\student_subject;
use Illuminate\Support\Facades\Auth;

class EnrollController extends Controller
{
    //views list of subjects to student to enroll in it
    public function index()
    {
        return view('user.enroll');
      }
      //saves the enrolled courses in DB
    public function store($subjectid)
  {    $subj=Subject::firstwhere('id',$subjectid);
      $id=Auth::user()->id;
      $email=User::firstwhere('id',$id)->email;
      $student=Student::firstwhere('email',$email);
     
      $enrollments=student_subject::all();
      foreach ($enrollments as $enrollment)
      {
          if($enrollment->Student_id==$student->id && $enrollment->Subject_id==$subjectid)
              return redirect()->back()->with('message', 'You are already enrolled in this course')->withInput();
      }
      student_subject::create(
          ['Student_id'=>$student->id,
              'Subject_id'=>$subjectid,]
      );
      $student->registered_hours=$student->registered_hours + $subj->Credit_Hours;
      $student->update();
      return redirect()->route('user.listsubj')->with('message', 'Successfully enrolled')->withInput();
    }
}
