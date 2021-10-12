<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'clicks','Ad_CTR'
    ];

    protected $guarded = [];
}
