<?php

namespace App\Http\Livewire\Admin\Dashboard\Tickets;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Ticket\Ticket;

class Index extends Component
{
    public $archive,$ban;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $cards = Ticket::LatestPaginate(10);
        return view('livewire.admin.dashboard.tickets.index')
            ->with(['cards' => $cards])
            ->extends('layouts.dashboard')
            ->section('content');
    }


    public function Edit($slug)
    {
        return redirect(route('AdminEditTicket', $slug));
    }

    public function ArchiveConfirmation($slug)
    {
        if ($card = Ticket::FindBySlug($slug)) {
            $this->archive = $card;
            $this->emit(['archive']);
        } else return session()->flash('error', 'No such ticket found');
    }

    public function Archive($id)
    {
        if ($card = Ticket::FindById($id)) {
            /*Begin::If ticket is not Banned*/
            if (!$card->trashed()) {
                $card->update(['visibility' => 0]);
                session()->flash('success', 'Archived Successfully');
                return redirect(route('AdminTickets'));
            } else return session()->flash('error', 'Ticket is banned');
            /*End::If ticket is not Banned*/
        } else return session()->flash('error', 'No such ticket found');
    }

    public function Publish($id)
    {
        if ($card = Ticket::FindById($id)) {
            /*Begin::If ticket is not Banned*/
            if (!$card->trashed()) {
                $card->update(['visibility' => 1]);
                session()->flash('success', 'Published Successfully');
                return redirect(route('AdminTickets'));
            } else return session()->flash('error', 'Card is banned');
            /*End::If ticket is not Banned*/
        } else return session()->flash('error', 'No such ticket found');
    }


    public function BanConfirmation($slug)
    {
        if ($card = Ticket::FindBySlug($slug)) {
            $this->ban = $card;
            $this->emit(['ban']);
        } else return session()->flash('error', 'No such ticket found');
    }

    public function Ban($id)
    {
        if ($card = Ticket::FindById($id)) {
            /*Begin::If ticket is not Banned*/
            if (!$card->trashed()) {
                $card->update(['visibility' => 0]);
                $card->delete();
                session()->flash('success', 'Banned Successfully');
                return redirect(route('AdminTickets'));
            } else return session()->flash('error', 'Ticket is banned');
            /*End::If ticket is not Banned*/
        } else return session()->flash('error', 'No such ticket found');
    }

    public function Unban($id)
    {
        if ($card = Ticket::FindById($id)) {
            /*Begin::If ticket is not Banned*/
            if ($card->trashed()) {
                $card->update(['visibility' => 1]);
                $card->restore();
                session()->flash('success', 'Activated Successfully');
                return redirect(route('AdminTickets'));
            } else return session()->flash('error', 'Ticket is not banned');
            /*End::If ticket is not Banned*/
        } else return session()->flash('error', 'No such ticket found');
    }
}
