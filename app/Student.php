<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // protected $table="students";
    protected $fillable = [
        'program_id',
        'faculty_id',
        'year_id',
        'semester_id',
        'admission_year_id',
        'name',
        'student_phone',
        'email',
        'permanent_address',
        'current_address',
        'dob',
        'gender',
        'parents_name' ,
        'parents_phone',
        'total_fees',
        'image',
        ];

  public function faculty(){
  return $this->belongsTo(Faculty::class,'faculty_id','faculty_id');}

  public function program(){
  return  $this->belongsTo(Program::class,'program_id','program_id');}

  public function year(){
  return $this->belongsTo(Year::class);}

  public function semester(){
  return $this->belongsTo(Semester::class);}

  public function AdmissionYear(){
  return $this->belongsTo(AdmissionYear::class);}

  public function symbolnumber(){
  return $this->hasMany(SymbolNumber::class);}

  
}
