<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
	protected $primaryKey = 'room_id';

	public $timestamps = false;
}
