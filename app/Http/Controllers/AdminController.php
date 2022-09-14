<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student_subject;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;

class AdminController extends Controller
{
    public function edit($subj_id,$stud_id,Request $req)
    {   $grades=['A+'=>4,
        'A'=>4,
        'A-'=>3.7,
        'B+'=>3.3,
        'B'=>3,
        'B-'=>2.7,
        'C+'=>2.3,
        'C'=>2,
        'C-'=>1.7,
        'D+'=>1.3,
        'D'=>1,
        'F'=>0,

    ];
        $this_enrollment=student_subject::where('Student_id',$stud_id)->where('Subject_id',$subj_id)->first();

        if($req->mark<0 || $req->mark>100)
            return redirect()->back()->with($stud_id)->with('message','Invalid mark');
        else if($req->mark>=97)
            $grade='A+';
        else if($req->mark>=93)
            $grade='A';
        else if($req->mark>=89)
            $grade='A-';
        else if($req->mark>=84)
            $grade='B+';
        else if($req->mark>=80)
            $grade='B';
        else if($req->mark>=76)
            $grade='B-';
        else if($req->mark>=73)
            $grade='C+';
        else if($req->mark>=70)
            $grade='C';
        else if($req->mark>=67)
            $grade='C-';
        else if($req->mark>=64)
            $grade='D+';
        else if($req->mark>=60)
            $grade='D';
        else
            $grade='F';

        $this_enrollment->Grade=$grade;
        $this_enrollment->GPA=$grades[$grade];
        $this_enrollment->update();
        $stud=Student::where('id',$stud_id)->first();
        $subj=Subject::where('id',$subj_id)->first();
        $points=($this_enrollment->GPA*$subj->Credit_Hours)+($stud->GPA*$stud->completed_hours);
        $hours=($stud->completed_hours)+$subj->Credit_Hours;
        $stud->completed_hours=$hours;
        $stud->registered_hours=$stud->registered_hours-$subj->Credit_Hours;
        $stud->GPA=$points/$hours;
        $stud->update();
        return redirect()->back()->with($stud_id);

    }
    public function calculate_fees (){  
        $id=Auth::user()->id;
        $email=User::firstwhere('id',$id)->email;
        $id=Student::firstwhere('email',$email)->id;
        $student=Student::firstwhere('email',$email);
        $gpa = $student -> GPA;
          if ($gpa >= 3.9){
            $discount = '70%'; 
            $discount_value = 0.7;}
          elseif ($gpa >= 3.7){
            $discount = '50%';
            $discount_value = 0.5;}
          elseif ($gpa >= 3.5){
            $discount = '30%';
            $discount_value = 0.3;}
          else{
            $discount = '0';
            $discount_value = 0;}
          $hours = $student->registered_hours;
          $fees_before =  $hours *850;
          $fees_after = $fees_before - $discount_value * $fees_before;
          return view('user.fees',compact('discount' , 'gpa','fees_before','fees_after','hours','student'));
    
         }


}
