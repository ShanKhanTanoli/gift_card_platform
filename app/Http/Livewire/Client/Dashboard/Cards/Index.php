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

    public function View($slug)
    {
        return redirect(route('ClientViewCard', $slug));
    }

    public function More($slug)
    {
        return redirect(route('ClientCardMore', $slug));
    }
}
