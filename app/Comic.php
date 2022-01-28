<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'title',
        'type',
        'thumb',
        'series',
        'price',
        'sale_date',
        'description',
    ];
}
