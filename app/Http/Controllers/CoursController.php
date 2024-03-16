<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\trainer;
use App\Models\cours;
use App\Models\User;
use App\Models\Category;
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
            $small_description = $request->input('small_description');
            $price=$request->input('price');
            $id=$Trainer_name->id;
            $category = $request->input('category');
        
            cours::create(
                [
                    'name' => $name,
                    'small_description'=>$small_description,
                    'description'=>$description,
                    'trainer_id'=> $id,
                    'price'=>$price,
                    'category_id'=> $category

                ]
            );
                return redirect('/DashBoard/Courses');
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
        return view('course_Detail')->with('Course',$course);
    }

    public function return_course_data_ToAdmin_page()
    {
        $Courses= cours::all();
        return view ('Admin.Course')->with('Courses',$Courses);
    }

    public function return_create_Course()
    {
        $categories= category::all();
        return view('CreateCourse')->with('categories',$categories);
    }

    public function delete_Course_DashBoard($id)
    {
        $record=cours::find($id);
        $record->delete();
        return redirect('/DashBoard/Courses');
    }

    public function Enroll_in_Course($id)
    {
        // Find the user by name (assuming 'name' is a column in the users table)
        $user = User::where('name', session('name'))->first();

         // Find the course by ID
         $course = Cours::find($id);

        // Check if the user is already enrolled in the course
        if ($user && $course) {
        $enrollmentExists = DB::table('courses_users')
        ->where('course_id', $course->id)
        ->where('users_id', $user->id)
        ->exists();

        if ($enrollmentExists) {
        // User is already enrolled
        return "User {$user->name} is already enrolled in course {$course->name}.";
        } else {
        // User is not enrolled, proceed with enrollment
        DB::table('courses_users')->insert([
            'course_id' => $course->id,
            'users_id' => $user->id,
        ]);
        echo "User {$user->name} has been enrolled in course {$course->name}.";
    }
    } else {
    return "Please login to enroll in courses.";
    }

    // Redirect to the course page
    return redirect('/Course/' . $id);
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
}