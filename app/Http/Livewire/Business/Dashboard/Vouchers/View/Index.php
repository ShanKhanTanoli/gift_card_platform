<?php

namespace App\Http\Livewire\Business\Dashboard\Vouchers\View;

use Livewire\Component;
use App\Helpers\Card\Card;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $card, $balance, $description;

    public $redeem_quantity = 3;
    public $recharge_quantity = 3;

    public function mount($slug)
    {
        //Begin::If this Business owns a Voucher
        if ($card = Business::FindAnyCardBySlug(Auth::user()->id, $slug)) {
            $this->card = $card;
        } else {
            session()->flash('error', 'No such voucher found');
            return redirect(route('BusinessRedeem'));
        }
        //End::If this Business owns a Voucher
    }

    public function render()
    {
        $redeeming = Card::Redeem($this->card->id)
            ->latest()
            ->take($this->redeem_quantity)
            ->get();

        return view('livewire.business.dashboard.vouchers.view.index')
            ->with(['redeeming' => $redeeming])
            ->extends('layouts.dashboard');
    }


    public function LoadMoreRedeemingHistory()
    {
        return $this->redeem_quantity += 3;
    }
}
