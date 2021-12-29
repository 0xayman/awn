<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasList extends Component
{

    use WithPagination;

    protected $listeners = ['idea-added' => '$refresh', 'filterIdeas'];

    public $sortBy = 'created_at';
    public $toggleSortMenu = false;
    public $query = '';
    public $tag = '';

    protected $queryString = [
        'query' => ['except' => ''],
        'page' => ['except' => 1],
        'sortBy' => ['except' => 'created_at'],
        'tag' => ['except' => '']
    ];

    public function filterIdeas($tag)
    {
        $this->tag = $tag['name'];
        $this->setPage(1);
    }

    public function sortIdeas($sort_by)
    {
        $this->sortBy = $sort_by;
        $this->setPage(1);
        $this->toggleSortMenu = false;
    }

    public function search()
    {
        $this->setPage(1);
    }

    public function render()
    {
        if ($this->sortBy == 'votes') {
            $ideas = Idea::search($this->query)->withCount('votes')->whereHas('tags', function ($query) {
                if ($this->tag != '') {
                    $query->where('tags.name', $this->tag);
                }
            })->orderBy('votes_count', 'desc')->paginate(Idea::PER_PAGE);
        } else {
            $ideas = Idea::search($this->query)->whereHas('tags', function ($query) {
                if ($this->tag != '') {
                    $query->where('tags.name', $this->tag);
                }
            })->orderBy($this->sortBy, 'desc')->paginate(Idea::PER_PAGE);
        }
        return view('livewire.ideas-list', [
            'ideas' => $ideas,
        ]);
    }
}
