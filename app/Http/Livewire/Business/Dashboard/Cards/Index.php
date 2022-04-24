<?php

namespace App\Http\Livewire\Business\Dashboard\Cards;

use App\Models\User;
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
        $cards = Business::CardsLatestPaginate(Auth::user(), 6);
        return view('livewire.business.dashboard.cards.index')
            ->with(['cards' => $cards])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Edit($id)
    {
        if ($card = Business::FindCard(Auth::user(), $id)) {
            dd($card);
            return redirect(route('BusinessEditCard', $card->slug));
        } else return session()->flash('error', 'No such card found');
    }

    public function Delete($id)
    {
        if ($card = Business::FindCard(Auth::user(), $id)) {
            $card->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('BusinessCards'));
        } else return session()->flash('error', 'No such card found');
    }
}
