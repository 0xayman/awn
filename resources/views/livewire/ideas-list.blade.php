<div>
    <div class="flex flex-wrap items-center w-full">
        <div x-data="{ open: @entangle('toggleSortMenu') }" class="relative">
            <div x-on:click="open = true"
                class="relative flex flex-wrap items-center w-full overflow-hidden text-gray-500 bg-gray-300 rounded cursor-pointer h-15">
                <input type="text" class="relative self-center px-3 py-2 text-xl outline-none cursor-pointer"
                    value="Sort By" disabled />
                <div>
                    <span class="flex items-center px-5 text-gray-500 bg-gray-300 cursor-pointer">
                        <i>&#x25BC;</i>
                    </span>
                </div>
            </div>
            <div x-show="open" @click.away="open = false" x-cloak x-data="{ options: 
                            [
                                { name: 'Latest', value: 'created_at' },
                                { name: 'Highest Votes', value: 'votes' },
                            ]
                        }"
                class="absolute right-0 w-full mt-1 overflow-hidden origin-top-left bg-gray-300 rounded shadow-lg focus:outline-none">
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
