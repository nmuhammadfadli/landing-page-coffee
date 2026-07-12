<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name', 'role_id', 'role_en', 'avatar', 'rating',
        'quote_id', 'quote_en', 'sort_order',
    ];
}
