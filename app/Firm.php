<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'url','tags','date','advertisement_id'
    ];

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }

    protected $guarded = [];
}
