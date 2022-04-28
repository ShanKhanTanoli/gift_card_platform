<?php

namespace App\Http\Livewire\Admin\Dashboard\Cards;

use Livewire\Component;
use App\Helpers\Card\Card;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $cards = Card::LatestPaginate(6);
        return view('livewire.admin.dashboard.cards.index')
            ->with(['cards' => $cards])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function View($id)
    {
        if ($card = Card::Find($id)) {
            return redirect(route('AdminViewCard', $card->code));
        } else return session()->flash('error', 'No such card found');
    }


    public function Edit($id)
    {
        if ($card = Card::Find($id)) {
            return redirect(route('AdminEditCard', $card->code));
        } else return session()->flash('error', 'No such card found');
    }

    public function Delete($id)
    {
        if ($card = Card::Find($id)) {
            $card->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('AdminCards'));
        } else return session()->flash('error', 'No such card found');
    }
}
