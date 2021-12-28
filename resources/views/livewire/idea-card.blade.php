 <div class="flex gap-6 p-6 mb-6 bg-gray-800 shadow-lg rounded-xl">
     <div class="text-center">
         <div class="flex flex-col items-center justify-center px-8 py-4 bg-gray-900 rounded-lg shadow-md">
             <p class="text-2xl font-bold text-gray-400">{{ $idea->votes->count() }}</p>
             <p class="text-sm font-medium text-gray-300">Votes</p>
         </div>
         <div x-data="{ alert: false }" class="relative mt-4">
             <button wire:click='vote' @click="@js(!Auth::check()) ? alert = true : alert = false"
                 class="px-4 py-1 font-semibold tracking-wide text-white bg-blue-900 rounded-md shadow-md">
                 @if ($idea->votes->contains('user_id', Auth::id()))
                     Unvote
                 @else
                     Vote
                 @endif
             </button>
             <div x-show="alert" @click.away="alert = false" x-cloak
                 class="absolute w-40 py-1 origin-top-right bg-red-500 rounded-md shadow-md left-16 top-6 focus:outline-none">
                 <div class="px-2 py-1 text-sm text-gray-100">
                     Please <a href="/login" class="font-medium text-white">login</a> to vote
                 </div>
             </div>
         </div>
     </div>
     <div>
         <a href={{ route('ideas.show', $idea->slug) }}
             class="text-xl text-gray-300 hover:underline">{{ $idea->title }}</a>
         <p class="mt-2 text-gray-400">
             {{ $idea->content }}
         </p>
         <div class='flex gap-8 mt-4'>
             <a href="#"
                 class="font-medium text-gray-300 transition-colors duration-100 hover:text-gray-200">{{ $idea->user->username }}</a>
             <p class="font-medium text-gray-300">{{ $idea->created_at->diffForHumans() }}</p>
             {{-- Add Comment --}}
             <div x-data="{ toggleCommentBox: @entangle('toggleCommentBox') }" class="relative flex-grow">
                 <div x-on:click="toggleCommentBox = true" class="flex flex-grow gap-1 cursor-pointer">
                     <i class="text-gray-300">
                         <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                         </svg>
                     </i>
                     <span class="font-medium text-gray-300 select-none">Comment</span>
                 </div>
                 <div x-show="toggleCommentBox" @keydown.escape="toggleCommentBox = false"
                     @click.away="toggleCommentBox = false" x-cloak
                     class="absolute w-full px-4 py-4 mt-2 overflow-hidden origin-top-left bg-gray-900 rounded-md shadow-lg focus:outline-none">
                     <div>
                         <textarea wire:model.defer='newComment' rows="5" name="newComment" id="newComment"
                             placeholder="Write your comment!"
                             class="w-full px-4 py-4 text-sm bg-gray-300 rounded-md resize-none focus:outline-none "></textarea>
                         @error('newComment') <p class="mt-1 text-sm text-red-500"> {{ $message }} </p> @enderror
                     </div>
                     <button wire:click='addComment'
                         class="w-full px-4 py-1 font-semibold tracking-wide text-white bg-blue-900 rounded-md shadow-md">Post</button>
                 </div>
             </div>
         </div>
     </div>
 </div>
