<div>
    <div>
        <textarea wire:model.defer='comment' rows="5" name="comment" id="comment" placeholder="Write your comment!"
            class="w-full px-4 py-4 text-sm bg-gray-300 rounded-md resize-none focus:outline-none "></textarea>
        @error('comment') <p class="mt-1 text-sm text-red-500"> {{ $message }} </p> @enderror
    </div>
    <button wire:click='addComment'
        class="w-full px-4 py-1 font-semibold tracking-wide text-white bg-blue-900 rounded-md shadow-md">Post</button>
</div>
