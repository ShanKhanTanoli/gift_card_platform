<?php

namespace App\Http\Livewire\Business\Dashboard\Cards;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use FrittenKeeZ\Vouchers\Models\Voucher;

class Index extends Component
{
    public $delete;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $cards = Business::CardsLatestUnsoldPaginate(Auth::user()->id, 10);
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

    public function DeleteConfirmation($code)
    {
        if ($card = Business::FindCard(Auth::user()->id, $code)) {
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
