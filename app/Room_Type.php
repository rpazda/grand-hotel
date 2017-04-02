<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room_Type extends Model
{
	protected $table = 'room_type';
	protected $primaryKey = 'description';

	public $incrementing = false;
	public $timestamp = false;
}
