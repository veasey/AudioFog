<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $table = 'track';

    protected $fillable = ['title'];

    protected $attributes = [
        'plays' => 0,
    ];
}
