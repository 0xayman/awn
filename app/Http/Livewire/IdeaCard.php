<?php

namespace App\Http\Livewire;

use Livewire\Component;

class IdeaCard extends Component
{

    public $idea;
    public $toggleCommentBox = false;
    public $newComment = '';

    protected $listeners = ['user-voted' => '$refresh'];

    public function vote()
    {
        if (!auth()->check()) {
            return;
        }

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

    public function addComment()
    {
        if (!auth()->check()) {
            return;
        }

        $this->idea->comments()->create([
            'user_id' => auth()->id(),
            'body' => $this->newComment,
        ]);

        $this->newComment = '';
        $this->emit('comment-added');
    }

    public function addReply()
    {
        if (!auth()->check()) {
            return;
        }

        $this->idea->comments()->create([
            'user_id' => auth()->id(),
            'body' => $this->newComment,
            'parent_id' => $this->newComment,
        ]);

        $this->newComment = '';
    }

    public function render()
    {
        return view('livewire.idea-card');
    }
}
