<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitingPlace extends Model
{
    Protected $fillable = ['index_id',
        'location',
    ];
    public function comments(){
        return $this->morphMany('App\Comment','commentable');
    }
}
