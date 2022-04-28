<?php

namespace App\Http\Livewire\Business\Dashboard\CardCategories\Edit;

use Exception;
use Livewire\Component;
use App\Helpers\Business\Business;
use FrittenKeeZ\Vouchers\Models\VoucherCategory;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $category, $name;

    public function mount($slug)
    {
        if ($find = VoucherCategory::where('slug', $slug)->first()) {
            //Begin::If this Business has a Card Category
            if ($category = Business::FindCardCategory(Auth::user()->id, $find->id)) {
                $this->category = $category;
                $this->name = $category->name;
            } else {
                session()->flash('error', 'No such card category found');
                return redirect(route('BusinessCardCategories'));
            }
            //End::If this Business has a Card Category
        } else {
            session()->flash('error', 'No such card category found');
            return redirect(route('BusinessCardCategories'));
        }
    }

    public function render()
    {
        return view('livewire.business.dashboard.card-categories.edit.index')
            ->extends('layouts.dashboard');
    }

    public function Update()
    {
        //Begin::If this Business card has category
        if (Business::FindCardCategory(Auth::user()->id, $this->category->id)) {
            $validated = $this->validate([
                'name' => 'required|string',
            ]);
            try {
                $this->category->update($validated);
                session()->flash('success', 'Updated Successfully');
                return redirect(route('BusinessEditCardCategory', $this->category->slug));
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else {
            session()->flash('error', 'No such card category found');
            return redirect(route('BusinessCardCategories'));
        }
    }
}
