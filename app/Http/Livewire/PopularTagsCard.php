<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class PopularTagsCard extends Component
{

    public $tags;

    public function mount()
    {
        $this->tags = Tag::take(10)->get();
    }

    public function filterIdeas(Tag $id)
    {
        dd($id);
    }

    public function render()
    {
        return view('livewire.popular-tags-card');
    }
}
