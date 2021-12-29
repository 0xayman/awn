<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Notifications\UserVoteNotification;
use Livewire\Component;

class IdeaCard extends Component
{

    public Idea $idea;

    protected $listeners = [
        'user-voted' => '$refresh',
    ];

    public function vote()
    {
        if (!auth()->check() || auth()->id() == $this->idea->user->id) {
            return;
        }

        $userVote = $this->idea->votes()->where('user_id', auth()->id())->first();

        if ($userVote) {
            $userVote->delete();
        } else {
            $this->idea->votes()->create([
                'user_id' => auth()->id(),
            ]);

            $this->idea->user->notify(new UserVoteNotification($this->idea, auth()->user()));
            // channelName: private.App.Models.{User}.{user_id}

        }

        $this->emit('user-voted');
    }

    public function render()
    {
        return view('livewire.idea-card');
    }
}
