<?php

namespace App;

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
    protected $fillable = [                                 //model of the user map with the user table
        'first_name', 'last_name', 'gender', 'telephone_no', 'role_id', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function plane(){
        return $this->belongsTo('App\Plane');       //relationship between other tables
    }

    public function role(){
        return $this->belongsTo('App\Role'); 
    }

    public function userPlaneReservations(){
        return $this->belongsToMany('App\UserPlaneReservation'); 
    }

    public function comments(){
        return $this->morphMany('App\Comment','commentable'); 
    }
}


