<?php

namespace App\Http\Livewire\Admin\Dashboard\Cards;

use Livewire\Component;
use App\Helpers\Card\Card;
use FrittenKeeZ\Vouchers\Models\Voucher;
use Livewire\WithPagination;

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

    public function Delete($code)
    {
        if ($card = Card::Find($code)) {
            Voucher::where('code', $card->code)->delete();
            $card->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('AdminCards'));
        } else return session()->flash('error', 'No such card found');
    }
}
