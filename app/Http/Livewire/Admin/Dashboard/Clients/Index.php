<?php

namespace App\Http\Livewire\Admin\Dashboard\Clients;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Client\Client;

class Index extends Component
{
    public $delete;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $clients = Client::LatestPaginate(10);
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

    public function DeleteConfirmation($id)
    {
        if ($business = User::find($id)) {
            $this->delete = $business;
            $this->emit(['delete']);
        } else return session()->flash('error', 'Something went wrong');
    }

    public function Delete($id)
    {
        if ($client = User::find($id)) {
            $client->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('AdminClients'));
        }
        return session()->flash('error', 'Something went wrong');
    }
}
