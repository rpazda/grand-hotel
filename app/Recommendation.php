<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
	protected $fillable = ['id', 'dateReserved', 'room', 'user'];
	public $timestamps = false;
}
