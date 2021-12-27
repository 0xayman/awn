<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasList extends Component
{

    use WithPagination;

    protected $listeners = ['idea-added' => '$refresh'];

    public function render()
    {
        return view('livewire.ideas-list', [
            'ideas' => Idea::latest()->paginate(Idea::PER_PAGE),
        ]);
    }
}
