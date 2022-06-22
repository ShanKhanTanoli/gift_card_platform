<?php

namespace App\Http\Livewire\Business\Dashboard\Vouchers;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $archive;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $cards = Business::VouchersLatestPaginate(Auth::user()->id, 10);
        return view('livewire.business.dashboard.vouchers.index')
            ->with(['cards' => $cards])
            ->extends('layouts.dashboard')
            ->section('content');
    }


    public function Edit($slug)
    {
        return redirect(route('BusinessEditVoucher', $slug));
    }

    public function ArchiveConfirmation($slug)
    {
        if ($card = Business::FindVoucherBySlug(Auth::user()->id, $slug)) {
            $this->archive = $card;
            $this->emit(['archive']);
        } else return session()->flash('error', 'No such voucher found');
    }

    public function Archive($id)
    {
        if ($card = Business::FindVoucherById(Auth::user()->id, $id)) {
            /*Begin::If voucher is not Banned*/
            if (!$card->trashed()) {
                $card->update(['visibility' => 0]);
                session()->flash('success', 'Archived Successfully');
                return redirect(route('BusinessVouchers'));
            } else return session()->flash('error', 'Voucher is banned');
            /*End::If voucher is not Banned*/
        } else return session()->flash('error', 'No such voucher found');
    }

    public function Publish($id)
    {
        if ($card = Business::FindVoucherById(Auth::user()->id, $id)) {
            /*Begin::If voucher is not Banned*/
            if (!$card->trashed()) {
                $card->update(['visibility' => 1]);
                session()->flash('success', 'Published Successfully');
                return redirect(route('BusinessVouchers'));
            } else return session()->flash('error', 'Voucher is banned');
            /*End::If voucher is not Banned*/
        } else return session()->flash('error', 'No such voucher found');
    }
}
