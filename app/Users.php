<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
	protected $primaryKey = 'ID';
    protected $table = 'user';
    public $timestamps = false;

     public function courses()
    {
        return $this->belongsToMany('App\courses');
    }
}
