<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'slug', 'name_id', 'name_en', 'origin_id', 'origin_en',
        'roast_level', 'price', 'description_id', 'description_en',
        'image', 'rating', 'process_id', 'process_en', 'elevation',
        'sca_score', 'stock_status', 'moisture', 'fob_price_range',
        'available_lots_id', 'available_lots_en', 'defect_count_id',
        'defect_count_en', 'bag_type_id', 'bag_type_en', 'is_featured', 'sort_order',
    ];

    public function flavorNotes()
    {
        return $this->hasMany(ProductFlavorNote::class);
    }

    public function flavorNotesId()
    {
        return $this->hasMany(ProductFlavorNote::class)->where('locale', 'id');
    }

    public function flavorNotesEn()
    {
        return $this->hasMany(ProductFlavorNote::class)->where('locale', 'en');
    }
}
