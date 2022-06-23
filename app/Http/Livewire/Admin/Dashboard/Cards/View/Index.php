<?php

namespace App\Http\Livewire\Admin\Dashboard\Cards\View;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use App\Helpers\Client\Client;
use App\Helpers\SoldCard\SoldCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use FrittenKeeZ\Vouchers\Facades\Vouchers;
use FrittenKeeZ\Vouchers\Models\VoucherRecharge;
use FrittenKeeZ\Vouchers\Exceptions\VoucherNotFoundException;
use FrittenKeeZ\Vouchers\Exceptions\VoucherAlreadyRedeemedException;

class Index extends Component
{
    use WithPagination;

    public $pin, $pin_confirmation, $old_pin, $email;

    protected $paginationTheme = 'bootstrap';

    public $card, $balance, $description;

    public $redeem_quantity = 3;
    public $recharge_quantity = 3;

    public function mount($slug)
    {
        //Begin::If this card is available
        if ($card = SoldCard::FindBySlug($slug)) {
            $this->card = $card;
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('AdminCards'));
        }
        //End::If this card is available
    }

    public function render()
    {
        $recharge = SoldCard::Recharge($this->card->id)
            ->latest()
            ->take($this->recharge_quantity)
            ->get();
        $redeeming = SoldCard::Redeem($this->card->id)
            ->latest()
            ->take($this->redeem_quantity)
            ->get();
        return view('livewire.admin.dashboard.cards.view.index')
            ->with([
                'recharge' => $recharge,
                'redeeming' => $redeeming
            ])->extends('layouts.dashboard');
    }

    public function Recharge()
    {
        $validated = $this->validate([
            'balance' => 'required|numeric',
        ]);

        //Begin::If this card is not expired
        if (!$this->card->isExpired()) {
            $this->card->update([
                'balance' => $this->card->balance + $validated['balance'],
            ]);
            VoucherRecharge::create([
                'stripe_id' => Auth::user()->name . 'And ID' . Auth::user()->id,
                'voucher_id' => $this->card->id,
                'user_id' => Auth::user()->id,
                'amount' => $validated['balance'],
            ]);
            session()->flash('success', 'Card has been recharged successfully');
            return redirect(route('AdminViewCard', $this->card->slug));
        } else {
            session()->flash('error', 'Expired card can not be recharged');
            return redirect(route('AdminViewCard', $this->card->slug));
        }
        //End::If this card is not expired
    }

    public function Redeem()
    {
        $validated = $this->validate([
            'balance' => 'required|numeric',
            'description' => 'required|string',
        ]);

        try {

            //Begin::If Card has Zero Balance
            if ($this->card->balance != 0) {

                //Begin::If Card has Enough Balance
                if ($this->card->balance >= $validated['balance']) {

                    Vouchers::RedeemCard($this->card->code, $validated['balance'], $validated['description'], Business::Currency(Auth::user()->id), Auth::user(), ['redeem' => 'success']);

                    $this->card->update([
                        'balance' => $this->card->balance - $validated['balance'],
                    ]);

                    session()->flash('success', 'Card has been redeemed successfully');
                    return redirect(route('AdminViewCard', $this->card->slug));
                } else {
                    session()->flash('error', "Card has not enough balance");
                    return redirect(route('AdminViewCard', $this->card->slug));
                }
                //End::If Card has Enough Balance

            } else {
                session()->flash('error', "Card has zero balance");
                return redirect(route('AdminViewCard', $this->card->slug));
            }
            //End::If Card has Zero Balance

            //End::If this Business owns a Card
        } catch (VoucherNotFoundException $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('AdminViewCard', $this->card->slug));
        } catch (VoucherAlreadyRedeemedException $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('AdminViewCard', $this->card->slug));
        }
        //End::If this Business owns a card

        //End::If this card is not expired
    }

    public function LoadMoreRechargingHistory()
    {
        return $this->recharge_quantity += 3;
    }

    public function LoadMoreRedeemingHistory()
    {
        return $this->redeem_quantity += 3;
    }

    public function Pin()
    {
        $validated = $this->validate([
            'pin' => 'required|numeric',
        ]);

        if (Hash::check($validated['pin'], $this->card->pin)) {
            Session()->put('validate_pin', true);
            return redirect()->route('AdminViewCard', $this->card->slug);
        } else return session()->flash('error', 'Please enter the correct pin code');
    }

    public function RemovePin()
    {
        $validated = $this->validate([
            'pin' => 'required|numeric',
        ]);

        if (Hash::check($validated['pin'], $this->card->pin)) {
            $this->card->update(['pin' => null]);
            session()->flash('success', 'Pin removed successfully');
            return redirect()->route('AdminViewCard', $this->card->slug);
        } else return session()->flash('error', 'Please enter the correct pin code');
    }

    public function AddPin()
    {
        $validated = $this->validate([
            'pin' => 'required|numeric|confirmed',
            'pin_confirmation' => 'required|numeric',
        ]);

        $this->card->update(['pin' => Hash::make($validated['pin'])]);
        session()->flash('success', 'Pin added successfully');
        return redirect()->route('AdminViewCard', $this->card->slug);
    }

    public function ChangePin()
    {
        $pin = $this->validate([
            'old_pin' => 'required|numeric',
        ]);

        if (Hash::check($pin['old_pin'], $this->card->pin)) {

            $validated = $this->validate([
                'pin' => 'required|numeric|confirmed',
                'pin_confirmation' => 'required|numeric',
            ]);

            $this->card->update(['pin' => Hash::make($validated['pin'])]);
            session()->flash('success', 'Pin changed successfully');
            return redirect()->route('AdminViewCard', $this->card->slug);
        } else return session()->flash('error', 'Please enter the correct pin code');
    }

    public function ForgotPin()
    {
        $validated = $this->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email',$validated['email'])->first();

        if ($user) {

            if(Client::FindCardBySlug($user->id,$this->card->slug)){

                if ($validated['email'] == $user->email) {
                    $this->card->update(['pin' => null]);
                    session()->flash('success', 'Pin removed successfully');
                    return redirect()->route('AdminViewCard', $this->card->slug);
                } else return session()->flash('error', 'Enter the correct email');

            }else return session()->flash('error', 'Enter the correct email');

        } else return session()->flash('error', 'Enter the correct email');
    }
}
