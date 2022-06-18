<?php

namespace App\Http\Livewire\Admin\Dashboard\Vouchers\View;

use Livewire\Component;
use App\Helpers\Voucher\Voucher;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use FrittenKeeZ\Vouchers\Facades\Vouchers;
use FrittenKeeZ\Vouchers\Models\VoucherRecharge;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $card, $business, $balance, $description;

    public $redeem_quantity = 3;
    public $recharge_quantity = 3;

    public function mount($slug)
    {
        //Begin::If Voucher Exists
        if ($card = Voucher::FindBySlug($slug)) {
            $this->card = $card;
            $this->business = Business::Find($this->card->owner_id);
        } else {
            session()->flash('error', 'No such Voucher found');
            return redirect(route('AdminVouchers'));
        }
        //End::If Voucher Exists
    }

    public function render()
    {
        $recharge = Voucher::Recharge($this->card->id)
            ->latest()
            ->take($this->recharge_quantity)
            ->get();
        $redeeming = Voucher::Redeem($this->card->id)
            ->latest()
            ->take($this->redeem_quantity)
            ->get();
        return view('livewire.admin.dashboard.vouchers.view.index')
            ->with([
                'recharge' => $recharge,
                'redeeming' => $redeeming
            ])->extends('layouts.dashboard');
    }

    public function LoadMoreRechargingHistory()
    {
        return $this->recharge_quantity += 3;
    }

    public function LoadMoreRedeemingHistory()
    {
        return $this->redeem_quantity += 3;
    }

    public function Recharge()
    {
        $validated = $this->validate([
            'balance' => 'required|numeric',
        ]);

        //Begin::If this voucher is not expired
        if (!$this->card->isExpired()) {
            $this->card->update([
                'balance' => $this->card->balance + $validated['balance'],
            ]);
            VoucherRecharge::create([
                'stripe_id' => "Admin",
                'voucher_id' => $this->card->id,
                'user_id' => Auth::user()->id,
                'amount' => $validated['balance'],
            ]);
            session()->flash('success', 'voucher has been recharged successfully');
            return redirect(route('AdminViewVoucher', $this->card->code));
        } else {
            session()->flash('error', 'Expired voucher can not be recharged');
            return redirect(route('AdminViewVoucher', $this->card->code));
        }
        //End::If this voucher is not expired
    }

    public function Redeem()
    {
        $validated = $this->validate([
            'balance' => 'required|numeric',
            'description' => 'required|string',
        ]);

        try {

            //Begin::If Voucher has Zero Balance
            if ($this->card->balance != 0) {

                //Begin::If Voucher has Enough Balance
                if ($this->card->balance >= $validated['balance']) {
                    Vouchers::redeem($this->card->code, $validated['balance'], $validated['description'], 'usd', Auth::user(), ['foo' => 'bar']);
                    $this->card->update([
                        'balance' => $this->card->balance - $validated['balance'],
                    ]);
                } else {
                    session()->flash('error', "Voucher has not enough balance");
                    return redirect(route('AdminViewVoucher', $this->card->code));
                }
                //End::If Voucher has Enough Balance

            } else {
                session()->flash('error', "Voucher has zero balance");
                return redirect(route('AdminViewVoucher', $this->card->code));
            }
            //End::If Voucher has Zero Balance

            session()->flash('success', 'Voucher has been redeemed successfully');
            return redirect(route('AdminViewVoucher', $this->card->code));
        } catch (\FrittenKeeZ\Vouchers\Exceptions\VoucherNotFoundException $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('AdminViewVoucher', $this->card->code));
        } catch (\FrittenKeeZ\Vouchers\Exceptions\VoucherAlreadyRedeemedException $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('AdminViewVoucher', $this->card->code));
        }

        //End::If this voucher is not expired
    }
}
