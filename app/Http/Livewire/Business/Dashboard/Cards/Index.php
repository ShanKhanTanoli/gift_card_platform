<?php

namespace App\Http\Livewire\Business\Dashboard\Cards;

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
        $cards = Business::CardsLatestPaginate(Auth::user()->id, 10);
        return view('livewire.business.dashboard.cards.index')
            ->with(['cards' => $cards])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Edit($slug)
    {
        return redirect(route('BusinessEditCard', $slug));
    }

    public function ArchiveConfirmation($slug)
    {
        if ($card = Business::FindCardBySlug(Auth::user()->id, $slug)) {
            $this->archive = $card;
            $this->emit(['archive']);
        } else return session()->flash('error', 'No such card found');
    }

    public function Archive($id)
    {
        if ($card = Business::FindCardById(Auth::user()->id, $id)) {
            /*Begin::If card is not Banned*/
            if (!$card->trashed()) {
                $card->update(['visibility' => 0]);
                session()->flash('success', 'Archived Successfully');
                return redirect(route('BusinessCards'));
            } else return session()->flash('error', 'Card is banned');
            /*End::If card is not Banned*/
        } else return session()->flash('error', 'No such card found');
    }

    public function Publish($id)
    {
        if ($card = Business::FindCardById(Auth::user()->id, $id)) {
            /*Begin::If card is not Banned*/
            if (!$card->trashed()) {
                $card->update(['visibility' => 1]);
                session()->flash('success', 'Published Successfully');
                return redirect(route('BusinessCards'));
            } else return session()->flash('error', 'Card is banned');
            /*End::If card is not Banned*/
        } else return session()->flash('error', 'No such card found');
    }
}
