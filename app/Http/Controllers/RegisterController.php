<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rules\Password;
use App\Models\student_subject;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Student;
use App\Models\Admin;


class RegisterController extends Controller
{



    //views page in which admin can make account for either student or another admin
    public function index()
  {
    return view('admin.register');
  }
    //stores the new account data in DB
    public function store(Request $request)
  {
    $this->validate($request,[
        'name'=> 'required|max:200',
        'email'=> 'required|email|max:200|unique:users,email,{$userID}',
        'password'=> ['required',Password::min(8)->numbers()->symbols()]
    ]);

  User::create(
        ['name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
            'is_admin'=>$request->is_admin]
    );
    if(($request->is_admin)==0)
    {

      Student::create(
        ['name'=>$request->name,
        'email'=>$request->email,


            ]
    );
    }

    else{
      Admin::create(
        ['name'=>$request->name,
        'email'=>$request->email,

            ]
    );

    }
    return redirect()->route('admin.register');


    }
    //views page in which all students appear
    public function list()
    {
      $students=Student::all();
      return view('admin.liststud',['students'=>$students]);
    }
    //used to delete a student from DB
    public function delete($id)
    {$student=Student::find($id);
      $user=User::firstwhere('email',$student->email);
      student_subject::where('Student_id',$id)->delete();
      $student->delete();
      $user->delete();
    return redirect()->route('admin.liststud');
    }
    public function archive()
    {
      $students=Student::onlyTrashed()->get();
      return view('admin.archive',['students'=>$students]);
    }
    public function restore($id)
    { $student=Student::withTrashed()->find($id);
      $student->restore();
      $user=User::withTrashed()->where('email',$student->email)->restore();
      student_subject::withTrashed()->where('Student_id',$id)->restore();
    
    return redirect()->route('admin.liststud');
    }
    public function forcedelete($id)
    { $student=Student::withTrashed()->find($id);
      $user=User::withTrashed()->where('email',$student->email) ->forcedelete();
      student_subject::withTrashed()->where('Student_id',$id)->forcedelete();
      $student->forcedelete();
     
    
    return redirect()->route('admin.liststud');
    }
    //views the enrolled subjects of a certain student who was selected by the admin
    public function update($id)
    {
        $stud=Student::firstwhere('id',$id);
        $email=Student::firstwhere('id',$id)->email;
        $subjects_id=student_subject::where('Student_id',$id)->get('Subject_id')->toArray();
        $records=student_subject::where('Student_id',$id)->get();
        $subjects=[];
        foreach ($subjects_id as $sbj)
        { $subjects[]=Subject::firstwhere('id',$sbj);}
      return view('admin.gpaedit',compact('subjects','id','records','stud'));
    }
    //edits the gpa of the student in a certain subject and updates the total gpa
    


}

