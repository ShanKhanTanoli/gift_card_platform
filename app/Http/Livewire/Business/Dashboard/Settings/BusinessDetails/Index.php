<?php

namespace App\Http\Livewire\Business\Dashboard\Settings\BusinessDetails;

use App\Helpers\Business\Business;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $business_name, $business_email, $business_phone, $business_address, $currency_id;

    public function mount()
    {
        if ($details = Business::Details(Auth::user()->id)) {
            $this->business_name = $details->business_name;
            $this->business_email = $details->business_email;
            $this->business_phone = $details->business_phone;
            $this->business_address = $details->business_address;
            $this->currency_id = $details->currency_id;
        } else {
            $this->business_name = "Home";
            $this->business_email = "Company Email";
            $this->business_phone = "00000000000";
            $this->business_address = "Company Address";
        }
    }

    public function render()
    {
        return view('livewire.business.dashboard.settings.business-details.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Update()
    {
        $msg = [
            'business_name.required' => 'Enter Company Name',
        ];

        $validated = $this->validate([
            'business_name' => 'required|string',
            'business_email' => 'required|email',
            'business_phone' => 'required|numeric',
            'business_address' => 'required|string',
            'currency_id' => 'required|numeric',
        ], $msg);

        if ($details = Business::Details(Auth::user()->id)) {
            $details->update($validated);
            session()->flash('success', 'Updated Successfully');
            return redirect(route('BusinessEditDetails'));
        } else {
            Setting::create(array_merge($validated, ['user_id' => Auth::user()->id]));
            return session()->flash('success', 'Updated Successfully');
        }
    }
}
