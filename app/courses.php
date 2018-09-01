<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class courses extends Model
{	
	
   protected $primaryKey = 'ID';
   protected $table = 'courses';
   public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany('App\Users');
    }
}
