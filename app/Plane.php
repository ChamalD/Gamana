<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{                                               //model of the plane map with the plane table
    Protected $fillable = ['plane_id',
							'plane_capacity',
                            'airline',
					        'airline_img',
							'ticket_price',
						];
	public function planeSchedules(){
        return $this->hasMany('App\PlaneSchedule');
    }

    public function userPlaneReservations(){                                    //relationship between other tables
        return $this->hasMany('App\UserPlaneReservation'); 
    }

    public function users(){
    	return $this->hasMany('App\User');
    }

    public function comments(){
        return $this->morphMany('App\Comment','commentable'); 
    }

}
