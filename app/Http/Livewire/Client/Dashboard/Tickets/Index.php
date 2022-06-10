<?php

namespace App\Http\Livewire\Client\Dashboard\Tickets;

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
        $cards = Client::LatestTicketsPaginate(Auth::user()->id, 10);
        return view('livewire.client.dashboard.tickets.index')
            ->with(['cards' => $cards])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function View($slug)
    {
        return redirect(route('ClientViewTicket', $slug));
    }
}
