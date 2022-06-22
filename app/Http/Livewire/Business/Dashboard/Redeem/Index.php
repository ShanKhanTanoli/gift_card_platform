<?php

namespace App\Http\Livewire\Business\Dashboard\Redeem;

use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $code;

    public $pin;

    public function mount()
    {
        //Forget Session
        Session()->forget('validate_pin');
    }

    public function render()
    {
        return view('livewire.business.dashboard.redeem.index')
            ->extends('layouts.dashboard');
    }

    public function Redeem()
    {
        $validated = $this->validate([
            'code' => 'required|string',
        ]);

        if ($card = Business::FindAnyCardByCode(Auth::user()->id, $validated['code'])) {

            /*Begin::If Ticket*/
            if ($card->type == 'ticket') {
                return redirect()->route('BusinessViewTicket', $card->slug);
            }
            /*Begin::If Ticket*/

            /*Begin::If Voucher*/
            if ($card->type == 'voucher') {
                return redirect()->route('BusinessViewVoucher', $card->slug);
            }
            /*Begin::If Voucher*/

            /*Begin::If Card*/
            if ($card->type == 'card') {
                return redirect()->route('BusinessViewCard', $card->slug);
            }
            /*Begin::If Card*/
        } else session()->flash('error', 'Not found');
    }
}
