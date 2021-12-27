@extends('layouts.app')

@section('content')
    <div class="grid items-start w-2/3 grid-cols-6 gap-6 mx-auto mt-24">
        <div class="col-span-6 sm:col-span-2">
            <livewire:popular-tags-card />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <livewire:ideas-list />
        </div>
    </div>
@endsection
