<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class itfield extends Model
{
    //
   protected $primaryKey = 'ID';
   protected $table = 'itfield';
   public $timestamps = false;
   protected $fillable = ['Category','Feutures'];
}
