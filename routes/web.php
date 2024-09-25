<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScrapController;
use App\Http\Controllers\EbayController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('web-page',[ScrapController::class,'index'])->name('web-page');
Route::get('ebay-page',[EbayController::class,'index'])->name('ebay-page');