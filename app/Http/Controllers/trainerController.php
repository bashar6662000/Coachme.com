<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\trainer;
use App\Models\cours;
use App\Models\user;

class trainerController extends Controller
{

    public function user_to_trainer(REQUEST $request)
    {
        $user_session=User::where('name',session('name'))->first();

        $Enterd_name=$request->input('name');
        $rules = [
            'name' => 'required|unique:trainers,name'
        ];
        
        $messages = [
            'name.unique' => 'the name is already taken'
        ];
        $request->validate($rules, $messages);

        $Enterd_password=$request->input('password');
        $hashed_pass=hash::make($Enterd_password);
        $email=$user_session->email;
        $id=$user_session->id;
       
        if($user_session->name==$Enterd_name&&hash::check($Enterd_password,$user_session->password))
        {
            trainer::create(
               [
                    'name'  => $Enterd_name,
                    'email' => $email,
                    'password' => $hashed_pass
               ]
               );
              
               $user_controller=app(UserController::class);
               $user_controller->delete($id);
               return redirect('/DashBoard');
        }else{
            return 'incorrect password or user name';
        }
    }

    public function Change_name(REQUEST $request)
    {
        $name=$request->input('name');

        $trainer=trainer::where('name',session('name'))->first();
        $user=user::where('name',session('name'))->first();

        $validate_name=$request->validate
        ([
            'name'=>'required|unique:users|unique:trainers',
        ]);

        if($trainer)
        {
            $trainer->name=$name;
            session(['name'=>$name]);
            $trainer->save();
        }
        elseif($user)
        {
            $user->name=$name;
            session(['name'=>$name]);
            $user->save();
        }
    }

    public function delete($id)
    {
        $trainer=trainer::find($id)->first();
        if ($trainer)
        {
            $trainer->delete();
        }
    }

    public function Return_ChangeState()
    {
        return view('BecomeTrainer');
    }
    public function return_trainer_data_ToAdmin_page()
    {
       $Trainers=trainer::all();
        return view('Admin.Trainers')->with('Trainers',$Trainers);
    }
    public function retirn_courses_Dashboard()
    {
        $trainer=trainer::where('name',session('name'))->first();
        $courses=$trainer->courses;
       try
       {
        return view('DashBoard/Courses')->with('Courses',$courses)
                                        ->with('trainer',$trainer);
       }
       catch(Exception $e)
       {
        
       } 
    }
    /**
     * test
     */
   public function test()
   {
       $Courses=trainer::where('id','=',1)->first();
       return($Courses->courses);
   }

   public function trainer_byID($id)
   {
       $trainer=trainer::find($id);
       return $trainer;
   }
   public function Quit_course($Course_id,$Trainer_id)
    {
        DB::table('trainer_course')
        ->where('course_id',$Course_id)
        ->where('trainer_id',$Trainer_id)
        ->delete();  
        return redirect()->back();
    }
    /**
     * here
     */
   
}

