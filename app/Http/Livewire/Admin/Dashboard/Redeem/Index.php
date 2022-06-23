<?php

namespace App\Http\Livewire\Admin\Dashboard\Redeem;

use Livewire\Component;
use FrittenKeeZ\Vouchers\Models\Voucher;

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
        return view('livewire.admin.dashboard.redeem.index')
            ->extends('layouts.dashboard');
    }

    public function Redeem()
    {
        $validated = $this->validate([
            'code' => 'required|string',
        ]);

        if ($card = Voucher::withTrashed()->where('code', $validated['code'])->first()) {

            /*Begin::If Ticket*/
            if ($card->type == 'ticket') {
                return redirect()->route('AdminViewTicket', $card->slug);
            }
            /*Begin::If Ticket*/

            /*Begin::If Voucher*/
            if ($card->type == 'voucher') {
                return redirect()->route('AdminViewVoucher', $card->slug);
            }
            /*Begin::If Voucher*/

            /*Begin::If Card*/
            if ($card->type == 'card') {
                return redirect()->route('AdminViewCard', $card->slug);
            }
            /*Begin::If Card*/
        } else session()->flash('error', 'Not found');
    }
}
