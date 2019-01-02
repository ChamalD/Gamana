<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{                                                                   //model of the hotel map with the hotel table
    Protected $fillable = ['name', 'img','country', 'address',
        'city',
        'room_price',
        'wifi',
        'room_state',
    ];
    public function rooms(){
        return $this->hasMany('App\Room');
    }
    public function comments(){
        return $this->morphMany('App\Comment','commentable');
    }

}
