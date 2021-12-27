<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class ShowSingleIdea extends Component
{

    public Idea $idea;

    public function render()
    {
        return view('livewire.show-single-idea');
    }
}