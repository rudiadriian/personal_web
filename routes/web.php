<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


Route::get('/lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'id'])) {
        abort(400);
    }
    Session::put('locale', $locale);
    return redirect()->back();
})->name('lang.switch');

Route::get('/', [PortfolioController::class, 'index'])->name('home');
