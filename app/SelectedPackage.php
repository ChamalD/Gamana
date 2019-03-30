<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectedPackage extends Model
{
    Protected $fillable = [	'user_id',
							'package_id',
						];
}