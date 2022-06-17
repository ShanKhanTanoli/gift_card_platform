<?php

namespace App\Http\Livewire\Business\Dashboard\Tickets\Sold;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $cards = Business::TicketsLatestPaginate(Auth::user()->id, 6);
        return view('livewire.business.dashboard.cards.sold.index')
            ->with(['cards' => $cards])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function View($code)
    {
        return redirect(route('BusinessViewTicket', $code));
    }
}
