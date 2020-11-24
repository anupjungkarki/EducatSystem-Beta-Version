<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
  protected $fillable=[
  	'notice_title',
  	'date_of_notice',
  	'notice_subject',
  	'description',
  ];
}
