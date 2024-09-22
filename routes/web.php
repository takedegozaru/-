<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/games',[GameController::class,'store_game']);
Route::get('/match',[GameController::class,'game_log'])->name('game_log');
Route::post('/add_set/{game}',[GameController::class,'add_set']);
Route::get('/match/{game}/point',[PointController::class, 'create'])->name('point.create');
Route::post('/match/{set}/point',[PointController::class, 'store'])->name('point.store');   




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';