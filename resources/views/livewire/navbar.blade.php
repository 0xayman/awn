<nav class="bg-gray-800">
    <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <!-- Desktop Nav menu -->
            <div class="flex items-stretch justify-start flex-1">
                <div class="flex items-center flex-shrink-0">
                    <img class="block w-auto h-10" src="{{ asset('images/awn-small.png') }}" alt="AWN Logo">
                </div>
            </div>
            @if (Auth::check())
                <?php $user = Auth::user(); ?>
                <div x-data="{ open: false }" class="relative flex justify-end w-1/4 text-white">
                    <svg x-on:click="open = true" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 cursor-pointer"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    @if ($user->unreadNotifications->count() > 0)
                        <div
                            class="absolute flex items-center justify-center w-5 h-5 text-white bg-red-400 rounded-full select-none -right-2 -top-2">
                            <span class="text-sm">
                                {{ $user->unreadNotifications()->count() }}
                            </span>
                        </div>
                    @endif
                    <div x-show="open" @click.away="open = false, $wire.markNotificationsAsRead()" x-cloak
                        class="absolute z-20 px-4 py-2 mt-2 origin-bottom-right bg-gray-700 rounded-md shadow-lg top-5 focus:outline-none">
                        @foreach ($user->unreadNotifications as $notification)
                            @if ($notification->data['type'] == 'vote_notification')
                                <a href="{{ route('ideas.show', $notification->data['idea']['slug']) }}"
                                    class="block px-2 py-2 transition-colors duration-100 rounded cursor-pointer hover:bg-gray-800">
                                    <span class="font-medium"> {{ $notification->data['user']['username'] }}
                                    </span>
                                    Voted
                                    on your idea: <span class="font-medium">
                                        {{ $notification->data['idea']['title'] }}
                                    </span>
                                </a>
                            @elseif ($notification->data['type'] == 'follow_notification')
                                <a href="#profile page}"
                                    class="block px-2 py-2 transition-colors duration-100 rounded cursor-pointer hover:bg-gray-800">
                                    <span class="font-medium">
                                        {{ $notification->data['follower']['username'] }}
                                    </span>
                                    Start following you.
                                </a>
                            @elseif ($notification->data['type'] == 'add_idea_notification')
                                <a href="{{ route('ideas.show', $notification->data['idea']['slug']) }}"
                                    class="block px-2 py-2 transition-colors duration-100 rounded cursor-pointer hover:bg-gray-800">
                                    <span class="font-medium">
                                        {{ $notification->data['user']['username'] }}
                                    </span>
                                    Posted new idea: <span class="font-medium">
                                        {{ $notification->data['idea']['title'] }}
                                    </span>
                                </a>
                            @elseif ($notification->data['type'] == 'comment_notification')
                                <a href="{{ route('ideas.show', $notification->data['idea']['slug']) }}"
                                    class="block px-2 py-2 transition-colors duration-100 rounded cursor-pointer hover:bg-gray-800">
                                    <span class="font-medium"> {{ $notification->data['user']['username'] }}
                                    </span>
                                    Commented
                                    on your idea: <span class="font-medium">
                                        {{ $notification->data['idea']['title'] }}
                                    </span>
                                </a>
                            @elseif ($notification->data['type'] == 'reply_notification')
                                <a href="{{ route('ideas.show', $notification->data['idea']['slug']) }}"
                                    class="block px-2 py-2 transition-colors duration-100 rounded cursor-pointer hover:bg-gray-800">
                                    <span class="font-medium"> {{ $notification->data['user']['username'] }}
                                    </span>
                                    Replied to your comment on
                                    on <span class="font-medium">
                                        {{ $notification->data['idea']['title'] }}
                                    </span>
                                </a>
                            @endif
                        @endforeach
                        @if ($user->unreadNotifications->count() == 0)
                            <div>
                                <p>No New Notifications
                            </div>
                        @endif
                        <div class="mt-3">
                            <a href="{{ route('notifications') }}"
                                class="block w-full px-4 py-1 bg-blue-900 rounded shadow-sm">Show All</a>
                        </div>
                    </div>
                </div>
            @endif
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <!-- Profile dropdown -->
                @if (Auth::check())
                    <div x-data="{ open: false }" class="relative ml-3">
                        <div>
                            <button x-on:click="open = true" type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://ui-avatars.com/api/?name={{ Auth::user()->username }}" alt="">
                            </button>
                        </div>

                        <div x-show="open" @click.away="open = false" x-cloak
                            class="absolute right-0 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <a href="{{ route('profiles.me') }}" class="block px-4 py-2 text-sm text-gray-700"
                                role="menuitem" tabindex="-1" id="user-menu-item-0">Profile</a>
                            <button wire:click="logout" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1" id="user-menu-item-1">Logout</button>
                        </div>
                    </div>
                @else
                    <div class="relative ml-3">
                        <button wire:click="goToLoginPage"
                            class="block px-3 py-2 text-base font-medium text-white rounded-md"
                            aria-current="page">Login
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>
