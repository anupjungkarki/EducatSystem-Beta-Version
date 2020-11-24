<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SymbolNumberCatogery extends Model
{
     protected $fillable=['faculty_id','program_id','year_id','semester_id','admission_year_id'];


     public function semester(){
     return $this->belongsTo(Semester::class);}

     public function year(){
     return $this->belongsTo(Year::class);}

     public function faculty(){
     return $this->belongsTo(Faculty::class,'faculty_id','faculty_id');}

     public function  program(){ 
     return $this->belongsTo(Program::class,'program_id','program_id');}

     public function AdmissionYear(){
     return $this->belongsTo(AdmissionYear::class);}

     public function symbolnumber(){
     return $this->hasMany(SymbolNumber::class);}
}
