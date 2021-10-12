<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'Estimated_revenue','Ad_impressions','Ad_eCPM','click_id'
    ];

    public function click()
    {
        return $this->belongsTo(Click::class);
    }

    protected $guarded = [];
}
