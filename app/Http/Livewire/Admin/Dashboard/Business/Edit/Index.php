<?php

namespace App\Http\Livewire\Admin\Dashboard\Business\Edit;

use Exception;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $user;

    public $name,$user_name,$email,$number;

    public function mount($slug)
    {
        $this->user = User::where('slug', $slug)
            ->first();
        if ($this->user) {
            $this->name = $this->user->name;
            $this->user_name = $this->user->user_name;
            $this->email = $this->user->email;
            $this->number = $this->user->number;
        } else {
            session()->flash('error', 'Account does not exist');
            return redirect(route('AdminBusiness'));
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard.business.edit.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Update()
    {
        $validated = $this->validate([
            'name' => 'required|string|min:3',
            'user_name' => 'required|string|unique:users,user_name,' . $this->user->id,
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'number' => 'required|numeric|unique:users,number,' . $this->user->id,
        ]);
        try {
            $this->user->update($validated);
            session()->flash('success', 'Updated Successfully');
            return redirect(route('AdminEditBusiness', $this->user->slug));
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
