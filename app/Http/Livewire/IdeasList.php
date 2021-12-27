<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasList extends Component
{

    use WithPagination;

    public function render()
    {
        return view('livewire.ideas-list', [
            'ideas' => Idea::latest()->paginate(5)
        ]);
    }
}
