<?php

namespace App\Http\Livewire\Admin\Dashboard\Clients;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Client\Client;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $clients = Client::all()->latest()->paginate(6);
        return view('livewire.admin.dashboard.clients.index')
            ->with(['clients' => $clients])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Edit($id)
    {
        if ($client = User::find($id)) {
            return redirect(route('AdminEditClient', $client->slug));
        }
        return session()->flash('error', 'Something went wrong');
    }

    public function Delete($id)
    {
        if ($client = User::find($id)) {
            $client->delete();
            return session()->flash('success', 'Deleted Successfully');
        }
        return session()->flash('error', 'Something went wrong');
    }
}
