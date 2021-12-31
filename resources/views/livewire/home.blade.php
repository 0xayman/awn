<div class="grid items-start w-2/3 grid-cols-6 gap-6 mx-auto mt-24">
    <div class="col-span-6 md:col-span-2">
        @if (Auth::check())
            <livewire:create-idea-form />
        @endif
        <livewire:popular-tags-card />
    </div>
    <div class="col-span-6 md:col-span-4">
        <livewire:ideas-list />
    </div>
</div>
