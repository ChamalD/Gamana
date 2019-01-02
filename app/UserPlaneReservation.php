<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPlaneReservation extends Model
{
    Protected $fillable = ['plane_id',
							'user_id',
							'schedule_id',
							'no_adult',
                            'takeoff_date',
							'arrival_date',
							'takeoff_airport',
							'landing_airport',
							'total_amount',
						];
	public function user(){
        return $this->belongsTo('App\User'); 
    }                                                       //relationship between other tables
	public function planes(){
        return $this->belongsToMany('App\Plane');
    }
}
