<?php

namespace App\Http\Livewire\Client\Dashboard\Vouchers\View;

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

    public function mount($slug)
    {
        //Begin::If this Client owns a voucher
        if ($card = Client::FindVoucherBySlug(Auth::user()->id, $slug)) {
            $this->card = $card;
        } else {
            session()->flash('error', 'No such voucher found');
            return redirect(route('ClientVouchers'));
        }
        //End::If this Client owns a voucher
    }

    public function render()
    {
        return view('livewire.client.dashboard.vouchers.view.index')
            ->extends('layouts.dashboard');
    }
}
