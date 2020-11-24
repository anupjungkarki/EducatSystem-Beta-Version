<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Program;

class Faculty extends Model
{
	 //important for data insertion//
     //to create migration with:php artisan make:controller (controllerName)  -m(formigration)
    protected $fillable = [
          'faculty_name'
        ];
        protected $primaryKey = 'faculty_id';
        protected $table = "faculties";

        public function faculty(){
        return $this->hasMany(Program::class,'faculty_id','faculty_id');}

        public function student(){
        return $this->hasMany(Student::class,'faculty_id','faculty_id');}

        public function SymbolNumberCategory(){
        return $this->hasMany(SymbolNumberCategory::class);}

        public function CourseCatogery(){
        return $this->hasOne(CourseCatogery::class);}
}

