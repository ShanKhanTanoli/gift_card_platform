<?php

use App\Http\Livewire\Store\Index as Store;
use App\Http\Livewire\Store\BuyCard\Index as BuyCard;

/*Begin::View Store*/

Route::get('Store/{store_name}', Store::class)
    ->name('StorePage');
/*End::View Store*/

/*Begin::Buy Card*/
Route::get('Buy/{slug}/Card', BuyCard::class)
    ->name('BuyCard');
/*End::Buy Card*/
