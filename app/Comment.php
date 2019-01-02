<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{                                                               //model of the comment map with the comment table
    Protected $fillable = ['body',
							'image1',
                            'image2',
                            'image3',
							'user_id',
							'commentable_id',
							'commentable_type',
						];

	public function commentable(){
		return $this->morphTo();
	}                                                                           //relationships between other models
	public function user(){
		return $this->hasone('\App\User','id','user_id');

	}
}

