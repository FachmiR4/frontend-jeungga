<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\APIController;

Route::group(['namespace' => 'API'], function () {
    Route::get('get', [APIController::class, 'index'])->name('api.get');
    Route::post('post', [APIController::class, 'post'])->name('api.post');
    Route::post('post-json', [APIController::class, 'postJson'])->name('api.post-json');
    Route::put('put', [APIController::class, 'put'])->name('api.put');
    Route::delete('delete', [APIController::class, 'delete'])->name('api.delete');
});
