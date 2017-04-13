<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
	
	public $timestamps = false;
	protected $fillable = ['id', 'username', 'reservationStartDate', 'paid', 'dateReserved', 'room'];

}
