<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class cours extends Model
{
  public $timestamps=false;
    protected $fillable=['id','name','small_description','description','price','trainer_id','rate','category_id'];

     /*
     * get the tranier of the course
     */

    public function trainer():BelongsTo
    {
     return $this->belongsTo(trainer::class);
    }

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
      use HasFactory;
}
