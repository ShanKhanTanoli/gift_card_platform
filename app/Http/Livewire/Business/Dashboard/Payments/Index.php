<?php

namespace App\Http\Livewire\Business\Dashboard\Payments;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use FrittenKeeZ\Vouchers\Models\Voucher;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $cards = Business::CardsLatestPaginate(Auth::user()->id, 10);
        return view('livewire.business.dashboard.payments.index')
            ->with(['cards' => $cards])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function View($unique_id)
    {
        return redirect(route('BusinessViewCard', $unique_id));
    }


    public function Edit($unique_id)
    {
        return redirect(route('BusinessEditCard', $unique_id));
    }

    public function Delete($unique_id)
    {
        if ($card = Business::FindCard(Auth::user()->id, $unique_id)) {
            Voucher::where('unique_id', $card->unique_id)->delete();
            $card->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('BusinessCards'));
        } else return session()->flash('error', 'No such card found');
    }
}
