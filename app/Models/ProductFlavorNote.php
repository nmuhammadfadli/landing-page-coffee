<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFlavorNote extends Model
{
    public $timestamps = false;

    protected $fillable = ['product_id', 'locale', 'note', 'sort_order'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
