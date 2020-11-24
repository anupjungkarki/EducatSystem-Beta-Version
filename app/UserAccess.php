<?php

namespace App;
use App\UserAccess;

use Illuminate\Database\Eloquent\Model;

class UserAccess extends Model
{
    
    protected $fillable=['user_role_id','module_id','add','view','edit','delete'];


}
