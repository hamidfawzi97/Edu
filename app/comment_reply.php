<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment_reply extends Model
{
    //
	protected $primaryKey = 'ID';
    protected $table = 'comment_reply';
    public $timestamps = false;

    protected $fillable = ['Reply'];
}
