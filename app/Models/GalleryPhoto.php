<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryPhoto extends Model
{
    protected $fillable = [
        'image', 'title_id', 'title_en', 'desc_id', 'desc_en', 'sort_order',
    ];
}
