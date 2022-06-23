<?php

namespace App\Http\Livewire\Admin\Dashboard\Vouchers;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Voucher\Voucher;

class Index extends Component
{
    public $archive, $ban;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $cards = Voucher::LatestPaginate(10);
        return view('livewire.admin.dashboard.vouchers.index')
            ->with(['cards' => $cards])
            ->extends('layouts.dashboard')
            ->section('content');
    }


    public function Edit($slug)
    {
        return redirect(route('AdminEditVoucher', $slug));
    }

    public function ArchiveConfirmation($slug)
    {
        if ($card = Voucher::FindBySlug($slug)) {
            $this->archive = $card;
            $this->emit(['archive']);
        } else return session()->flash('error', 'No such voucher found');
    }

    public function Archive($id)
    {
        if ($card = Voucher::FindById($id)) {
            /*Begin::If voucher is not Banned*/
            if (!$card->trashed()) {
                $card->update(['visibility' => 0]);
                session()->flash('success', 'Archived Successfully');
                return redirect(route('AdminVouchers'));
            } else return session()->flash('error', 'Voucher is banned');
            /*End::If voucher is not Banned*/
        } else return session()->flash('error', 'No such voucher found');
    }

    public function Publish($id)
    {
        if ($card = Voucher::FindById($id)) {
            /*Begin::If voucher is not Banned*/
            if (!$card->trashed()) {
                $card->update(['visibility' => 1]);
                session()->flash('success', 'Published Successfully');
                return redirect(route('AdminVouchers'));
            } else return session()->flash('error', 'Voucher is banned');
            /*End::If voucher is not Banned*/
        } else return session()->flash('error', 'No such voucher found');
    }

    public function BanConfirmation($slug)
    {
        if ($card = Voucher::FindBySlug($slug)) {
            $this->ban = $card;
            $this->emit(['ban']);
        } else return session()->flash('error', 'No such voucher found');
    }

    public function Ban($id)
    {
        if ($card = Voucher::FindById($id)) {
            /*Begin::If voucher is not Banned*/
            if (!$card->trashed()) {
                $card->update(['visibility' => 0]);
                $card->delete();
                session()->flash('success', 'Banned Successfully');
                return redirect(route('AdminVouchers'));
            } else return session()->flash('error', 'Voucher is banned');
            /*End::If voucher is not Banned*/
        } else return session()->flash('error', 'No such voucher found');
    }

    public function Unban($id)
    {
        if ($card = Voucher::FindById($id)) {
            /*Begin::If voucher is not Banned*/
            if ($card->trashed()) {
                $card->update(['visibility' => 1]);
                $card->restore();
                session()->flash('success', 'Activated Successfully');
                return redirect(route('AdminVouchers'));
            } else return session()->flash('error', 'voucher is not banned');
            /*End::If voucher is not Banned*/
        } else return session()->flash('error', 'No such voucher found');
    }


}
