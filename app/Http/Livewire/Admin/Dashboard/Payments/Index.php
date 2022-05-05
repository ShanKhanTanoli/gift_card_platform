<?php

namespace App\Http\Livewire\Admin\Dashboard\Payments;

use Livewire\Component;
use App\Helpers\Card\Card;
use Livewire\WithPagination;
use App\Helpers\Payments\Payments;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $payments = Payments::LatestPaginate(10);
        return view('livewire.admin.dashboard.payments.index')
            ->with(['payments' => $payments])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function ViewCard($voucher_id)
    {
        if ($card = Card::FindById($voucher_id)) {
            return redirect(route('AdminViewCard', $card->code));
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('AdminPayments'));
        }
    }
}
