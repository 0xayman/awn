<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        return view('livewire.profile', [
            'ideas' => auth()->user()->ideas,
        ]);
    }
}
