<?php

namespace App\Http\Livewire\Admin\Dashboard\Settings\Currencies;

use Livewire\Component;
use App\Models\Currency;
use Illuminate\Support\Str;

class Index extends Component
{
    public $name, $description;

    public function render()
    {
        return view('livewire.admin.dashboard.settings.currencies.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Add()
    {
        $msg = [
            'name.required' => 'Enter currency name',
            'name.unique' => 'Currency already exists',
        ];

        $validated = $this->validate([
            'name' => 'required|string|unique:currencies,name',
            'description' => 'required|string',
        ], $msg);

        Currency::create(array_merge($validated, ['slug' => Str::random(10)]));
        session()->flash('success', 'Added Successfully');
        return redirect(route('AdminCurrency'));
    }

    public function Delete($id)
    {
        $currency = Currency::find($id);
        if ($currency) {
            $currency->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('AdminCurrency'));
        } else {
            session()->flash('error', 'Something went wrong');
            return redirect(route('AdminCurrency'));
        }
    }

    public function Edit($id)
    {
        if ($currency = Currency::Find($id)) {
            return redirect(route('AdminEditCurrency', $currency->slug));
        } else return session()->flash('error', 'Something went wrong');
    }
}
