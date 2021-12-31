<div class="w-3/5 mx-auto mt-24">
    @foreach ($notifications as $notification)
        <livewire:notification-card :notification="$notification">
    @endforeach
</div>
