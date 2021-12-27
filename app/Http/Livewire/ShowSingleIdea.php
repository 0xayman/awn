<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class ShowSingleIdea extends Component
{

    public Idea $idea;

    public function vote()
    {
        // check if user has already voted
        $userVote = $this->idea->user_votes()->where('user_id', auth()->id())->first();

        if ($userVote) {
            $userVote->delete();
            $this->idea->votes -= 1;
            $this->idea->save();
        } else {
            $this->idea->user_votes()->create([
                'user_id' => auth()->id(),
            ]);
            $this->idea->votes += 1;
            $this->idea->save();
        }
    }

    public function render()
    {
        return view('livewire.show-single-idea');
    }
}
