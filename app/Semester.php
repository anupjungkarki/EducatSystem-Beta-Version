<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable=['name'];
    
    public function student(){
    return $this->hasMany(Student::class);}
    
    public function SymbolNumberCategory(){
   	return $this->hasMany(SymbolNumberCategory::class);}

   	public function ProgramCourse(){
   	return $this->hasMany(ProgramCourse::class);}

}