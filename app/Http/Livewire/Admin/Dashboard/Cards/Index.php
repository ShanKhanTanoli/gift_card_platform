<?php

namespace App\Http\Livewire\Admin\Dashboard\Cards;

use Livewire\Component;
use App\Helpers\Card\Card;
use FrittenKeeZ\Vouchers\Models\Voucher;
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

    public function View($unique_id)
    {
        return redirect(route('AdminViewCard', $unique_id));
    }


    public function Edit($unique_id)
    {
        if ($card = Card::Find($unique_id)) {
            return redirect(route('AdminEditCard', $card->unique_id));
        } else return session()->flash('error', 'No such card found');
    }

    public function Delete($unique_id)
    {
        if ($card = Card::Find($unique_id)) {
            Voucher::where('unique_id', $card->unique_id)->delete();
            $card->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('AdminCards'));
        } else return session()->flash('error', 'No such card found');
    }
}
