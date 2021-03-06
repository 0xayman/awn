<div>
    <div class="grid items-center w-full grid-cols-2 gap-4">
        <div
            class="relative flex items-center col-span-2 px-3 py-2 overflow-hidden bg-gray-800 rounded-lg md:col-span-1 h-15">
            <input wire:model.defer='query' type="text" wire:keydown.enter="search"
                class="self-center flex-grow text-lg text-gray-500 placeholder-gray-500 bg-gray-800 outline-none"
                placeholder="Search ..." />
            <div wire:click='search'
                class="absolute flex items-center text-gray-500 bg-transparent cursor-pointer right-2 ">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
        <div x-data="{ open: @entangle('toggleSortMenu') }" class="relative col-span-2 md:col-span-1">
            <div x-on:click="open = true"
                class="relative flex items-center px-3 py-2 overflow-hidden text-gray-500 bg-gray-800 rounded-lg cursor-pointer h-15">
                <input type="text"
                    class="self-center flex-grow text-lg text-gray-500 bg-gray-800 outline-none cursor-pointer"
                    value="Sort By" disabled />
                <div>
                    <div class="absolute flex items-center text-gray-500 bg-transparent cursor-pointer right-2 bottom-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
            <div x-show="open" @click.away="open = false" x-cloak x-data="{ options: 
                            [
                                { name: 'Latest', value: 'created_at' },
                                { name: 'Highest Votes', value: 'votes' },
                            ]
                        }"
                class="absolute right-0 w-1/2 mt-1 overflow-hidden origin-top-left bg-gray-300 rounded-lg shadow-lg focus:outline-none">
                <template x-for="option in options">
                    <div x-on:click="$wire.sortIdeas(option.value)" x-text="option.name"
                        class="px-3 py-2 text-lg text-gray-900 cursor-pointer hover:bg-gray-500">
                    </div>
                </template>
            </div>
        </div>
    </div>

    <div class="mt-4">
        @foreach ($ideas as $idea)
            <livewire:idea-card :idea="$idea" :key="$idea->id" />
        @endforeach
    </div>

    <div class="mb-6">{{ $ideas->links() }}</div>
</div>
