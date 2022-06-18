<?php

namespace App\Http\Livewire\Admin\Dashboard\Vouchers;

use Livewire\Component;
use App\Helpers\Voucher\Voucher;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $delete;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $cards = Voucher::LatestPaginate(10);
        return view('livewire.admin.dashboard.vouchers.index')
            ->with(['cards' => $cards])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function View($slug)
    {
        return redirect(route('AdminViewSlug', $slug));
    }


    public function Edit($code)
    {
        if ($card = Voucher::FindBySlug($code)) {
            return redirect(route('AdminEditVoucher', $card->code));
        } else return session()->flash('error', 'No such voucher found');
    }

    public function DeleteConfirmation($code)
    {
        if ($card = Voucher::FindBySlug($code)) {
            $this->delete = $card;
            $this->emit(['delete']);
        } else return session()->flash('error', 'No such voucher found');
    }

    public function Delete($id)
    {
        if ($card = Voucher::FindById($id)) {
            $card->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('AdminVouchers'));
        } else return session()->flash('error', 'No such voucher found');
    }
}
