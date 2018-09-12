<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class itfield extends Model
{
    //

   protected $table = 'itfield';
   public $timestamps = false;
   protected $fillable = ['Category','Feutures'];
}
