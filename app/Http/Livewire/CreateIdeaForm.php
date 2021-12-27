<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class CreateIdeaForm extends Component
{

    public $title;
    public $content;
    public $tags = [];

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'tags' => 'required|array|min:1',
    ];

    public function addIdea()
    {
        $this->validate();

        $user = auth()->user();
        dd($user->ideas);
        $idea = Idea::create([
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => $user->id,
        ]);

        $idea->tags()->attach($this->tags);

        $this->resetInput();
    }

    public function render()
    {
        return view('livewire.create-idea-form');
    }
}
