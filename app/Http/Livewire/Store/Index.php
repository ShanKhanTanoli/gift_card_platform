<?php

namespace App\Http\Livewire\Store;

use DateTime;
use Exception;
use Livewire\Component;
use App\Helpers\Card\Card;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Helpers\Ticket\Ticket;
use App\Helpers\Voucher\Voucher;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use FrittenKeeZ\Vouchers\Facades\Vouchers;
use FrittenKeeZ\Vouchers\Models\ClientVoucher;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $business, $store, $voucher;

    public function mount($store_name)
    {
        if ($store = Business::FindStoreByName($store_name)) {
            $this->store = $store;
            $this->business = $store->user_id;
        } else abort(404);
    }

    public function render()
    {
        $cards = Business::CardsLatestPaginate($this->business, 10);
        $tickets = Business::TicketsLatestPaginate($this->business, 10);
        $vouchers = Business::VouchersLatestPaginate($this->business, 10);
        return view('livewire.store.index')
            ->with([
                'cards' => $cards,
                'tickets' => $tickets,
                'vouchers' => $vouchers,

            ])->extends('layouts.store');
    }

    public function BuyNow($slug)
    {
        if ($card = Business::FindCardBySlug($this->business, $slug)) {
            //If Card can be purchased
            if (Card::CanBePurchased($card->slug)) {
                return redirect(route('BuyCard', $card->slug));
            } else return redirect()->back();
        } else return session()->flash('error', 'Something went wrong');
    }

    //Free Card
    public function GetFree($slug)
    {
        //Begin::If Card
        if ($card = Business::FindCardBySlug($this->business, $slug)) {
            //Begin::Card can be Purchased
            if (Card::CanBePurchased($card->slug)) {
                try {
                    //Card Expiry date
                    $expiry = new DateTime(date('Y-m-d H:i:s', strtotime($card->expires_at)));

                    //Begin::If Card is a Card
                    if ($card->type == "card") {
                        $this->voucher = Vouchers::withType($card->type)
                            ->withCard($card->id)
                            ->withPrice($card->price)
                            ->withBalance($card->balance)
                            ->withOwner($card->user_id)
                            ->withExpireDate($expiry)
                            ->create();
                    } //End::If Card is a Card

                    //If Voucher has a value
                    if ($this->voucher) {
                        //Create Subscription
                        ClientVoucher::create([
                            'stripe_id' => 'free_card',
                            'voucher_id' => $this->voucher->id,
                            'user_id' => Auth::user()->id,
                            'price' => 0,
                            'payment_type' => 'Free',
                            'currency' => 'usd',
                            'comission_percentage' => 0,
                            'final_amount' => 0,
                        ]);

                        //Flash a success message
                        session()->flash('success', 'Paid Successfully');
                        //Begin::If Card is a Card
                        if ($card->type == "card") {
                            return redirect(route('ClientCards'));
                        }
                    } else return session()->flash('error', 'Something went wrong');
                } catch (Exception $e) {
                    return session()->flash('error', $e->getMessage());
                }
            } else return session()->flash('error', 'Something went wrong');
            //End::Card can be Purchased
        }


        //Begin::If Ticket
        if ($card = Business::FindTicketBySlug($this->business, $slug)) {
            //Begin::Ticket can be Purchased
            if (Ticket::CanBePurchased($card->slug)) {
                try {
                    //Card Expiry date
                    $expiry = new DateTime(date('Y-m-d H:i:s', strtotime($card->expires_at)));

                    //Begin::If Card is a Ticket
                    if ($card->type == "ticket") {
                        $this->voucher = Vouchers::withType($card->type)
                            ->withMask(strtolower(Str::random(15)))
                            ->withCard($card->id)
                            ->withPrice($card->price)
                            ->withBalance($card->balance)
                            ->withOwner($card->user_id)
                            ->withExpireDate($expiry)
                            ->withoutSeparator()
                            ->withoutPrefix()
                            ->withoutSuffix()
                            ->create();
                    } //End::If Card is a Ticket


                    //If Voucher has a value
                    if ($this->voucher) {
                        //Create Subscription
                        ClientVoucher::create([
                            'stripe_id' => 'free_card',
                            'voucher_id' => $this->voucher->id,
                            'user_id' => Auth::user()->id,
                            'price' => 0,
                            'payment_type' => 'Free',
                            'currency' => 'usd',
                            'comission_percentage' => 0,
                            'final_amount' => 0,
                        ]);

                        //Flash a success message
                        session()->flash('success', 'Paid Successfully');

                        //Begin::If Card is a Ticket
                        if ($card->type == "ticket") {
                            return redirect(route('ClientTickets'));
                        }
                    } else return session()->flash('error', 'Something went wrong');
                } catch (Exception $e) {
                    return session()->flash('error', $e->getMessage());
                }
            } else return session()->flash('error', 'Something went wrong');
            //End::Ticket can be Purchased
        }


        //Begin::If Voucher
        if ($card = Business::FindVoucherBySlug($this->business, $slug)) {
            //Begin::Card can be Purchased
            if (Voucher::CanBePurchased($card->slug)) {
                try {
                    //Card Expiry date
                    $expiry = new DateTime(date('Y-m-d H:i:s', strtotime($card->expires_at)));

                    //Begin::If Card is a Voucher
                    if ($card->type == "voucher") {
                        $this->voucher = Vouchers::withType($card->type)
                            ->withCharacters('A1B2C3D4E5F6G7H8I9JKLMOP')
                            ->withCard($card->id)
                            ->withPrice($card->price)
                            ->withBalance($card->balance)
                            ->withOwner($card->user_id)
                            ->withExpireDate($expiry)
                            ->create();
                    } //End::If Card is a Voucher

                    //If Voucher has a value
                    if ($this->voucher) {
                        //Create Subscription
                        ClientVoucher::create([
                            'stripe_id' => 'free_card',
                            'voucher_id' => $this->voucher->id,
                            'user_id' => Auth::user()->id,
                            'price' => 0,
                            'payment_type' => 'Free',
                            'currency' => 'usd',
                            'comission_percentage' => 0,
                            'final_amount' => 0,
                        ]);

                        //Flash a success message
                        session()->flash('success', 'Paid Successfully');

                        //Begin::If Card is a Voucher
                        if ($card->type == "voucher") {
                            return redirect(route('ClientVouchers'));
                        }
                    } else return session()->flash('error', 'Something went wrong');
                } catch (Exception $e) {
                    return session()->flash('error', $e->getMessage());
                }
            } else return session()->flash('error', 'Something went wrong');
            //End::Voucher can be Purchased
        }

        return session()->flash('error', 'Something went wrong');
    }
}
