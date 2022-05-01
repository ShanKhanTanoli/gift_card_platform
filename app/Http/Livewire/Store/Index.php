<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Business\Business;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $business, $store;

    public function mount($store_name)
    {
        if ($store = Business::FindStoreByName($store_name)) {
            $this->store = $store;
            $this->business = $store->user_id;
        } else abort(404);
    }

    public function render()
    {
        $cards = Business::CardsLatestUnsoldPaginate($this->business, 3);
        return view('livewire.store.index')
            ->with(['cards' => $cards])
            ->extends('layouts.store');
    }

    public function Buy($code)
    {
        if (!$card = Business::FindCard($this->business, $code)) {
            dd($card);
        } else return session()->flash('error', 'Something went wrong');
    }
}
