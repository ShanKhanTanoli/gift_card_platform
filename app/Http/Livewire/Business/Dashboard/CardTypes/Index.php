<?php

namespace App\Http\Livewire\Business\Dashboard\CardTypes;

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
        $types = Business::CardTypesLatestPaginate(Auth::user()->id, 6);
        return view('livewire.business.dashboard.card-types.index')
            ->with(['types' => $types])
            ->extends('layouts.dashboard')
            ->section('content');
    }


    public function Edit($id)
    {
        if ($type = Business::FindCardType(Auth::user()->id, $id)) {
            return redirect(route('BusinessEditCardType', $type->slug));
        } else return session()->flash('error', 'No such card type found');
    }

    public function Delete($id)
    {
        if ($type = Business::FindCardType(Auth::user()->id, $id)) {
            $type->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('BusinessCardTypes'));
        } else return session()->flash('error', 'No such card type found');
    }
}
