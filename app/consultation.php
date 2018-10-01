<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class consultation extends Model
{
    //
    protected $primaryKey = 'ID';
    protected $table = 'consultation';
    public $timestamps = false;
}
