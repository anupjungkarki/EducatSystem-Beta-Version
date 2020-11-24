<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
        protected $fillable=[
           'faculty_id',
           'teacher_name',
           'teacher_status',
           'teacher_email',
           'teacher_address',
           'contact_number',
           'subject',
           'join_year',
           'gender',
           't_description',
           'address',
           'upload_image',
        ];
}
