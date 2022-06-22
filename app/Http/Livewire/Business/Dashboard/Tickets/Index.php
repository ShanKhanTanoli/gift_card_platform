<?php

namespace App\Http\Livewire\Business\Dashboard\Tickets;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $archive;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $cards = Business::TicketsLatestPaginate(Auth::user()->id, 10);
        return view('livewire.business.dashboard.tickets.index')
            ->with(['cards' => $cards])
            ->extends('layouts.dashboard')
            ->section('content');
    }


    public function Edit($slug)
    {
        return redirect(route('BusinessEditTicket', $slug));
    }

    public function ArchiveConfirmation($slug)
    {
        if ($card = Business::FindTicketBySlug(Auth::user()->id, $slug)) {
            $this->archive = $card;
            $this->emit(['archive']);
        } else return session()->flash('error', 'No such ticket found');
    }

    public function Archive($id)
    {
        if ($card = Business::FindTicketById(Auth::user()->id, $id)) {
            /*Begin::If ticket is not Banned*/
            if (!$card->trashed()) {
                $card->update(['visibility' => 0]);
                session()->flash('success', 'Archived Successfully');
                return redirect(route('BusinessTickets'));
            } else return session()->flash('error', 'Ticket is banned');
            /*End::If ticket is not Banned*/
        } else return session()->flash('error', 'No such ticket found');
    }

    public function Publish($id)
    {
        if ($card = Business::FindTicketById(Auth::user()->id, $id)) {
            /*Begin::If ticket is not Banned*/
            if (!$card->trashed()) {
                $card->update(['visibility' => 1]);
                session()->flash('success', 'Published Successfully');
                return redirect(route('BusinessTickets'));
            } else return session()->flash('error', 'Card is banned');
            /*End::If ticket is not Banned*/
        } else return session()->flash('error', 'No such ticket found');
    }
}
