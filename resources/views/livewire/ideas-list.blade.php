<div>
    @foreach ($ideas as $idea)
        <livewire:idea-card :idea="$idea" :key="$idea->id" />
    @endforeach

    <div class="mb-6">{{ $ideas->links() }}</div>
</div>
