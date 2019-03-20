<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    protected $fillable = ['id', 'package_name','package_days', 'description', 'tag', 'image',
    ];
}
