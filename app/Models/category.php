<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public $timestamps=false;
    protected $fillable=['id','name'];

     /**
     * get the course of the category
     */

   // Category.php
    public function course()
    {
         return $this->hasOne(cours::class, 'category_id');
    }


    use HasFactory;
}
