<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\trainer;
use App\Models\cours;
use App\Models\User;

class CoursController extends Controller
{

    public function create_Course(REQUEST $request)
    {  
       if ($request->session()->has('name')) {

        $sessionName=session('name');
        $Trainer_name=trainer::where('name',$sessionName)->first();

        if($Trainer_name==null){
            'only trainers can ceate Cours';
        }
        else{

            $name=$request->input('name');
            $description=$request->input('description');
            $id=$Trainer_name->id;
        
            cours::create(
                [
                    'name' => $name,
                    'description'=>$description,
                    'trainer_id'=> $id
                ]
            );
                return 'Cours added successfully';
        }

    }

       else{
        return "please login first";
       }
    }

    public function delete_Course($id)
    {
        $record=cours::find($id);
        $record->delete();
        return redirect('/Courses');
    }

    public function update_Course(REQUEST $request)
    {
        $record=course::find($id);

        $name=$request->input('name');
        $description=$request->input('description');
        $trainer_id=$request->input('trainer_id');
        $rate=$request->input('rate');

        $record->name=$name;
        $record->descrption=$description;
        $record->trainer_id=$trainer_id;
        $record->rate=$rate;

    }

    public function return_Course_Admin()
    {

        $courses=cours::all();
        return view('Admin.Course')->with('course',$courses);

    }

    public function load_index(REQUEST $request)
    {
        $user_session=user::where('name',session('name'))->first();
        $courses=cours::all();
        if($request->session()->has('name'))
        {
           $text='logout';
           $rout='/logout';
            
        }
        else
        {
            $text='login/join';
            $rout='/join';
        }
        return view('index')->with('courses',$courses)
                            ->with('text',$text)
                             ->with('rout',$rout)
                            ->with('user',$user_session);
    }

    public function return_Course_info($id)
    {
        $course=cours::find($id);
        return view('course')->with('Course',$course);
    }

    public function return_course_data_ToAdmin_page()
    {
        $Courses= cours::all();
        return view ('Admin.Course')->with('Courses',$Courses);
    }

    public function return_create_Course()
    {
        return view('CreateCourse');
    }
    
}
