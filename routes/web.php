<?php

use App\Http\Livewire\Formulir;
use App\Http\Livewire\FormUser;
use App\Http\Livewire\Home;
use Illuminate\Support\Facades\Route;


Route::get('/', Home::class)->name('formulir.home');
Route::prefix('forms')->middleware(['auth'])->group(function(){
    Route::get('/store', Formulir::class)->name('formulir.store');
    Route::get('/{form:has}', FormUser::class)->name('formulir.user')->withoutMiddleware('auth');
});
