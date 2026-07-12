<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/catalog', [HomeController::class, 'catalog'])->name('catalog');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/articles', [HomeController::class, 'articles'])->name('articles');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('article.show');

Route::post('/language', function () {
    $locale = request('locale', 'id');
    if (in_array($locale, ['id', 'en'])) {
        session(['nayaka_language' => $locale]);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('language.switch');

Route::post('/newsletter', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
