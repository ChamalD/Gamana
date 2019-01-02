<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaneSchedule extends Model
            {                                           //model of the plane schedule map with the plane schedule table
    Protected $fillable = ['plane_id',
							'day',
                            'remaining_capacity',
							'stop',
							'takeoff_airport',
							'middle_airport',
							'landing_airport',
                            'duration',
                            'takeoff_time1',
							'landing_time1',
							'takeoff_time2',
							'landing_time2',
						];

	public function planes(){
        return $this->belongsToMany('App\Plane');   //relationship between other tables
    }

}
