<?php

namespace App\Http\Livewire\Business\Dashboard\Cards\Edit;

use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithFileUploads;

    public $card, $type, $name, $background, $text_color, $price, $balance, $expires_at, $visibility;

    public $temporary_image;

    public function mount($slug)
    {
        //Begin::If this Business owns a Card
        if ($card = Business::FindCardBySlug(Auth::user()->id, $slug)) {

            //Begin::If Card is Banned
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
                session()->flash('error', 'This Card is banned');
                return redirect(route('BusinessCards'));
            } //End::If Card is Banned

        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('BusinessCards'));
        } //End::If this Business owns a card
    }

    public function render()
    {
        return view('livewire.business.dashboard.cards.edit.index')
            ->extends('layouts.dashboard');
    }

    public function Update()
    {
        //Begin::If this Business owns a card
        if (Business::FindCardBySlug(Auth::user()->id, $this->card->slug)) {

            //Begin::If Card is Banned
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
                    return redirect(route('BusinessEditCard', $this->card->slug));
                } catch (Exception $e) {
                    return session()->flash('error', $e->getMessage());
                }
            } else {
                session()->flash('error', 'This Card is banned');
                return redirect(route('BusinessCards'));
            } //End::If Card is Banned

        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('BusinessCards'));
        }
    }


    public function Customize()
    {
        //Begin::If this Business owns a card
        if (Business::FindCardBySlug(Auth::user()->id, $this->card->slug)) {
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
                return redirect(route('BusinessEditCard', $this->card->slug));
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('BusinessCards'));
        }
    }
}
