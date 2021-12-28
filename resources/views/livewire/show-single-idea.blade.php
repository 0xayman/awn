<div class="grid items-start w-2/3 grid-cols-6 gap-6 mx-auto mt-24">
    <div class="col-span-6 sm:col-span-4">
        <livewire:idea-card :idea="$idea" />
        <div class="mt-6">
            <h3 class="text-2xl text-gray-400">Comments</h3>
            <div class="flex items-start gap-4 mt-5">
                <div class="flex-shrink-0">
                    <img src="https://ui-avatars.com/api/?name={{ $idea->user->username }}"
                        alt="{{ $idea->user->username }}"
                        class="rounded-full shadow-inner shadow-slate-500 w-14 h-14" />
                </div>
                <div class="flex-grow px-6 py-4 bg-gray-800 rounded-md">
                    <div class="flex justify-between">
                        <div class="text-lg font-medium text-gray-300">{{ $idea->user->username }}</div>
                        <div class="font-medium text-gray-300">{{ $idea->created_at->diffForHumans() }}</div>
                    </div>
                    <p class="mt-2 text-gray-400">
                        Voluptatem perferendis at enim eaque alias eos. Eius error blanditiis ratione aut vel quia.
                        Sequi amet fugit tenetur est aut.
                        Voluptatem perferendis at enim eaque alias eos. Eius error blanditiis ratione aut vel quia.
                        Sequi amet fugit tenetur est aut.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-6 sm:col-span-2">
        <div class="flex flex-col items-center p-6 bg-gray-800 shadow-lg rounded-xl">
            <img src="https://ui-avatars.com/api/?name={{ $idea->user->username }}"
                alt="{{ $idea->user->username }}" class="w-24 h-24 rounded-full" />
            <a href="#"
                class="my-3 text-xl font-medium text-gray-300 transition-colors duration-100 hover:text-gray-200">{{ $idea->user->username }}</a>
            <p class="text-gray-400">
                Id vel ipsam et quos voluptas eos rem. Qui illo doloribus veritatis voluptatum eum quis.
            </p>
            <button
                class="w-2/3 px-4 py-2 mt-4 font-semibold tracking-wide text-white bg-blue-900 rounded-md shadow-md">Follow</button>
        </div>
    </div>
</div>
