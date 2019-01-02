<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{                                                   //model of the role map with the role table
    Protected $fillable = ['name',
						];

	
	public function users(){
        return $this->hasMany('App\User');  //relationship between other tables
    }

}
