<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
    //
	protected $primaryKey = 'ID';
    protected $table = 'quiz';
    public $timestamps = false;
}
