<?php

namespace App\Http\Livewire\Business\Dashboard\Tickets;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $delete;

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

    public function Issue($slug)
    {
        return redirect(route('BusinessIssueTicket', $slug));
    }

    public function View($slug)
    {
        return redirect(route('BusinessViewTicket', $slug));
    }


    public function Edit($slug)
    {
        return redirect(route('BusinessEditTicket', $slug));
    }

    public function DeleteConfirmation($slug)
    {
        if ($card = Business::FindTicketBySlug(Auth::user()->id, $slug)) {
            $this->delete = $card;
            $this->emit(['delete']);
        } else return session()->flash('error', 'No such ticket found');
    }

    public function Delete($id)
    {
        if ($card = Business::FindTicketById(Auth::user()->id, $id)) {
            $card->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('BusinessCards'));
        } else return session()->flash('error', 'No such ticket found');
    }
}
