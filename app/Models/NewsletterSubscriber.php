<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    protected $fillable = ['email', 'subscribed'];

    protected function casts(): array
    {
        return [
            'subscribed' => 'boolean',
        ];
    }
}
