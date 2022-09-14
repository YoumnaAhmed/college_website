<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Admin;
use App\Models\student_subject;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use function Sodium\add;

class Subjectcontroller extends Controller
{  //views the page in which admin can add a subject
    public function index()
  {
    return view('admin.addsubj');
  }



   //stores the new subject in DB
    public function store(Request $request)
  {
    $this->validate($request,[
        'Subject_name'=> 'required|max:200|unique:subjects,Subject_name',
        'Credit_Hours'=>'required'
    ]);

  Subject::create(
        ['Subject_name'=>$request->Subject_name,
        'Credit_Hours'=>$request->Credit_Hours,]

    );
    return redirect()->route("admin.addsubj");

    }


    //views all subjects to admin
    public function list()
    {
      $subjects=Subject::all();
      return view('admin.listsubj',['subjects'=>$subjects]);
    }



    //views all subjects to user to enroll in any of them
    public function student_list()
    {    $id=Auth::user()->id;
         $email=User::firstwhere('id',$id)->email;
         $student=Student::firstwhere('email',$email);

        $subjects=Subject::all();
        return view('user.listsubj',compact('subjects','student'));
    }



    //views to the student his enrolled courses
    public function enrolled_courses()
   {
       $id=Auth::user()->id;
       $email=User::firstwhere('id',$id)->email;
       $id=Student::firstwhere('email',$email)->id;
       $student=Student::firstwhere('email',$email);
       $enrollments=student_subject::where('Student_id',$id)->get();
       $subjects_id=student_subject::where('Student_id',$id)->get('Subject_id')->toArray();

        $subjects=[];
       foreach ($subjects_id as $sbj)
       {
           $subjects[]=Subject::firstwhere('id',$sbj);


       }


       return view('user.courses',compact('subjects','enrollments','student'));

   }



    public function completed_courses()
    {
        $id=Auth::user()->id;
        $email=User::firstwhere('id',$id)->email;
        $id=Student::firstwhere('email',$email)->id;
        $student=Student::firstwhere('email',$email);
        $enrollments=student_subject::where('Student_id',$id)->get();
        $subjects_id=student_subject::where('Student_id',$id)->get('Subject_id')->toArray();

        $subjects=[];
        foreach ($subjects_id as $sbj)
        {
            $subjects[]=Subject::firstwhere('id',$sbj);
        }


        return view('user.completed',compact('subjects','enrollments','student'));

    }


    




   
  

   

  
}
