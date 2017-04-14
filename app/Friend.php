<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
	protected $fillable = ['id', 'init_user', 'accept_user', 'accepted'];
	public $timestamps = false;
}
