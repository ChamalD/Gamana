<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelReservation extends Model
{                                                              //model of the hotel reservation map with the hotel reservation table
    Protected $fillable = ['hotel_id',
                            'user_id',
                            'room_id',
                            'no_rooms',
                            'no_persons',
                            'checkIn_date',
                            'checkOut_date',
                            'total_amount',
    ];
}

