<?php

namespace App\Http\Livewire\Client\Dashboard\Payments;

use App\Helpers\Card\Card;
use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Client\Client;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $payments = Client::LatestPaymentsPaginate(Auth::user()->id, 6);
        return view('livewire.client.dashboard.payments.index')
            ->with(['payments' => $payments])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function ViewCard($voucher_id)
    {
        if ($card = Card::FindById($voucher_id)) {
            return redirect(route('ClientViewCard', $card->code));
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('ClientPayments'));
        }
    }
}
