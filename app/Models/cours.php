<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class cours extends Model
{
  public $timestamps=false;
    protected $fillable=['id','name','small_description','description','price','rate','category_id'];
     /*
     * get the category of the course
     */

     public function category()
     {
         return $this->belongsTo(category::class);
     }
     /*
     * users who enrolled in the course
     */
     public function users()
     {
        return $this->belongsToMany(User::class);
     }
     /**
      * trainers who has enrolled fro the course
      */
      public function trainers()
      {
          return $this->belongsToMany(Trainer::class, 'trainer_course', 'course_id', 'trainer_id');
      }
      use HasFactory;
}
