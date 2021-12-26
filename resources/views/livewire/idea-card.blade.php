 <div class="flex gap-6 p-6 mb-6 bg-gray-800 shadow-lg rounded-xl">
     <div class="text-center">
         <div class="flex flex-col items-center justify-center px-8 py-4 bg-gray-900 rounded-lg shadow-md">
             <p class="text-2xl font-bold text-gray-400">{{ $idea->votes }}</p>
             <p class="text-sm font-medium text-gray-300">Votes</p>

         </div>
         <div class="mt-4">
             <button
                 class="px-4 py-1 font-semibold tracking-wide text-white bg-blue-900 rounded-md shadow-md">Vote</button>
         </div>
     </div>
     <div>
         <h1 class="text-xl text-gray-300">{{ $idea->title }}</h1>
         <p class="mt-2 text-gray-400">
             {{ $idea->content }}
         </p>
     </div>
 </div>
