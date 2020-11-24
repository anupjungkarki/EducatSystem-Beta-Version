<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Faculty;

class Program extends Model
{
 protected $primarykey="faculty_id";
       protected $fillable = [
          'program_name',
          'faculty_id'
        ];
        
    public function faculty(){
    return $this->belongsTo(Faculty::class,'faculty_id','faculty_id');}

    public function student(){
    return $this->hasMany(Student::class,'program_id','program_id');}

    public function SymbolNumberCategory(){
    return $this->hasMany(SymbolNumberCategory::class);}

    public function CourseCatogery(){
    return $this->hasOne(CourseCatogery::class);}
}
