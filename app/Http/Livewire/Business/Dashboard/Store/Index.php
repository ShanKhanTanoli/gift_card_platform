<?php

namespace App\Http\Livewire\Business\Dashboard\Store;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    // public $business, $store;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        // if ($store = Business::Store(Auth::user()->id)) {
        //     $this->store = $store;
        //     $this->business = $store->user_id;
        // }else{

        // }
    }

    public function render()
    {
        $cards = Business::CardsLatestUnsoldPaginate(Auth::user()->id, 6);
        return view('livewire.business.dashboard.store.index')
            ->with(['cards' => $cards])
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
