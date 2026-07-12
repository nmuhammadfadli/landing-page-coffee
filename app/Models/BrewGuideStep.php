<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrewGuideStep extends Model
{
    public $timestamps = false;

    protected $fillable = ['brew_guide_id', 'step_number', 'step_id', 'step_en'];

    public function brewGuide()
    {
        return $this->belongsTo(BrewGuide::class);
    }
}
