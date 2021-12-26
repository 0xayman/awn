<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required',
    ];

    protected $messages = [
        'email.exists' => 'User not found.',
    ];

    public function updatedEmail()
    {
        $this->validateOnly('email');
    }

    public function login()
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();
        if (!$user) {
            $this->addError('email', 'User not found.');
            return;
        }

        if (!Hash::check($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect.');
            return;
        }

        auth()->login($user);

        $this->redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
