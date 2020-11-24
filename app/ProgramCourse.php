<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramCourse extends Model
{
    protected $fillable=['course_catogery_id','semester_id','year_id','subject_code','subject_name'];

    public function marks()
    {
    	return $this->hasMany(Marks::class);
    }

    public function semester()
    {
    	return $this->belongsTo(Semester::class);
    }

   public function year()
     {
     return $this->belongsTo(Year::class);
     }
}
