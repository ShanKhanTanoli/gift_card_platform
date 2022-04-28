<?php

namespace App\Http\Livewire\Business\Dashboard\CardCategories;

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
        $categories = Business::CardCategoriesLatestPaginate(Auth::user()->id, 6);
        return view('livewire.business.dashboard.card-categories.index')
            ->with(['categories' => $categories])
            ->extends('layouts.dashboard')
            ->section('content');
    }


    public function Edit($id)
    {
        if ($category = Business::FindCardCategory(Auth::user()->id, $id)) {
            return redirect(route('BusinessEditCardCategory', $category->slug));
        } else return session()->flash('error', 'No such card category found');
    }

    public function Delete($id)
    {
        if ($category = Business::FindCardCategory(Auth::user()->id, $id)) {
            $category->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('BusinessCardCategories'));
        } else return session()->flash('error', 'No such card category found');
    }
}
