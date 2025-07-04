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
    // Route livewire Menu.Index
    Route::get('/menu', \App\Livewire\Menu\Index::class)->name('menu.index');
    Route::get('/menu/create', \App\Livewire\Menu\Create::class)->name('menu.create');
    Route::get('/menu/edit/{id}', \App\Livewire\Menu\Edit::class)->name('menu.edit');
    Route::get('/menu/show/{id}', \App\Livewire\Menu\Show::class)->name('menu.show');
    // Route livewire Menu.Create
     Route::get('/event', \App\Livewire\Event\Index::class)->name('event.index');
     Route::get('/event/create', \App\Livewire\Event\Create::class)->name('event.create');
});


