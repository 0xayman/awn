<?php

namespace App\Http\Livewire;

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
        return view('livewire.show-single-idea');
    }
}
