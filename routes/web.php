<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WhyJeunggaController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\NewsroomController;
use App\Http\Controllers\PartnershipController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('pages.home');
});

Route::get('/about-us', function () {
    return view('pages.about-us');
});

Route::get('/about-us-view', [AboutController::class, 'aboutUs'])->name('about-us');
Route::get('/product-view', [ProductController::class, 'products'])->name('product');
Route::get('/whyjeungga-view', [WhyJeunggaController::class, 'whyjeungga'])->name('whyjeungga');
Route::get('/technology-view', [TechnologyController::class, 'technology'])->name('technologys');
Route::get('/client-view', [ClientController::class, 'client'])->name('client');
Route::get('/newsroom-view', [NewsroomController::class, 'newsroom'])->name('newsroom');
Route::get('/partnership-view', [PartnershipController::class, 'partnership'])->name('partnership');
Route::get('/contact-us-view', [ContactusController::class, 'contactus'])->name('contact-us');

Route::get('/product', function () {
    return view('pages.products');
});

Route::get('/technology', function () {
    return view('pages.technology');
});

Route::get('/why-jeungga', function () {
    return view('pages.why-jeungga');
});

Route::get('/clients', function () {
    return view('pages.clients');
});

Route::get('/newsroom', function () {
    return view('pages.newsroom');
});

Route::get('/contact-us', function () {
    return view('pages.contact-us');
});

Route::get('/partnership', function () {
    return view('pages.partnership');
});
