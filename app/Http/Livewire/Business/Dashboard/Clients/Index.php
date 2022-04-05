<?php

namespace App\Http\Livewire\Business\Dashboard\Clients;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $clients = Business::clients(Auth::user()->id)->latest()->paginate(6);
        return view('livewire.business.dashboard.clients.index')
            ->with(['clients' => $clients])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Edit($id)
    {
        if ($user = User::find($id)) {
            if ($client = Business::FindClient(Auth::user()->id, $user->id)) {
                return redirect(route('BusinessEditClient', $client->slug));
            }
            return session()->flash('error', 'No such client found');
        }
        return session()->flash('error', 'No such client found');
    }

    public function Delete($id)
    {
        if ($user = User::find($id)) {
            if ($client = Business::FindClient(Auth::user()->id, $user->id)) {
                $client->delete();
                return session()->flash('success', 'Deleted Successfully');
            }
            return session()->flash('error', 'No such client found');
        }
        return session()->flash('error', 'No such client found');
    }
}
