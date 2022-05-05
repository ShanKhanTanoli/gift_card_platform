<?php

namespace App\Http\Livewire\Admin\Dashboard\Cards;

use Livewire\Component;
use App\Helpers\Card\Card;
use FrittenKeeZ\Vouchers\Models\Voucher;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $delete;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $cards = Card::LatestPaginate(10);
        return view('livewire.admin.dashboard.cards.index')
            ->with(['cards' => $cards])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function View($code)
    {
        return redirect(route('AdminViewCard', $code));
    }


    public function Edit($code)
    {
        if ($card = Card::Find($code)) {
            return redirect(route('AdminEditCard', $card->code));
        } else return session()->flash('error', 'No such card found');
    }

    public function DeleteConfirmation($code)
    {
        if ($card = Card::Find($code)) {
            $this->delete = $card;
            $this->emit(['delete']);
        } else return session()->flash('error', 'No such card found');
    }

    public function Delete($id)
    {
        if ($card = Card::FindById($id)) {
            $card->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('AdminCards'));
        } else return session()->flash('error', 'No such card found');
    }
}
