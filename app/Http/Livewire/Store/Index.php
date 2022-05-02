<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use FrittenKeeZ\Vouchers\Models\ClientVoucher;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $business, $store;

    public function mount($store_name)
    {
        if ($store = Business::FindStoreByName($store_name)) {
            $this->store = $store;
            $this->business = $store->user_id;
        } else abort(404);
    }

    public function render()
    {
        $cards = Business::CardsLatestUnsoldPaginate($this->business, 8);
        return view('livewire.store.index')
            ->with(['cards' => $cards])
            ->extends('layouts.store');
    }

    public function BuyNow($code)
    {
        if ($card = Business::FindCard($this->business, $code)) {
            return redirect(route('BuyCard', $card->code));
        } else abort(404);
    }

    //Free Card
    public function GetFree($code)
    {
        if ($card = Business::FindCard($this->business, $code)) {
            ClientVoucher::create([
                'stripe_id' => 'free_card',
                'voucher_id' => $card->id,
                'user_id' => Auth::user()->id,
                'price' => 0,
                'currency' => 'usd',
                'comission_percentage' => 0,
                'final_amount' => 0,
            ]);
            $card->update(['sold' => true]);
            session()->flash('success', 'Paid Successfully');
            return redirect(route('ClientCards'));
        } else abort(404);
    }
}
