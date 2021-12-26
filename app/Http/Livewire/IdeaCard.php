<?php

namespace App\Http\Livewire;

use Livewire\Component;

class IdeaCard extends Component
{

    public $idea;

    public function render()
    {
        return view('livewire.idea-card');
    }
}
