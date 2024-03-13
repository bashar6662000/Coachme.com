<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class trainer extends Model
{
    protected $fillable =['id', 'name','email','password', 'bio','rate'];
    public $timestamps=false;
    /**
     *  get the Courses for the trainer
     */
    public function courses()
    {
        return $this->hasMany(cours::class);
    }
    /**
     * this a function i took from stackoverflow.com
     *  the purpose of it is when i delete a trainer all his courses is automatically deleted 
     **/
   protected static function booted()
    {
    static::deleting(function (trainer $trainer)
    {
        $trainer->courses()->delete();
    });
   }

    use HasFactory;
}
