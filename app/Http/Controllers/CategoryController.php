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

public function Create(REQUEST $request)
    {
        $name=$request->input('name');
        category::create([
            'name' => $name,
        ]);
        return redirect('Admin.Categories');
    }

    public function delete($id)
    {
        $record=category::where($id);
        $record->delete();
        return redirect('Admin.Categories');
    }
    
    public function update($id,REQUEST $request)
    {
        $name=$request->input('name');
        $record=category::find($id);
        $record->name=$name;
        return redirect('Admin.Categories');
    }
    
}
