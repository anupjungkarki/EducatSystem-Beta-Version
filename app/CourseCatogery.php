<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseCatogery extends Model
{
    protected $fillable=['faculty_id','program_id'];


     public function faculty(){
     return $this->belongsTo(Faculty::class,'faculty_id','faculty_id');}

     public function program(){
     return $this->belongsTo(Program::class,'program_id','program_id');}

}
