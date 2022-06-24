<?php

namespace App\Http\Livewire\Admin\Dashboard\Vouchers\View;

use Livewire\Component;
use App\Helpers\Card\Card;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use App\Helpers\SoldVoucher\SoldVoucher;
use Illuminate\Support\Facades\Auth;
use FrittenKeeZ\Vouchers\Facades\Vouchers;
use FrittenKeeZ\Vouchers\Exceptions\VoucherNotFoundException;
use FrittenKeeZ\Vouchers\Exceptions\VoucherAlreadyRedeemedException;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $card, $balance, $description;

    public $redeem_quantity = 3;
    public $recharge_quantity = 3;


    public function mount($slug)
    {
        //Begin::If this Voucher is available
        if ($card = SoldVoucher::FindBySlug($slug)) {

            $this->card = $card;
            $this->balance = $card->balance;

        } else {
            session()->flash('error', 'No such voucher found');
            return redirect(route('AdminRedeemCard'));
        }
        //End::If this Voucher is available
    }

    public function render()
    {
        $redeeming = SoldVoucher::Redeem($this->card->id)
            ->latest()
            ->take($this->redeem_quantity)
            ->get();

        return view('livewire.admin.dashboard.vouchers.view.index')
            ->with(['redeeming' => $redeeming])
            ->extends('layouts.dashboard');
    }


    public function LoadMoreRedeemingHistory()
    {
        return $this->redeem_quantity += 3;
    }

    public function Redeem()
    {
        $validated = $this->validate([
            'balance' => 'required|numeric',
            'description' => 'required|string',
        ]);

        try {

            //Begin::If voucher has Zero Balance
            if ($this->card->balance != 0) {

                //Begin::If voucher has Enough Balance
                if ($this->card->balance >= $validated['balance']) {

                    Vouchers::redeem($this->card->code, $validated['balance'], $validated['description'], Business::Currency(Auth::user()->id), Auth::user(), ['redeem' => 'success']);

                    $this->card->update([
                        'balance' => 0,
                    ]);

                    session()->flash('success', 'Voucher has been redeemed successfully');
                    return redirect(route('AdminViewVoucher', $this->card->slug));
                } else {
                    session()->flash('error', "Voucher has not enough balance");
                    return redirect(route('AdminViewVoucher', $this->card->slug));
                }
                //End::If voucher has Enough Balance

            } else {
                session()->flash('error', "Voucher has zero balance");
                return redirect(route('AdminViewVoucher', $this->card->slug));
            }
            //End::If voucher has Zero Balance

            //End::If this voucher is available
        } catch (VoucherNotFoundException $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('AdminViewVoucher', $this->card->slug));
        } catch (VoucherAlreadyRedeemedException $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('AdminViewVoucher', $this->card->slug));
        }
        //End::If this voucher is available

        //End::If this card is not expired
    }

    public function Ban()
    {
        $this->card->delete();
        session()->flash('success', 'Banned Successfully');
        return redirect()->route('AdminViewVoucher', $this->card->slug);
    }

    public function Unban()
    {
        $this->card->restore();
        session()->flash('success', 'Unban Successfully');
        return redirect()->route('AdminViewVoucher', $this->card->slug);
    }
}
