<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navbar extends Component
{

    public function logout()
    {
        auth()->logout();
        $this->redirect('/');
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
