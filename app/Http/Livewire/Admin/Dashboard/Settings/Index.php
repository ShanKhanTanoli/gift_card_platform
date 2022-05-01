<?php

namespace App\Http\Livewire\Admin\Dashboard\Settings;

use App\Models\Setting;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $settings;
    public $company_name, $company_email, $company_phone, $company_address, $currency_id;

    public function mount()
    {
        if ($settings = Admin::Settings()) {
            $this->settings = $settings;
            $this->company_name = $settings->company_name;
            $this->company_email = $settings->company_email;
            $this->company_phone = $settings->company_phone;
            $this->company_address = $settings->company_address;
            $this->currency_id = $settings->currency_id;
            $this->comission_percentage = $settings->comission_percentage;
        } else {
            $this->company_name = "Home";
            $this->company_email = "Company Email";
            $this->company_phone = "00000000000";
            $this->company_address = "Company Address";
            $this->comission_percentage = "1";
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard.settings.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Update()
    {
        $msg = [
            'company_name.required' => 'Enter Company Name',
        ];

        $validated = $this->validate([
            'company_name' => 'required|string',
            'company_email' => 'required|email',
            'company_phone' => 'required|numeric',
            'company_address' => 'required|string',
            'comission_percentage' => 'required|numeric',
            'currency_id' => 'required|numeric',
        ], $msg);

        if ($settings = Admin::Settings()) {
            $settings->update($validated);
            session()->flash('success', 'Updated Successfully');
            return redirect(route('AdminSettings'));
        } else {
            Setting::create($validated);
            return session()->flash('success', 'Updated Successfully');
        }
    }
}
