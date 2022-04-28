<?php

namespace App\Http\Livewire\Admin\Dashboard\Business;

use App\Helpers\Business\Business;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $business = Business::LatestPaginate(6);
        return view('livewire.admin.dashboard.business.index')
            ->with(['business' => $business])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Edit($id)
    {
        if ($business = User::find($id)) {
            return redirect(route('AdminEditBusiness', $business->slug));
        }
        return session()->flash('error', 'Something went wrong');
    }

    public function Delete($id)
    {
        if ($business = User::find($id)) {

            $business->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('AdminBusiness'));
        }
        return session()->flash('error', 'Something went wrong');
    }
}
