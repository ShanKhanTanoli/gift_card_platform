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

    public function View($slug)
    {
        return redirect(route('AdminViewCard', $slug));
    }


    public function Edit($slug)
    {
        return redirect(route('AdminEditCard', $slug));
    }

    public function DeleteConfirmation($slug)
    {
        if ($card = Card::FindBySlug($slug)) {
            $this->delete = $card;
            $this->emit(['delete']);
        } else return session()->flash('error', 'No such card found');
    }

    public function Delete($id)
    {
        if ($card = Card::FindById($id)) {
            $card->forceDelete();
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('AdminCards'));
        } else return session()->flash('error', 'No such card found');
    }

    public function Block($slug)
    {
        if ($card = Card::FindBySlug($slug)) {
            $card->delete();
            session()->flash('success', 'Blocked Successfully');
            return redirect(route('AdminCards'));
        } else return session()->flash('error', 'No such card found');
    }

    public function Unblock($slug)
    {
        if ($card = Card::FindBySlug($slug)) {
            $card->restore();
            session()->flash('success', 'Blocked Successfully');
            return redirect(route('AdminCards'));
        } else return session()->flash('error', 'No such card found');
    }
}
