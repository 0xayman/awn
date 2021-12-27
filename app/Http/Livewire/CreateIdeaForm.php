<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Tag;
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

        $idea = Idea::create([
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => $user->id,
        ]);

        foreach ($this->tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $idea->tags()->attach($tag);
        }

        $this->emit('idea-added');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.create-idea-form');
    }
}
