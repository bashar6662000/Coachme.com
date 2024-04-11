<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Rules\ValidCredentials;
use App\Models\User;
use App\Models\cours;
use App\Models\trainer;
use App\Models\category;



class UserController extends Controller
{
    /***********Error messgae for deplicated data */
    public function create_user(Request $request)
{
    $name = $request->input('name');
    $email = $request->input('email');
    $password = $request->input('password');
    
    
    // Validation for username and password
    $request->validate([
        'name' => 'required|unique:users|unique:trainers',
        'password' => [
            'required',
            'min:6',
            'max:12',
            'regex:/[A-Z]/',
            'regex:/[a-z]/',
            'regex:/[0-9]/', // Require at least one number
            'regex:/[^A-Za-z0-9]/', // Require at least one special character
        ],
    ], [
        'password.regex' => 'The :attribute must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
    ]);

    $hashed_password = Hash::make($password);

    User::create([
        'name' => $name,
        'email' => $email,
        'password' => $hashed_password
    ]);
    
    return redirect('/login');
}

    public function Return_signup_page()
    {
        return view('signup');
    }

    /**
     * login section  
     */
    public function login(Request $request)
    {
    $request->validate
    ([
        'name' => ['required'],
        'password' => ['required',new ValidCredentials]
    ]);
    if(session('flag_previous') == 1)
     {
        session(['flag_previous' => 0]);
        return redirect(session('current_route'));
     }
    else
    {
        return redirect('/');
    }
    
    
}
    public function Return_login_page()
    {
        return view('login');
    }
   
    public function return_user_data_ToAdmin_page()
    {
       $Users=user::all();
        return view('Admin.User')->with('Users',$Users);
    }
    public function delete($id)
    {
        $user=user::where('id',$id);
        $user->delete();
        return redirect()->back();
    }

    public function logout (REQUEST $request)
    {
       $request->session()->flush();
       return redirect('/');
    }
    public function Return_DashBoard()
    {
        
        $user_session=session('name');
        $user=User::where('name',$user_session)->first();
        $trainer=trainer::where('name',$user_session)->first();
        $categries=category::all();
        $hidden;
        if(session('name')!=null)
        { if($user==null)
            {
                $state='trainer';
                $hidden='visible';
                return view('DashBoard')->with('choseen',$trainer)
                                        ->with('state',$state)
                                        ->with('hidden',$hidden)
                                        ->with('categories',$categries);
            }elseif($trainer==null)
            {
                $state='user';
                $hidden='hidden';
                return view('DashBoard')->with('choseen',$user)
                                        ->with('state',$state)
                                        ->with('hidden',$hidden)
                                        ->with('categories',$categries);
            }
        }
       
        else
        {
            return 'please login first';
        }
       
       
    }
    
    public function Return_Enrollment()
    {
        $user = User::where('name', session('name'))->first();
        $categories=category::all();
        $chosen;
        $state;
        if ($user)
        {
        $chosen = $user;
        $state = 'user';
        $trainer_controller=app(trainerController::class);

        $courses_id = DB::table('cours_user')->where('user_id', $user->id)->pluck('cours_id');
        $courses = Cours::whereIn('id', $courses_id)->get();
        $trainer=DB::table('trainer_course')->where('is_creator',true)->first();
        $trainer_name=$trainer_controller->trainer_byID($trainer->trainer_id);
        return view('DashBoard.Enrollment')->with('courses', $courses)
                                             ->with('choseen', $chosen)
                                               ->with('state', $state)
                                               ->with('user',$user)
                                               ->with('trainer_name',$trainer_name)
                                               ->with('categories',$categories);
        }
        else if(!$user)
        {
           
            $trainer_session=trainer::where('name',session('name'))->first();
            $chosen = $trainer_session;
            $state = 'trainer';
            $trainer_controller=app(trainerController::class);
    
            $courses_id = DB::table('trainer_course')->where('trainer_id', $trainer_session->id)->where('is_creator',false)->pluck('course_id');
            $courses = Cours::whereIn('id', $courses_id)->get();
            $trainer=DB::table('trainer_course')->where('is_creator',true)->first();
            $trainer_name=$trainer_controller->trainer_byID($trainer->trainer_id);
            return view('DashBoard.Enrollment')->with('courses', $courses)
                                                 ->with('choseen', $chosen)
                                                   ->with('state', $state)
                                                   ->with('user',$user)
                                                   ->with('trainer_name',$trainer_name)
                                                   ->with('categories',$categories);
           
        }

   }
    public function Quit_course($Course_id,$User_id)
    {
        DB::table('cours_user')
        ->where('cours_id',$Course_id)
        ->where('user_id',$User_id)
        ->delete();  
        return redirect()->back();
    }
    public function user_deatails($id)
    {
        $trainer=trainer::find($id);
        $user=user::find($id);
        $categories=category::all();
        $record;
        if($trainer)
        {
            $record=$trainer;
            return view('profile')->with('record',$record)
                                  ->with('categories',$categories);
        }
        else if($user)
        {
            $record=$user;
            return view('profile')->with('record',$record)
                          ->with('categories',$categories);
    }
  }
}