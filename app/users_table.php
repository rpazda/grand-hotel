<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class users_table extends Model
{
    //
	protected $table = 'users';

	protected $primaryKey = 'username';	
	public $incrementing = false;

	public $timestamps = false;	
}
