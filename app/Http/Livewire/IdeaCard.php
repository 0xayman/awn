<?php

namespace App\Http\Livewire;

use Livewire\Component;

class IdeaCard extends Component
{

    public $idea;

    protected $listeners = ['user-voted' => '$refresh'];

    public function vote()
    {
        $userVote = $this->idea->votes()->where('user_id', auth()->id())->first();

        if ($userVote) {
            $userVote->delete();
        } else {
            $this->idea->votes()->create([
                'user_id' => auth()->id(),
            ]);
        }

        $this->emit('user-voted');
    }

    public function render()
    {
        return view('livewire.idea-card');
    }
}
