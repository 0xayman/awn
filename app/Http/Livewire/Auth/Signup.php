<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Signup extends Component
{

    public $username;
    public $email;
    public $password;
    public $confirmPassword;

    protected $rules = [
        'username' => 'required|min:3|max:20|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|max:20',
        'confirmPassword' => 'same:password',
    ];

    public function updatedUsername()
    {
        $this->validateOnly('username');
    }

    public function updatedEmail()
    {
        $this->validateOnly('email');
    }


    public function signup()
    {
        $this->validate();

        $user = User::create([
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'token' => Str::random(32),
        ]);

        auth()->login($user);

        redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.signup')->extends('layouts.auth');
    }
}
