<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WordController;
use Illuminate\Support\Facades\Route;

//テスト
Route::get('/test', function () {
    return view('tests.test');
})->middleware(['auth', 'verified'])->name('test.home');

Route::middleware(['auth'])->prefix('word')
->controller(WordController::class)->name('words.')
->group(function () {
    Route::get('/add', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/list', 'index')->name('index');
    Route::get('/check_setting', function () {
        return view('check-setting');
    })->name('set');
    Route::get('/check/result', 'resultCheck')->name('resultCheck');
    Route::post('/check/setted', 'setCheck')->name('setCheck');
    Route::get('/check/{count}', 'check')->name('check');
    Route::post('/{id}/destroy', 'destroy')->name('destroy');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::post('/{id}', 'update')->name('update');
});

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
