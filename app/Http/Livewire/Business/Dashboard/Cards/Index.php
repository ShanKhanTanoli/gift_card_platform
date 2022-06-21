<?php

namespace App\Http\Livewire\Business\Dashboard\Cards;

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

    public function DeleteConfirmation($slug)
    {
        if ($card = Business::FindCardBySlug(Auth::user()->id, $slug)) {
            $this->delete = $card;
            $this->emit(['delete']);
        } else return session()->flash('error', 'No such card found');
    }

    public function Delete($id)
    {
        if ($card = Business::FindCardById(Auth::user()->id, $id)) {
            $card->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('BusinessCards'));
        } else return session()->flash('error', 'No such card found');
    }
}
