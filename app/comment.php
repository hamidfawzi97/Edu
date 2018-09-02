<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
	protected $primaryKey = 'ID';
    protected $table = 'comment';
    public $timestamps = false;
}
