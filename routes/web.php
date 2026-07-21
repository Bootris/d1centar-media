<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect(app()->getLocale()));

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Blog stays unprefixed for stable SEO URLs; chrome renders in the default locale.
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Video reportaže — every post that carries a YouTube/Vimeo link.
Route::get('/video', [VideoController::class, 'index'])->name('video.index');

Route::post('/contact', [ContactController::class, 'submit'])
    ->middleware('throttle:5,1')
    ->name('contact.submit');

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => 'en|sr'],
    'middleware' => 'setlocale',
], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});
