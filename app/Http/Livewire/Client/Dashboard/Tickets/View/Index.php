<?php

namespace App\Http\Livewire\Client\Dashboard\Tickets\View;

use App\Helpers\Card\Card;
use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Client\Client;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $card;

    public function mount($slug)
    {
        //Begin::If this Client owns a ticket
        if ($card = Client::FindTicketBySlug(Auth::user()->id, $slug)) {
            $this->card = $card;
        } else {
            session()->flash('error', 'No such ticket found');
            return redirect(route('ClientTickets'));
        }
        //End::If this Client owns a ticket
    }

    public function render()
    {
        return view('livewire.client.dashboard.tickets.view.index')
            ->extends('layouts.dashboard');
    }
}
