<?php

namespace App\Http\Livewire\Business\Dashboard\Vouchers\Edit;

use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithFileUploads;

    public $card, $name, $type, $background, $text_color, $price, $balance, $expires_at, $visibility;

    public $temporary_image;

    public function mount($slug)
    {
        //Begin::If this Business owns a Voucher
        if ($card = Business::FindVoucherBySlug(Auth::user()->id, $slug)) {

            //Begin::If Voucher is Banned
            if (!$card->trashed()) {
                $this->card = $card;
                $this->name = $card->name;
                $this->type = $card->type;
                $this->background = $card->background;
                $this->text_color = $card->text_color;
                $this->price = $card->price;
                $this->balance = $card->balance;
                $this->expires_at = date('Y-m-d', strtotime($card->expires_at));
                $this->visibility = $card->visibility;
            } else {
                session()->flash('error', 'This voucher is banned');
                return redirect(route('BusinessVouchers'));
            } //End::If Voucher is Banned

        } else {
            session()->flash('error', 'No such voucher found');
            return redirect(route('BusinessVouchers'));
        } //End::If this Business owns a Voucher
    }

    public function render()
    {
        return view('livewire.business.dashboard.vouchers.edit.index')
            ->extends('layouts.dashboard');
    }

    public function Update()
    {
        //Begin::If this Business owns a voucher
        if (Business::FindVoucherBySlug(Auth::user()->id, $this->card->slug)) {

            //Begin::If Voucher is Banned
            if (!$this->card->trashed()) {

                $validated = $this->validate([
                    'name' => 'required|string',
                    'price' => 'required|numeric',
                    'balance' => 'required|numeric',
                    'expires_at' => 'required|date',
                    'visibility' => 'required|numeric|in:1,0',
                ]);
                try {
                    $this->card->update($validated);
                    session()->flash('success', 'Updated Successfully');
                    return redirect(route('BusinessEditVoucher', $this->card->slug));
                } catch (Exception $e) {
                    return session()->flash('error', $e->getMessage());
                }
            } else {
                session()->flash('error', 'This voucher is banned');
                return redirect(route('BusinessVouchers'));
            } //End::If Voucher is Banned

        } else {
            session()->flash('error', 'No such voucher found');
            return redirect(route('BusinessVouchers'));
        }
    }


    public function Customize()
    {
        //Begin::If this Business owns a voucher
        if (Business::FindVoucherBySlug(Auth::user()->id, $this->card->slug)) {
            $validated = $this->validate([
                'text_color' => 'required|string',
                'temporary_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $this->temporary_image = $validated['temporary_image']->hashName();

            $data = [
                'text_color' => $validated['text_color'],
                'background' => $this->temporary_image,
            ];

            //$this->temporary_image->store('CardBackgrounds');

            $imageName = time() . '.' . $validated['temporary_image']->extension();

            //dd($imageName);

            $image = $validated['temporary_image']->move(public_path('CardBackgrounds'), $imageName);

            dd($image);

            try {
                $this->card->update($data);
                session()->flash('success', 'Updated Successfully');
                return redirect(route('BusinessEditVoucher', $this->card->slug));
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else {
            session()->flash('error', 'No such voucher found');
            return redirect(route('BusinessVouchers'));
        }
    }
}
