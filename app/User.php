<?php

namespace App;

//use DB; // uncommment this when extending the user
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'password', 'balance', 'staff', 'firstName', 'lastName', 'email', 'remember_token'];
    
    protected $primaryKey = 'username';	
    public $incrementing = false;
    public $timestamps = false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
