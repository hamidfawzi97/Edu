<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    //
	protected $fillable = ['Courses_id'];
	protected $table = 'video';
    public $timestamps = false; 
}
