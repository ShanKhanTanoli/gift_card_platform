<?php

namespace App\Http\Livewire\Admin\Dashboard\Cards;

use Livewire\Component;
use App\Helpers\Card\Card;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $archive, $ban;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $cards = Card::LatestPaginate(10);
        return view('livewire.admin.dashboard.cards.index')
            ->with(['cards' => $cards])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Edit($slug)
    {
        return redirect(route('AdminEditCard', $slug));
    }

    public function ArchiveConfirmation($slug)
    {
        if ($card = Card::FindBySlug($slug)) {
            $this->archive = $card;
            $this->emit(['archive']);
        } else return session()->flash('error', 'No such card found');
    }

    public function Archive($id)
    {
        if ($card = Card::FindById($id)) {
            /*Begin::If card is not Banned*/
            if (!$card->trashed()) {
                $card->update(['visibility' => 0]);
                session()->flash('success', 'Archived Successfully');
                return redirect(route('AdminCards'));
            } else return session()->flash('error', 'Card is banned');
            /*End::If card is not Banned*/
        } else return session()->flash('error', 'No such card found');
    }

    public function Publish($id)
    {
        if ($card = Card::FindById($id)) {
            /*Begin::If card is not Banned*/
            if (!$card->trashed()) {
                $card->update(['visibility' => 1]);
                session()->flash('success', 'Published Successfully');
                return redirect(route('AdminCards'));
            } else return session()->flash('error', 'Card is banned');
            /*End::If card is not Banned*/
        } else return session()->flash('error', 'No such card found');
    }

    public function BanConfirmation($slug)
    {
        if ($card = Card::FindBySlug($slug)) {
            $this->ban = $card;
            $this->emit(['ban']);
        } else return session()->flash('error', 'No such card found');
    }

    public function Ban($id)
    {
        if ($card = Card::FindById($id)) {
            /*Begin::If card is not Banned*/
            if (!$card->trashed()) {
                $card->update(['visibility' => 0]);
                $card->delete();
                session()->flash('success', 'Banned Successfully');
                return redirect(route('AdminCards'));
            } else return session()->flash('error', 'Card is banned');
            /*End::If card is not Banned*/
        } else return session()->flash('error', 'No such card found');
    }

    public function Unban($id)
    {
        if ($card = Card::FindById($id)) {
            /*Begin::If card is not Banned*/
            if ($card->trashed()) {
                $card->update(['visibility' => 1]);
                $card->restore();
                session()->flash('success', 'Activated Successfully');
                return redirect(route('AdminCards'));
            } else return session()->flash('error', 'Card is not banned');
            /*End::If card is not Banned*/
        } else return session()->flash('error', 'No such card found');
    }
}
