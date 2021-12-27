<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasList extends Component
{

    use WithPagination;

    protected $listeners = ['idea-added' => '$refresh'];

    public $sortBy = 'created_at';
    public $toggleSortMenu = false;
    public $keywords = '';

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
            $ideas = Idea::search($this->keywords)->withCount('votes')->orderBy('votes_count', 'desc')->paginate(Idea::PER_PAGE);
        } else {
            $ideas = Idea::search($this->keywords)->orderBy($this->sortBy, 'desc')->paginate(Idea::PER_PAGE);
        }
        return view('livewire.ideas-list', [
            'ideas' => $ideas,
        ]);
    }
}
