<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Notifications\UserCommentedNotification;
use App\Notifications\UserRepliedToCommentNotification;
use Livewire\Component;

class CommentForm extends Component
{
    public Idea $idea;
    public $parentComment;
    public $comment = '';

    public function addComment()
    {
        if (!auth()->check()) {
            return;
        }

        $this->idea->comments()->create([
            'user_id' => auth()->id(),
            'body' => $this->comment,
            'parent_id' => $this->parentComment ? $this->parentComment->id : null,
        ]);


        if ($this->parentComment) {
            // notify the parent comment author
            $this->parentComment->user->notify(new UserRepliedToCommentNotification($this->idea, auth()->user()));
        } else {
            // notify the idea author
            $this->idea->user->notify(new UserCommentedNotification($this->idea, auth()->user()));
        }

        $this->comment = '';
        $this->emit('comment-added');
    }

    public function render()
    {
        return view('livewire.comment-form');
    }
}
