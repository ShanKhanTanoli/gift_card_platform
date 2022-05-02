<?php

namespace App\Http\Livewire\Business\Dashboard\StripeConnect;

use Livewire\Component;
use App\Helpers\Stripe\Stripe;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $business_type;
    public $country;
    public $company_name;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $dob;

    public function mount()
    {
        $this->email = Auth::user()->email;
    }

    public function render()
    {
        return view('livewire.business.dashboard.stripe-connect.index')
            ->extends('layouts.dashboard');
    }


    public function Create()
    {
        if ($business = Business::Is(Auth::user()->id)) {

            $business->update(['account_id' => null]);

            //If is Company
            if ($this->business_type == 'company') {
                $this->validate([
                    'business_type' => 'required|in:company',
                    'country' => 'required|string|max:2',
                    'email' => 'required|email|unique:users,email,' . Auth::user()->id,
                    'company_name' => 'required|string',
                ]);
                return Stripe::CreateCompanyAccount($this->country, $this->email, $this->company_name);
            }

            //If is Individual
            if ($this->business_type == 'individual') {
                $this->validate([
                    'business_type' => 'required|in:individual',
                    'country' => 'required|string|max:2',
                    'first_name' => 'required|string',
                    'last_name' => 'required|string',
                    'email' => 'required|email|unique:users,email,' . Auth::user()->id,
                    'phone' => 'required|numeric|unique:users,number,' . Auth::user()->id,
                    'dob' => 'required|date|before:today',
                ]);
                return Stripe::CreateIndividualAccount($this->country, $this->email, $this->first_name, $this->last_name, $this->phone, date('d', strtotime($this->dob)), date('m', strtotime($this->dob)), date('Y', strtotime($this->dob)));
            } else return session()->flash('error', 'Please select your Business Type.');
        } else return session()->flash('error', 'Something went Wrong.');
    }

    public function Complete()
    {
        if ($business = Business::Is(Auth::user()->id)) {
            return Stripe::CreateAccountLink($business->account_id, route('BusinessStripeConnect'), route('BusinessStripeConnect'), 'account_onboarding');
        } else return session()->flash('error', 'Something went Wrong.');
    }

    public function AccountLogin()
    {
        if ($business = Business::Is(Auth::user()->id)) {
            return Stripe::CreateLoginLink($business->account_id);
        } else return session()->flash('error', 'Something went Wrong.');
    }
}
