<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SymbolNumber extends Model
{
    protected $fillable=['symbol_number','symbol_number_category_id','student_id'];

  public function SymbolNumberCategory(){
  return $this->belongsTo(SymbolNumberCategory::class);}

  public function student(){
  return $this->belongsTo(Student::class);}
  
}
