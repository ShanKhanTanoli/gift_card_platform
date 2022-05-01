<?php

namespace App\Http\Livewire\Client\Dashboard\Cards\View;

use App\Helpers\Card\Card;
use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Client\Client;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $card;

    public function mount($code)
    {
        //Begin::If this Client owns a Card
        if ($card = Client::FindCard(Auth::user()->id, $code)) {
            $this->card = $card;
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('ClientCards'));
        }
        //End::If this Client owns a card
    }

    public function render()
    {
        $recharge = Card::LatestRechargePaginate($this->card->id, 6);
        return view('livewire.client.dashboard.cards.view.index')
            ->with(['recharge' => $recharge])
            ->extends('layouts.dashboard');
    }
}
