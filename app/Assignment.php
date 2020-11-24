<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable=[
    	'program_id',
        'faculty_id',
        'year_id',
        'semester_id',
    	'assignment_title',
    	'deadline',
    	'message_to_student',
    	'assignment_subject',
    	'teacher_name',
    	'upload_file'
    ];
}
