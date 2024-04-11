<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\trainer;
use App\Models\cours;
use App\Models\User;
use App\Models\Category;

class CoursController extends Controller
{

    public function create_Course(REQUEST $request)
    {  
        $trainer=trainer::where('name',session('name'))->first();
        $name=$request->input('name');
        $small_description=$request->input('small_description');
        $description=$request->input('description');
        $price=$request->input('price');
        $category_id=$request->input('category');

        try{
            $request->validate([
                'name' => 'unique:cours,name'
            ]);
            
            $course=  cours::create(
           [
            'name'=>$name,
            'small_description'=>$small_description,
            'description'=>$description,
            'price'=>$price,
            'category_id'=>$category_id
           ]);

           $trainer->courses()->attach($course->id, ['is_creator' => true]);
           return redirect('/DashBoard/Courses');
           }

        catch(Exception $e)
           {
              return 'some error ocurred while creating the course';
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

    public function index(REQUEST $request)
    {
        $user_session=user::where('name',session('name'))->first();
        $courses=cours::all();
        $categories=category::all();
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
                            ->with('user',$user_session)
                            ->with('categories',$categories);
    }

    public function return_Course_info($id,REQUEST $request)
    {
        $course=cours::find($id);
        $categories=category::all();
        $user=user::where('name',session('name'))->first();
       
        $trainer_controller=app(trainerController::class);
        $trainer_course=DB::table('trainer_course')->where('course_id',$course->id)->where('is_creator',true)->first();
        
        $trainer=$trainer_controller->trainer_byID($trainer_course->trainer_id);
        $trainer_session=trainer::where('name',session('name'))->first();
        $state;

        $currentRoute = $request->url();
        session(['current_route' => $currentRoute]);

        if(session('name')==null) // if there is no user
        {
            $hidden='';
            $state='user';
            return view('course_Detail')->with('Course',$course)
                                        ->with('state',$state)
                                        ->with('trainer_name',$trainer)
                                        ->with('hidden',$hidden)
                                        ->with('categories',$categories);
                                      
        }
        else
        {
          if($trainer_session) // if its trainer
          {
            if($trainer_course->trainer_id==$trainer_session->id)
            {
               
                $hidden='hidden';
                $state='trainer';
              
                return view('course_Detail')->with('Course',$course)
                                            ->with('state',$state)
                                            ->with('trainer_name',$trainer)
                                            ->with('hidden',$hidden)
                                            ->with('categories',$categories);
            }
            else if($trainer_course->trainer_id !=$trainer_session->id)
            {
                $hidden='visible';
                
                $state='trainer';
                return view('course_Detail')->with('Course',$course)
                                            ->with('state',$state)
                                            ->with('trainer_name',$trainer)
                                            ->with('hidden',$hidden)
                                            ->with('categories',$categories);
            }
            else 
            { 
                $hidden='error';
                $state='trainer';
                return view('course_Detail')->with('Course',$course)
                                            ->with('state',$state)
                                            ->with('trainer_name',$trainer)
                                            ->with('hidden',$hidden)
                                            ->with('categories',$categories);
            } 
         }
        else //if user
         {
           
                $hidden='';
                $state='user';
                return view('course_Detail')->with('Course',$course)
                                            ->with('state',$state)
                                            ->with('trainer_name',$trainer)
                                            ->with('hidden',$hidden)
                                            ->with('categories',$categories);
                                           
         }
       
        }
       
    }

    public function return_course_data_ToAdmin_page()
    {
        $Courses= cours::all();
        return view ('Admin.Course')->with('Courses',$Courses);
    }

    public function return_create_Course()
    {
        $categories= category::all();
        return view('DashBoard.CreateCourse')->with('categories',$categories);
    }

    public function delete_Course_DashBoard($id)
    {
        $record=cours::find($id);
        $record->delete();
        return redirect('/DashBoard/Courses');
    }

 public function user_Enroll_in_Course($id,REQUEST $request)
    {
        // Check if thers some is logged in
        if($request->session()->has('name'))
        {
            //find the user who is trying to enroll in the course by name
            $user=user::where('name',session('name'))->first();
            //find the course by ID
            $course = Cours::find($id);
            //in the follwing if conditions we arc checking if the user is already enrolled in the course
            if($user&&$course)
            {
                $enrollmentExists=DB::table('cours_user')
                ->where('user_id',$user->id)
                ->where('cours_id',$course->id)
                ->exists();

                if($enrollmentExists)
                {
                    return "User {$user->name} is already enrolled in course {$course->name}.";
                }
                else
                {
                    DB::table('cours_user')->insert([
                        'user_id' => $user->id,
                        'cours_id' => $course->id
                    ]);
                    echo "User {$user->name} has been enrolled in course {$course->name}.";
                }
            }
        }
        else 
        {   
             // when try to enroll with no user or trainer logged in :
            session(['flag_previous' => 1]);
            $user_controller = app(UserController::class);
            return $user_controller->Return_signup_page();
        }
        
    }

    public function Trainer_Enroll_in_Course($id,REQUEST $request)
    {
        if($request->session()->has('name'))
        {
            //find the user who is trying to enroll in the course by name
            $trainer=trainer::where('name',session('name'))->first();
            //find the course by ID
            $course = Cours::find($id);
            //in the follwing if conditions we arc checking if the user is already enrolled in the course
            if($trainer&&$course)
            {
                $enrollmentExists=DB::table('trainer_course')
                ->where('trainer_id',$trainer->id)
                ->where('course_id',$course->id)
                ->exists();
                if($enrollmentExists)
                {
                    return "User {$trainer->name} is already enrolled in course {$course->name}.";
                }
                else
                {
                    DB::table('trainer_course')->insert([
                        'trainer_id' => $trainer->id,
                        'course_id' => $course->id,
                        'is_creator' => false
                    ]);
                    echo "User {$trainer->name} has been enrolled in course {$course->name}.";
                }
            }
        }
        else 
        {
            return "please login first to continue";
        }
    }

    public function return_update_course($id)
    {
        $categories=Category::all();
        $wanted_Cours=cours::find($id);
       return view('DashBoard.Update_courses')->with('categories',$categories)
                                              ->with('Cours',$wanted_Cours);
    }
    

public function update(REQUEST $request ,$id)
{
    $Cours=cours::find($id);
    
    $cours_name=$request->input('name');
    $cours_Description=$request->input('description');
    $cours_Small_Descrption=$request->input('small_description');
    $cours_category=$request->input('category');
    $cours_price=$request->input('price');

    $Cours->name=$cours_name;
    $Cours->small_description=$cours_Small_Descrption;
    $Cours->description=$cours_Description;
    $Cours->category_id=$cours_category;
    $Cours->price=$cours_price;

    $Cours->save();
    return redirect('/DashBoard/Courses');
}
   public function Trainer_courses($id)
   {

       $trainer=trainer::findOrFail($id);
       $trainer_name=$trainer->name;
       $courses=$trainer->courses;
       $categories=category::all();
        return view('trainer_courses')->with('courses',$courses)
                                     ->with('name',$trainer_name)
                                     ->with('categories',$categories);
       
       
   }
   public function Courese_by_category($id)
   {
    $courses=cours::where('category_id',$id)->get();
    $cat=category::where('id',$id)->first();
    $categories=category::all();
    return view('courses_by_category')
    ->with('courses',$courses)
    ->with('categories',$categories)
    ->with('cat',$cat);
                                      
   }
   public function search(Request $request)
   {
    $keyword = $request->input('keyword');
    
    $categories=category::all();

    $trainers = Trainer::where('name', 'like', "%$keyword%")->get();
    
    $Courses = Cours::where('name', 'like', "%$keyword%")->get();
    
    return view('SearchResult', compact('trainers', 'Courses','categories'));
   }
}
