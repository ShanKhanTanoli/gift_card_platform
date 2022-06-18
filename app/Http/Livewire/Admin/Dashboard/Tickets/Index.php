<?php

namespace App\Http\Livewire\Admin\Dashboard\Tickets;

use Livewire\Component;
use App\Helpers\Ticket\Ticket;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $delete;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $cards = Ticket::LatestPaginate(10);
        return view('livewire.admin.dashboard.tickets.index')
            ->with(['cards' => $cards])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function View($code)
    {
        return redirect(route('AdminViewTicket', $code));
    }


    public function Edit($code)
    {
        if ($card = Ticket::FindBySlug($code)) {
            return redirect(route('AdminEditTicket', $card->code));
        } else return session()->flash('error', 'No such ticket found');
    }

    public function DeleteConfirmation($code)
    {
        if ($card = Ticket::FindBySlug($code)) {
            $this->delete = $card;
            $this->emit(['delete']);
        } else return session()->flash('error', 'No such ticket found');
    }

    public function Delete($id)
    {
        if ($card = Ticket::FindById($id)) {
            $card->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('AdminTickets'));
        } else return session()->flash('error', 'No such ticket found');
    }
}
