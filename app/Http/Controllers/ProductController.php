<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $others = Product::where('slug', '!=', $slug)->where('is_featured', true)->inRandomOrder()->take(3)->get();

        return view('pages.product', compact('product', 'others'));
    }
}
