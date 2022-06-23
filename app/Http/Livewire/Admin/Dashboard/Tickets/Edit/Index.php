<?php

namespace App\Http\Livewire\Admin\Dashboard\Tickets\Edit;

use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Helpers\Ticket\Ticket;

class Index extends Component
{
    use WithFileUploads;

    public $card, $type, $name, $background, $text_color, $price, $balance, $expires_at, $visibility;

    public $temporary_image;

    public function mount($slug)
    {
        //Begin::If this ticket is available
        if ($card = Ticket::FindBySlug($slug)) {


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
            session()->flash('error', 'No such tickets found');
            return redirect(route('AdminTickets'));
        } //End::If this ticket is available
    }

    public function render()
    {
        return view('livewire.business.dashboard.tickets.edit.index')
            ->extends('layouts.dashboard');
    }

    public function Update()
    {
        //Begin::If this ticket is available
        if (Ticket::FindBySlug($this->card->slug)) {

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
                return redirect(route('AdminEditTicket', $this->card->slug));
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else {
            session()->flash('error', 'No such tickets found');
            return redirect(route('AdminTickets'));
        }
    }


    public function Customize()
    {
        //Begin::If this ticket is available
        if (Ticket::FindBySlug($this->card->slug)) {

            $validated = $this->validate([
                'text_color' => 'required|string',
                'temporary_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($validated['temporary_image']) {

                $image = time() . '.' . $validated['temporary_image']->getClientOriginalExtension();
                $path = $validated['temporary_image']->storeAs('public/images/cards/backgrounds/', $image);

                $data = [
                    'text_color' => $validated['text_color'],
                    'background' => $path,
                ];
            } else {

                $data = [
                    'text_color' => $validated['text_color'],
                ];
            }

            try {
                $this->card->update($data);
                session()->flash('success', 'Updated Successfully');
                return redirect(route('AdminEditTicket', $this->card->slug));
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else {
            session()->flash('error', 'No such tickets found');
            return redirect(route('AdminTickets'));
        }
    }


    public function RemoveBG()
    {
        //Begin::If this ticket is available
        if (Ticket::FindBySlug($this->card->slug)) {
            try {
                $this->card->update(['background' => null]);
                session()->flash('success', 'Updated Successfully');
                return redirect(route('AdminEditTicket', $this->card->slug));
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else {
            session()->flash('error', 'No such tickets found');
            return redirect(route('AdminTickets'));
        }
    }
}
