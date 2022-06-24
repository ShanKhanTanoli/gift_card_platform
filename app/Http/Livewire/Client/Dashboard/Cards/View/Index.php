<?php

namespace App\Http\Livewire\Client\Dashboard\Cards\View;

use App\Models\User;
use Livewire\Component;
use App\Helpers\Card\Card;
use Livewire\WithPagination;
use App\Helpers\Client\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $card , $activate, $pin, $pin_confirmation, $old_pin, $email, $password;

    public function mount($slug)
    {
        //Begin::If this Client owns a Card
        if ($card = Client::FindCardBySlug(Auth::user()->id, $slug)) {
            $this->card = $card;
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('ClientCards'));
        }
        //End::If this Client owns a card
    }

    public function render()
    {
        $recharge = Card::LatestRechargePaginate($this->card->id, 6);
        return view('livewire.client.dashboard.cards.view.index')
            ->with(['recharge' => $recharge])
            ->extends('layouts.dashboard');
    }

    public function Pin()
    {
        $validated = $this->validate([
            'pin' => 'required|numeric',
        ]);

        if (Hash::check($validated['pin'], $this->card->pin)) {
            Session()->put('validate_pin', true);
            return redirect()->route('ClientViewCard', $this->card->slug);
        } else return session()->flash('error', 'Please enter the correct pin code');
    }

    public function RemovePin()
    {
        $validated = $this->validate([
            'pin' => 'required|numeric',
            'password' => 'required|string',
        ]);

        if (Hash::check($validated['pin'], $this->card->pin) && Hash::check($validated['password'], Auth::user()->password)) {
            $this->card->update(['pin' => null]);
            session()->flash('success', 'Pin removed successfully');
            return redirect()->route('ClientViewCard', $this->card->slug);
        } else return session()->flash('error', 'Please check your pin or password');
    }

    public function AddPin()
    {
        $validated = $this->validate([
            'pin' => 'required|numeric|confirmed',
            'pin_confirmation' => 'required|numeric',
            'password' => 'required|string',
        ]);

        if (Hash::check($validated['password'], Auth::user()->password)) {

            $this->card->update(['pin' => Hash::make($validated['pin'])]);
            Session()->put('validate_pin', true);
            session()->flash('success', 'Pin added successfully');
            return redirect()->route('ClientViewCard', $this->card->slug);
        } else return session()->flash('error', 'Please check your password');
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
                'password' => 'required|string',
            ]);

            if (Hash::check($validated['password'], Auth::user()->password)) {

                $this->card->update(['pin' => Hash::make($validated['pin'])]);
                Session()->put('validate_pin', true);
                session()->flash('success', 'Pin changed successfully');
                return redirect()->route('ClientViewCard', $this->card->slug);
            } else return session()->flash('error', 'Please check your password');
        } else return session()->flash('error', 'Please enter the correct pin code');
    }

    public function ForgotPin()
    {
        $validated = $this->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if ($user) {

            if (Client::FindCardBySlug($user->id, $this->card->slug)) {

                if ($validated['email'] == $user->email && Hash::check($validated['password'], $user->password)) {
                    $this->card->update(['pin' => null]);
                    session()->flash('success', 'Pin removed successfully');
                    return redirect()->route('ClientViewCard', $this->card->slug);
                } else return session()->flash('error', 'Please check your email or password');
            } else return session()->flash('error', 'Please check your email or password');
        } else return session()->flash('error', 'Please check your email or password');
    }
}
