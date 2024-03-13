<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\cours;
use App\Models\trainer;

class UserController extends Controller
{
    /***********Error messgae for deplicated data */
    public function create_user(REQUEST $request)
    {
        $name=$request->input('name');
        $email=$request->input('email');
        $password=$request->input('password');
        $hasehd_password=Hash::make($password);
        
        if (User::where('name',$name)->first()==null&&User::where('email',$email)->first()==null&&trainer::where('name',$name)->first()==null&&trainer::where('email',$email)->first()==null)
        {
        User::create(
            [
                'name'=>$name,
                'email'=>$email,
                'password'=>$hasehd_password
            ]
            );
        return redirect('/login');
        }else
        {
            return 'error';
        } 
    }

    public function Return_signup_page()
    {
        return view('signup');
    }

    /**
     * login section  
     */
    public function login(REQUEST $request)
    {   
        
        $user_name=$request->input('name');
        $user_password=$request->input('password');
        $user=User::where('name',$user_name)->first();
        $trainer=trainer::where('name',$user_name)->first();
        if($user!==null&&hash::check($user_password,$user->password))
        {
           session(['name'=>$user_name]);
        }elseif($trainer!==null&&hash::check($user_password,$trainer->password))
        {
            session(['name'=>$user_name]);
        }
        else{
            return 'false pass or name';
        }

       return redirect('/');

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
        $hidden;
        if($user==null)
        {
            $state='trainer';
            $hidden='visible';
            return view('DashBoard')->with('choseen',$trainer)
                                    ->with('state',$state)
                                    ->with('hidden',$hidden);
        }elseif($trainer==null)
        {
            $state='user';
            $hidden='hidden';
            return view('DashBoard')->with('choseen',$user)
                                    ->with('state',$state)
                                    ->with('hidden',$hidden);
        }
        
    }
}