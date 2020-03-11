<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'name',
        'image',
        'slug',
        'description'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
