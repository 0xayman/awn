 <div class="flex gap-6 p-6 mb-6 bg-gray-800 shadow-lg rounded-xl">
     <form wire:submit.prevent='addIdea' class="w-full">
         <div class="mt-3">
             <label for="title" class="block mb-2 font-semibold text-gray-300 text-md">Title</label>
             <input wire:model.lazy='title' type="text" name="title" id="title" placeholder="What is your Idea?"
                 class="w-full px-4 py-2 bg-gray-300 rounded-lg focus:outline-none" />
             @error('title') <p class="mt-1 text-sm text-red-500"> {{ $message }} </p> @enderror
         </div>

         <div x-data="{tags: @entangle('tags'), newTag: '' }">
             <template x-for="tag in tags">
                 <input type="hidden" :value="tag" name="tags">
             </template>

             <div class="mt-3">
                 <label for="tags" class="block mb-2 font-semibold text-gray-300 text-md">Tags</label>
                 <input class="w-full px-4 py-2 bg-gray-300 rounded-lg focus:outline-none" placeholder="Add tag..."
                     @keydown.space.prevent="if (newTag.trim() !== '') tags.push(newTag.trim()); newTag = ''"
                     @keydown.backspace="if (newTag.trim() === '') tags.pop()" x-model="newTag">
                 @error('tags') <p class="mt-1 text-sm text-red-500"> {{ $message }} </p> @enderror
                 <div class="flex flex-wrap mt-1">
                     <template x-for="tag in tags" :key="tag">
                         <span @click="tags.splice(tags.indexOf(tag), 1)"
                             class="px-2 m-1 text-sm font-bold leading-loose bg-gray-200 rounded-full cursor-pointer hover:bg-red-300"
                             x-text="tag"></span>
                         {{-- <span class="tags-input-tag">
                             <span x-text="tag"></span>
                             <button type="button" class="tags-input-remove" @click="tags = tags.filter(i => i !== tag)">
                                 &times;
                             </button>
                         </span> --}}
                     </template>
                 </div>
             </div>
         </div>

         <div class="mt-3">
             <label for="content" class="block mb-2 font-semibold text-gray-300 text-md">Content</label>
             <textarea wire:model.lazy='content' rows="5" name="content" id="content" placeholder="Describe your Idea"
                 class="w-full px-4 py-2 bg-gray-300 rounded-lg resize-none focus:outline-none "></textarea>
             @error('content') <p class="mt-1 text-sm text-red-500"> {{ $message }} </p> @enderror
         </div>

         <div class="mt-2">
             <button type="submit"
                 class="w-full px-4 py-1 font-semibold tracking-wide text-white bg-blue-900 rounded-md shadow-md">Add
                 Idea</button>
         </div>
     </form>
 </div>
