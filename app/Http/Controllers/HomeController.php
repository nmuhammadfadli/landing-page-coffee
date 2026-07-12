<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\BrewGuide;
use App\Models\FAQ;
use App\Models\GalleryPhoto;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\TimelineStep;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('is_featured', true)->orderBy('sort_order')->get();
        $articles = Article::where('is_published', true)->orderBy('date_published', 'desc')->take(3)->get();
        $testimonials = Testimonial::orderBy('sort_order')->get();
        $faqs = FAQ::orderBy('sort_order')->get();
        $timelineSteps = TimelineStep::orderBy('step_number')->get();
        $galleryPhotos = GalleryPhoto::orderBy('sort_order')->get();
        $brewGuides = BrewGuide::with('steps')->get();

        return view('pages.home', compact(
            'products', 'articles', 'testimonials', 'faqs',
            'timelineSteps', 'galleryPhotos', 'brewGuides'
        ));
    }

    public function catalog()
    {
        $products = Product::orderBy('sort_order')->get();
        $brewGuides = BrewGuide::with('steps')->get();

        return view('pages.catalog', compact('products', 'brewGuides'));
    }

    public function about()
    {
        $timelineSteps = TimelineStep::orderBy('step_number')->get();
        $galleryPhotos = GalleryPhoto::orderBy('sort_order')->get();

        return view('pages.about', compact('timelineSteps', 'galleryPhotos'));
    }

    public function articles()
    {
        $articles = Article::where('is_published', true)->orderBy('date_published', 'desc')->get();

        return view('pages.articles', compact('articles'));
    }

    public function faq()
    {
        $faqs = FAQ::orderBy('sort_order')->get();

        return view('pages.faq', compact('faqs'));
    }
}
