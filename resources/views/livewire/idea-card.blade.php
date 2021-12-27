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
         <div class='flex flex-wrap gap-8 mt-4'>
             <a href="#"
                 class="font-medium text-gray-300 transition-colors duration-100 hover:text-gray-200">{{ $idea->user->username }}</a>
             <p class="font-medium text-gray-300">{{ $idea->created_at->diffForHumans() }}</p>
         </div>
     </div>
 </div>
