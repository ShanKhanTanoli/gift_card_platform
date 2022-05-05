<?php

namespace App\Http\Livewire\Client\Dashboard\Cards;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Client\Client;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $cards = Client::LatestCardsPaginate(Auth::user()->id, 10);
        return view('livewire.client.dashboard.cards.index')
            ->with(['cards' => $cards])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function View($code)
    {
        return redirect(route('ClientViewCard', $code));
    }

    public function Recharge($code)
    {
        return redirect(route('ClientRechargeCard', $code));
    }
}
