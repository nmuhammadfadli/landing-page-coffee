<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = 'faqs';

    protected $fillable = [
        'question_id', 'question_en', 'answer_id', 'answer_en', 'sort_order',
    ];
}
