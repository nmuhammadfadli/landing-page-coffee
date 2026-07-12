<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'slug', 'title_id', 'title_en', 'category_id', 'category_en',
        'image', 'date_published', 'read_time_id', 'read_time_en',
        'summary_id', 'summary_en', 'body_intro_id', 'body_intro_en',
        'body_p1_id', 'body_p1_en', 'body_p2_id', 'body_p2_en',
        'body_p3_id', 'body_p3_en', 'pull_quote_id', 'pull_quote_en',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'date_published' => 'date',
            'is_published' => 'boolean',
        ];
    }
}
