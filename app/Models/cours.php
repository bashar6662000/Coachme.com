<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class cours extends Model
{
  public $timestamps=false;
    protected $fillable=['id','name','description','trainer_id','rate'];
    /**
     * get the tranier of the course
     */

   public function trainer():BelongsTo
   {
    return $this->belongsTo(trainer::class);
   }
    use HasFactory;

}
