<div class="grid items-start w-2/3 grid-cols-6 gap-6 mx-auto mt-24">
    <div class="col-span-6 md:col-span-2">
        <div class="flex flex-col items-center p-6 bg-gray-800 shadow-lg rounded-xl">
            <img src="https://ui-avatars.com/api/?name={{ $user->username }}" alt="{{ $user->username }}"
                class="w-24 h-24 rounded-full" />
            <p class="my-3 text-xl font-medium text-gray-300 transition-colors duration-100 hover:text-gray-200">
                {{ $user->username }}</p>
            <p class="text-gray-400">
                Id vel ipsam et quos voluptas eos rem. Qui illo doloribus veritatis voluptatum eum quis.
            </p>
            <div class="flex pt-2 mt-4 border-t-2 border-gray-900 justify-items-center">
                <div class="px-2 text-lg text-gray-300 "> {{ $user->followers()->count() }} Followers </div>
                <div class="px-2 text-lg text-gray-300 "> {{ $user->following()->count() }} Following </div>
            </div>
        </div>
    </div>
    <div class="w-full col-span-6 md:col-span-4">
        @if ($ideas->count() > 0)
            <div>
                @foreach ($ideas as $idea)
                    <livewire:idea-card :idea="$idea" :key="$idea->id" />
                @endforeach
            </div>
        @else
            <div class="text-center">
                <h1 class="text-3xl text-gray-500">No Ideas Yet!</h1>
            </div>
        @endif
    </div>
</div>
