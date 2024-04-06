<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\trainer;
use App\Models\cours;
use App\Models\User;
use App\Models\Category;
class CategoryController extends Controller
{

    public function index()
    {
        $categories=Category::all();
        return view('Admin.Categories')->with('categories',$categories);
    }
    public function Return_create()
    {
        return view('Admin.Create_Categories');
    }

  
public function create(Request $request)
{
    try
     {
        // Validate the input 
        $request->validate([
            'name' => 'required|unique:categories,name',  # Ensure the name is unique in the "categories" table
        ]);

        // Create a new category
        category::create([
            'name' => $request->input('name'),
        ]);

        return redirect('/Categories')->with('success', 'Category created successfully');
    } 

    catch (Exception $e)
     {
        // Handle exceptions (e.g., database errors)
        return redirect('/Categories')->with('error', 'An error occurred while creating the category');
     }
}


    public function delete($id)
    {
        $record=category::find($id);
        $record->delete();
        return redirect()->back();
    }
    
    public function update($id,REQUEST $request)
    {
        $name=$request->input('name');
        $record=category::find($id);
        $record->name=$name;
        return redirect('Admin.Categories');
    }
    
}
