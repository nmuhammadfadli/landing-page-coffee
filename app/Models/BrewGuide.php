<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrewGuide extends Model
{
    protected $fillable = [
        'name_id', 'name_en', 'photo', 'ratio', 'temperature',
        'time_id', 'time_en', 'grind_size_id', 'grind_size_en',
        'description_id', 'description_en',
    ];

    public function steps()
    {
        return $this->hasMany(BrewGuideStep::class);
    }


}
