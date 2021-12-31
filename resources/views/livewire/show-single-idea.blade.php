<div class="grid items-start w-2/3 grid-cols-6 gap-6 mx-auto mt-24">
    <div class="col-span-6 md:col-span-4">
        <livewire:idea-card :idea="$idea" />
        <div class="mt-6">
            <h3 class="text-2xl text-gray-400">Comments</h3>
            <div class="mb-8">
                @foreach ($comments as $comment)
                    <div x-data="{toggleReplies: false}" x-on:replied="toggleReplies = true" :key="$comment->id">
                        <div class="flex items-start gap-4 mt-5">
                            <div class="flex-shrink-0">
                                <img src="https://ui-avatars.com/api/?name={{ $comment->user->username }}"
                                    alt="{{ $comment->user->username }}"
                                    class="rounded-full shadow-inner shadow-slate-500 w-14 h-14" />
                            </div>
                            <div class="flex-grow px-6 py-4 bg-gray-800 rounded-md">
                                <div class="flex justify-between">
                                    <div class="text-lg font-medium text-gray-300">{{ $comment->user->username }}
                                    </div>
                                    <div class="font-medium text-gray-300">{{ $comment->created_at->diffForHumans() }}
                                    </div>
                                </div>
                                <p class="mt-2 text-gray-400">
                                    {{ $comment->body }}
                                </p>
                                <div class="flex mt-4">
                                    <div x-data="{ toggleCommentForm: false, alert: false }"
                                        class="relative flex flex-grow">
                                        <div class="relative flex justify-between flex-grow">
                                            <div x-on:click="
                                            @js(!Auth::check()) ? alert = true : toggleCommentForm = true"
                                                class="flex gap-1 cursor-pointer">
                                                <i class="text-gray-300">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                                                    </svg>
                                                </i>
                                                <span class="font-medium text-gray-300 select-none">Reply</span>
                                            </div>
                                            @if ($comment->replies->count() > 0)
                                                <div>
                                                    <span x-on:click="toggleReplies = true"
                                                        class="font-medium text-gray-300 cursor-pointer select-none">Show
                                                        replies</span>
                                                </div>
                                            @endif
                                            <div x-show="alert" @click.away="alert = false" x-cloak
                                                class="absolute w-40 py-1 origin-bottom-left bg-red-500 rounded-md shadow-md top-7 focus:outline-none">
                                                <div class="px-2 py-1 text-sm text-gray-100">
                                                    Please <a href="/login" class="font-medium text-white">login</a> to
                                                    reply
                                                </div>
                                            </div>
                                        </div>
                                        <div x-show="toggleCommentForm" @keydown.escape="toggleCommentForm = false"
                                            @click.away="toggleCommentForm = false" x-cloak
                                            x-on:replied="toggleCommentForm = false"
                                            class="absolute z-20 w-full px-4 py-4 mt-2 overflow-hidden origin-bottom-left bg-gray-900 rounded-md shadow-lg top-4 focus:outline-none">
                                            <livewire:comment-form :idea="$idea" :parentComment="$comment"
                                                :key="$comment->id">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div x-show="toggleReplies" @click.away="toggleReplies = false" x-cloak>
                            @foreach ($comment->replies->reverse() as $reply)
                                <div class="flex items-start gap-4 mt-5 ml-20">
                                    <div class="flex-shrink-0">
                                        <img src="https://ui-avatars.com/api/?name={{ $reply->user->username }}"
                                            alt="{{ $reply->user->username }}"
                                            class="rounded-full shadow-inner shadow-slate-500 w-14 h-14" />
                                    </div>
                                    <div class="flex-grow px-6 py-4 bg-gray-800 rounded-md">
                                        <div class="flex justify-between">
                                            <div class="text-lg font-medium text-gray-300">
                                                {{ $reply->user->username }}
                                            </div>
                                            <div class="font-medium text-gray-300">
                                                {{ $reply->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                        <p class="mt-2 text-gray-400">
                                            {{ $reply->body }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                <div class="mt-4"> {{ $comments->links() }} </div>
            </div>
        </div>
    </div>
    <div class="col-span-6 md:col-span-2">
        <div class="flex flex-col items-center p-6 bg-gray-800 shadow-lg rounded-xl">
            <img src="https://ui-avatars.com/api/?name={{ $idea->user->username }}"
                alt="{{ $idea->user->username }}" class="w-24 h-24 rounded-full" />
            <a href="{{ route('profiles.show', $idea->user->slug) }}"
                class="my-3 text-xl font-medium text-gray-300 transition-colors duration-100 hover:text-gray-200">{{ $idea->user->username }}</a>
            <p class="text-gray-400">
                {{ $idea->user->bio ?? 'No Bio' }}
            </p>
            <div x-data="{ alert: false }" class="relative flex flex-wrap justify-center w-full">
                <button x-on:click="@js(!Auth::check()) ? alert = true : alert = false" wire:click='follow'
                    class="w-2/3 px-4 py-2 mt-4 font-semibold tracking-wide text-white bg-blue-900 rounded-md shadow-md ">
                    @if (Auth::check() && $idea->user->followers->contains(Auth::user()))
                        Unfollow
                    @else
                        Follow
                    @endif
                </button>
                <div x-show="alert" @click.away="alert = false" x-cloak
                    class="absolute w-40 py-1 origin-bottom-left bg-red-500 rounded-md shadow-md top-12 focus:outline-none">
                    <div class="px-2 py-1 text-sm text-gray-100">
                        Please <a href="/login" class="font-medium text-white">login</a> to follow this user
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
