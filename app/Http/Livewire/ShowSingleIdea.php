<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class ShowSingleIdea extends Component
{

    public Idea $idea;

    public $newComment = '';

    protected $listeners = ['comment-added' => '$refresh'];

    public function addReply($comment_id)
    {
        if (!auth()->check()) {
            return;
        }

        $this->idea->comments()->create([
            'user_id' => auth()->id(),
            'body' => $this->newComment,
            'parent_id' => $comment_id,
        ]);

        $this->newComment = '';
        $this->emit('comment-added');
    }

    public function render()
    {
        return view('livewire.show-single-idea');
    }
}
