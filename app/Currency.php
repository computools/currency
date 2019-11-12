<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';

    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable = [
        'name',
        'rate',
        'code'
    ];
}