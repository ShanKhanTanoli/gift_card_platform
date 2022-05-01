<?php

use App\Http\Livewire\Store\Index as Store;

Route::get('Store/{store_name}', Store::class)
    ->name('StorePage');
