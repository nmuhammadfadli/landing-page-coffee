<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimelineStep extends Model
{
    protected $fillable = [
        'step_number', 'title_id', 'title_en', 'subtitle_id', 'subtitle_en',
        'description_id', 'description_en', 'icon',
    ];
}
