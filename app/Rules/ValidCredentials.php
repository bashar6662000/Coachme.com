<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Trainer;

class ValidCredentials implements Rule
{
    public function passes($attribute, $value)
{
    $user = user::where('name',request()->input('name'))->first();
    $trainer = Trainer::where('name', request()->input('name'))->first();
   
    if ($user && Hash::check($value, $user->password)) 
    {
        session(['name'=>$user->name]);
        return ('/');
    }
    
     else if ($trainer && Hash::check($value, $trainer->password)) 
    {
        session(['name'=>$trainer->name]);
        return ('/');
    }

    
}
    public function message()
    {
        return 'The provided credentials are incorrect.';
    }
}