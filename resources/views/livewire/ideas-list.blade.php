<div>
    <div class="flex flex-wrap items-center justify-between w-full gap-4">
        <div class="relative flex items-center flex-grow overflow-hidden bg-gray-700 rounded-lg h-15">
            <input wire:model.lazy='keywords' type="text" wire:keydown.enter="search"
                class="relative self-center flex-grow px-3 py-2 text-xl bg-gray-700 outline-none "
                placeholder="Search ..." />
            <div>
                <span wire:click='search' class="flex items-center px-5 text-gray-500 bg-gray-700 cursor-pointer">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </i>
                </span>
            </div>
        </div>
        <div x-data="{ open: @entangle('toggleSortMenu') }" class="relative">
            <div x-on:click="open = true"
                class="relative flex items-center overflow-hidden text-gray-500 bg-gray-700 rounded-lg cursor-pointer h-15">
                <input type="text"
                    class="relative self-center flex-grow px-3 py-2 text-xl bg-gray-700 outline-none cursor-pointer"
                    value="Sort By" disabled />
                <div>
                    <span class="flex items-center px-5 text-gray-500 bg-gray-700 cursor-pointer">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </i>
                    </span>
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
