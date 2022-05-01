<?php

namespace App\Http\Livewire\Business\Dashboard\Settings\Store;

use Exception;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\BusinessStore;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $store, $store_name, $store_description, $display_cards, $display_store_name;

    public function mount()
    {
        if ($store = Business::Store(Auth::user()->id)) {
            $this->store = $store;
            $this->store_name = $store->store_name;
            $this->store_description = $store->store_description;
            $this->display_cards = $store->display_cards;
            $this->display_store_name = $store->display_store_name;
        } else {
            $this->store_name = "Store Name";
            $this->store_description = "Store Description";
            $this->display_cards = 1;
            $this->display_store_name = 1;
        }
    }

    public function render()
    {
        return view('livewire.business.dashboard.settings.store.index')
            ->extends('layouts.dashboard');
    }

    public function UpdateStore()
    {
        try {
            //If Business has Store
            if ($store = Business::Store(Auth::user()->id)) {

                $validated = $this->validate([
                    'store_name' => 'required|string|unique:business_stores,store_name,' . $this->store->id,
                    'store_description' => 'required|string',
                    'display_cards' => 'required|boolean',
                    'display_store_name' => 'required|boolean',
                ]);

                $store->update($validated);
                session()->flash('success', 'Updated Successfully');
                return redirect(route('BusinessEditStore'));
            } //If Business has not Store
            else {

                $validated = $this->validate([
                    'store_name' => 'required|string|unique:business_stores',
                    'store_description' => 'required|string',
                    'display_cards' => 'required|boolean',
                    'display_store_name' => 'required|boolean',
                ]);

                BusinessStore::create([
                    'user_id' => Auth::user()->id,
                    'store_name' => $validated['store_name'],
                    'store_description' => $validated['store_description'],
                    'slug' => strtoupper(Str::random(20)),
                    'display_cards' =>  $validated['display_cards'],
                    'display_store_name' =>  $validated['display_store_name'],
                ]);
                session()->flash('success', 'Updated Successfully');
                return redirect(route('BusinessEditStore'));
            }
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
