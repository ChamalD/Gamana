<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{                                               //model of the room map with the room table
    Protected $fillable = ['hotel_id',
        'room_img',
        'room_name',
        'room_type',
        'no_rooms_available',
        'capacity',
        'price',
        'wifi_state',
        'welcome_drink',
        'parking',
    ];
}
