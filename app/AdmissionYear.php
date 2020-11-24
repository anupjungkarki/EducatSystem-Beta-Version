<?php
use App\SymbolNumberCategory;
namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmissionYear extends Model
{
    protected $fillable=['admission_year'];

    public function student(){
    return $this->hasMany(Student::class);}

    public function SymbolNumberCategory(){
   	return $this->hasMany(SymbolNumberCategory::class);}
}
