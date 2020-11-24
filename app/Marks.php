<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
       protected $fillable=['subject_id','symbol_number_id','marks','symbol_number_catogery_id'];

       protected $table='marks';

       public function programcourse()
       {
        return $this->belongsTo(ProgramCourse::class,'subject_id');
       }
}
