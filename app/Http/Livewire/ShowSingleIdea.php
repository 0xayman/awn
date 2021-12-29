<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowSingleIdea extends Component
{

    public Idea $idea;

    public $newComment = '';

    public $toggleCommentForm = false;

    protected $listeners = ['comment-added' => '$refresh', 'follow' => '$refresh'];

    public function follow(User $user)
    {

        if (!auth()->check()) {
            return;
        }

        $me = User::where('id', auth()->id())->first();
        if ($me->isFollowing($user)) {
            $me->unFollow($user);
        } else {
            $me->follow($user);
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
