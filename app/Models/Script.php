<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Script extends Model
{
    protected $fillable = [
        'business_type', 'location', 'platform',
        'hook', 'body', 'cta', 'overlay_texts', 'peira_link',
    ];

    protected $casts = [
        'overlay_texts' => 'array',
    ];
}