<?php

namespace App\Http\Livewire\Admin\Dashboard\Vouchers\Sold;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Voucher\Voucher;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $cards = Voucher::LatestPaginate(6);
        return view('livewire.admin.dashboard.vouchers.sold.index')
            ->with(['cards' => $cards])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function View($code)
    {
        return redirect(route('AdminViewVoucher', $code));
    }
}
