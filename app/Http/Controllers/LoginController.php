<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;



class LoginController extends Controller
{

       //show login page for any of user or admin
       public function index()
    {
      return view('login');
    }
      //check if authenticated user
       public function store(Request $request)
    {
        $this->validate($request,[

            'email'=> 'required|email|max:200',
            'password'=> 'required',

        ]);
       if( !Auth::attempt($request->only('email','password','is_admin')))
       {
        return back()->with('message','incorrect username or password');

       }

       $user = auth()->user();
       if(Auth::user()->is_admin)
       {   //$admin=Admin::where('email',$user->email)->first();
            return redirect()->route('admin.profile');
       }   
      else
         { //$student=Student::where('email',$user->email)->first();
          return redirect()->route('user.profile');
         }

    }
    public function viewProfile()
    {
      $user = auth()->user();
      if(Auth::user()->is_admin)
      {   $admin=Admin::where('email',$user->email)->first();
          return view('admin.profile',compact('user'),compact('admin'));
      }
     else
         {$student=Student::where('email',$user->email)->first();
         return view('user.profile',compact('user'),compact('student'));
         }

    }
    public function changePass()
    { if(Auth::user()->is_admin)
      return view('admin.changePass');
      else
      return view('user.changePass');}    
    public function changePassword(Request $req)
    {
     $user = auth()->user();
     if (!Hash::check($req->old, $user->password)) {
      return redirect()->back()->with('message','incorrect password');
  }
     $validate=Validator::make(
      $req->all(),['new_password'=> Password::min(8)->numbers()->symbols()]);
     
     if($validate->fails())
     return redirect()->back()->withErrors($validate->errors()); 
    
   

     if($req->new_password==$req->repeated)
     {$user->password=$req->new_password;
      $u=User::firstwhere('id',$user->id);
      $u->password=Hash::make($req->new_password);
      $u->update();
       return redirect()->route('login'); 
     }
     else
     return redirect()->back()->with('message','please re-enter password correctly');

     }

       //return to the home menu
       public function home (Request $request){  
        $user = auth()->user();
        if(Auth::user()->is_admin)
         {   
          return redirect()->route('admin.profile');
           
         }
        else{
          return redirect()->route('user.profile');
          
      }
       }
  
    public function logout () {
      Auth::logout();
      return redirect()->route('login');
  
  
    }
    }


