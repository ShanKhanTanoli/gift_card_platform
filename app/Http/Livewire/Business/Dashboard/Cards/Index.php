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
        $cards = Business::CardsLatestUnsoldPaginate(Auth::user()->id, 6);
        return view('livewire.business.dashboard.cards.index')
            ->with(['cards' => $cards])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function View($code)
    {
        return redirect(route('BusinessViewCard', $code));
    }


    public function Edit($code)
    {
        return redirect(route('BusinessEditCard', $code));
    }

    public function Delete($code)
    {
        if ($card = Business::FindCard(Auth::user()->id, $code)) {
            $card->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('BusinessCards'));
        } else return session()->flash('error', 'No such card found');
    }
}
