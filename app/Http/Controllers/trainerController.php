<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\trainer;
use App\Models\cours;
use App\Models\user;

class trainerController extends Controller
{

    public function user_to_trainer(REQUEST $request)
    {
        $user_session=User::where('name',session('name'))->first();
        $id=$user_session->id;
        $Enterd_name=$request->input('name');
        $Enterd_password=$request->input('password');
        $hashed_pass=hash::make($Enterd_password);
        $email=$user_session->email;
        if($user_session->name==$Enterd_name&&hash::check($Enterd_password,$user_session->password))
        {
            trainer::create(
               [
                    'name'  => $Enterd_name,
                    'email' => $email,
                    'password' => $hashed_pass
               ]
               );
               return redirect('/Users/delete-user/'.$id);
        }else{
            return 'incorrect password or user name';
        }
    }

    public function Update(REQUEST $request)
    {
        /**
         * so here i take user input
         */
        $Enterd_name=$request->input('name');
        $Enterd_password=$request->input('password');
        $Enterd_password_hashed=hash::make($Enterd_password);
        $Enterd_email=$request->input('email');
        $Enterd_bio=$request->input('bio');
        /**
         * here it we are excluding the user in session
         */
         $user_in_session=user::where('name',session('name'))->first();
         $id=$user_in_session->id;
         /**
          *here we get are all tariners except the one we excluded before
          */
         $taken_names_trainer=trainer::whereNotIn('id',[$id])->where('name',$Enterd_name)->first();
         $taken_E_mails_trainer=trainer::whereNotIn('id',[$id])->where('email',$Enterd_email)->first();
         /**
          *here we get are all users except the one we excluded before
          */
         $taken_names_user=user::whereNotIn('id',[$id])->where('name',$Enterd_name)->first();
         $taken_E_mails_user=user::whereNotIn('id',[$id])->where('email',$Enterd_email)->first();

        if(user::where('name',session('name'))->first()==null)  /**it means the element in session is trainer  */
        {
           

             if($taken_names_user!=null||$taken_E_mails_user!=null&&$taken_names_trainer!=null||$taken_E_mails_trainer!=null) /**so its make sure the trainer doesnt update his data to an existing data */
             {
               return 'User name or E-mail already taken by another user';
             }
             else
             {
            $trainer_in_session->name=$Enterd_name;
            $trainer_in_session->password=$Enterd_password_hashed;
            $trainer_in_session->email=$Enterd_email;
            $trainer_in_session->bio=$Enterd_bio;
            session(['name'=>$Enterd_name]);
            $trainer_in_session->save();
            return redirect('/DashBoard');
             }
        }
        else if(trainer::where('name',session('name'))->first()==null)  /**it means the element in session is user  */
        {

            if($taken_names_user!=null||$taken_E_mails_user!=null&&$taken_names_trainer!=null||$taken_E_mails_trainer!=null) /**so its make sure the trainer doesnt update his data to an existing data */
           
             {
               return 'User name or E-mail already taken by another user';
             }
             else
             {
             $user_in_session->name=$Enterd_name;
             $user_in_session->password=$Enterd_password_hashed;
             $user_in_session->email=$Enterd_email;
             session(['name'=>$Enterd_name]);
             $user_in_session->save();
             return redirect('/DashBoard');
             }
             
            
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
        $user_session=session('name');
        $user=User::where('name',$user_session)->first();
        $trainer=trainer::where('name',$user_session)->first();
        $Courses=$trainer->courses;
        //dd($Courses);

        if($user==null)
        {
            $state='trainer';
            
            return view('DashBoard.Courses')->with('choseen',$trainer)
                                            ->with('state',$state)
                                            ->with('Courses', $Courses);
        }
        elseif($trainer==null)
        {
            $state='user';
            return view('DashBoard.Courses')->with('choseen',$user)
                                    ->with('state',$state);
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

}

