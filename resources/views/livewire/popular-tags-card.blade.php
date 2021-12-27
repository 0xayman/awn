<div class="p-6 bg-gray-800 shadow-lg rounded-xl">
    <h1 class="text-2xl font-semibold text-gray-300">Popular Topics</h1>
    <div class='flex flex-wrap mt-4'>
        @foreach ($tags as $tag)
            <span wire:click='filterIdeas({{ $tag->id }})'
                class="px-2 m-1 text-sm font-bold leading-loose bg-gray-200 rounded-full cursor-pointer hover:bg-gray-300">{{ $tag->name }}</span>
        @endforeach
    </div>
</div>
