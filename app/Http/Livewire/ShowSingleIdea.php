<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Idea;
use App\Models\User;
use App\Notifications\UserFollowNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowSingleIdea extends Component
{

    public Idea $idea;

    public $newComment = '';

    public $toggleCommentForm = false;

    protected $listeners = ['comment-added' => '$refresh', 'follow' => '$refresh'];

    public function follow()
    {

        if (!auth()->check()) {
            return;
        }

        $authUser = User::find(Auth::id());

        if ($authUser->isFollowing($this->idea->user)) {
            $authUser->unFollow($this->idea->user);
        } else {
            $authUser->follow($this->idea->user);

            $this->idea->user->notify(new UserFollowNotification($authUser));
        }
        $this->emit('follow');
    }

    public function render()
    {
        return view('livewire.show-single-idea', [
            'comments' => $this->idea->comments()->latest()->paginate(5, ['*'], 'cp'),
        ]);
    }
}
