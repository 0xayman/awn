<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Profile extends Component
{

    public $user;

    public function mount(User $user)
    {
        if ($user) {
            $this->user = $user;
        } else {
            $this->user = auth()->user();
        }
    }

    public function render()
    {
        return view('livewire.profile', [
            'ideas' => $this->user->ideas,
        ]);
    }
}
