<?php

namespace App\Http\Livewire\Business\Dashboard\Clients\Edit;

use Exception;
use App\Models\User;
use Livewire\Component;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $user, $name, $user_name, $number, $email;

    public function mount($slug)
    {
        if ($user = User::where('slug', $slug)->first()) {
            if ($client = Business::FindClient(Auth::user()->id, $user->id)) {

                $this->user = $client;

                $this->name = $client->name;
                $this->user_name = $client->user_name;
                $this->number = $client->number;
                $this->email = $client->email;
            } else {
                session()->flash('error', 'No such client found');
                return redirect(route('BusinessClients'));
            }
        } else {
            session()->flash('error', 'No such client found');
            return redirect(route('BusinessClients'));
        }
    }

    public function render()
    {
        return view('livewire.business.dashboard.clients.edit.index')
            ->extends('layouts.dashboard');
    }

    public function Update()
    {
        $validated = $this->validate([
            'name' => 'required|string|min:3',
            'user_name' => 'required|string|unique:users,user_name,' . $this->user->id,
            'number' => 'required|numeric|unique:users,number,' . $this->user->id,
            'email' => 'required|email|unique:users,email,' . $this->user->id,
        ]);
        try {
            $data = [
                'name' => $validated['name'],
                'user_name' => $validated['user_name'],
                'email' => $validated['email'],
                'number' => $validated['number'],
            ];
            $this->user->update($data);
            session()->flash('success', 'Updated Successfully');
            return redirect(route('BusinessEditClient', $this->user->slug));
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
