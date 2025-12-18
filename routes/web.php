<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::post('/send', [\App\Http\Controllers\ContactController::class, 'sendMail']);
Route::post('/send-ajax', [\App\Http\Controllers\ContactController::class, 'sendAjax']);
Route::get('lang/{lang}', function ($lang) {
    if (! in_array($lang, ['vi', 'en'])) {
        abort(404);
    }
    session(['locale' => $lang]);
    return back();
})->name('lang.switch');
Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index']);
Route::get('/{type}/{slug?}', [HomeController::class, 'page'])->where('type', 'gioi-thieu|tuyen-dung');
Route::get('/tin-tuc', [\App\Http\Controllers\HomeController::class, 'category']);
Route::post('/register-email', [\App\Http\Controllers\HomeController::class, 'registerEmail']);
Route::post('/vote-star', [\App\Http\Controllers\HomeController::class, 'voteStar']);
Route::get('/tin-tuc/{slug}', [\App\Http\Controllers\HomeController::class, 'category']);
Route::get('/bai-viet/{slug1}', [\App\Http\Controllers\HomeController::class, 'detail']);
Route::get('/lien-he', [\App\Http\Controllers\HomeController::class, 'contact']);
Route::get('/tags/{slug}', [\App\Http\Controllers\HomeController::class, 'tags']);
Route::get('/san-pham', [\App\Http\Controllers\HomeController::class, 'products']);
Route::get('/{slug}/{slug1}', [\App\Http\Controllers\HomeController::class, 'product_detail']);
Route::get('/{slug}', [\App\Http\Controllers\HomeController::class, 'products']);


