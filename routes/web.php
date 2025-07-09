<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Route livewire for Menu
    Route::get('/menu', \App\Livewire\Menu\Index::class)->name('menu.index');
    Route::get('/menu/create', \App\Livewire\Menu\Create::class)->name('menu.create');
    Route::get('/menu/edit/{id}', \App\Livewire\Menu\Edit::class)->name('menu.edit');
    Route::get('/menu/show/{id}', \App\Livewire\Menu\Show::class)->name('menu.show');
    // Route livewire for Event
     Route::get('/event', \App\Livewire\Event\Index::class)->name('event.index');
     Route::get('/event/create', \App\Livewire\Event\Create::class)->name('event.create');
     Route::get('/event/edit/{id}', \App\Livewire\Event\Edit::class)->name('event.edit');
    Route::get('/event/show/{id}', \App\Livewire\Event\Show::class)->name('event.show');
    //  Route livewire for Promo
    Route::get('/promo', \App\Livewire\Promo\Index::class)->name('promo.index');
    Route::get('/promo/create', \App\Livewire\Promo\Create::class)->name('promo.create');
    Route::get('/promo/show/{id}', \App\Livewire\Promo\Show::class)->name('promo.show');
    Route::get('/promo/edit/{id}', \App\Livewire\Promo\Edit::class)->name('promo.edit');
    // Route livewire for Transaksi
    Route::get('/transaksi', \App\Livewire\Transaksi\Index::class)->name('transaksi.index');
    Route::get('/transaksi/show/{id}', \App\Livewire\Transaksi\Show::class)->name('transaksi.show');
    Route::patch('/transaksi/{id}/status', \App\Livewire\Transaksi\Show::class)->name('transaksi.update.status');
    // Route livewire for About
    Route::get('/about', \App\Livewire\About\Index::class)->name('about.index');
    Route::get('/about/create', \App\Livewire\About\Create::class)->name('about.create');
    Route::get('/about/edit/{id}', \App\Livewire\About\Edit::class)->name('about.edit');
    Route::get('/about/show/{id}', \App\Livewire\About\Show::class)->name('about.show');
    // Route livewire for Feedback
    Route::get('/feedback', \App\Livewire\Feedback\Index::class)->name('feedback.index');
});


