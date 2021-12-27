@extends('layouts.app')

@section('content')
    <div class="grid items-start w-2/3 grid-cols-6 gap-6 mx-auto mt-24">
        <div class="col-span-2">
            <div class="p-6 bg-gray-800 shadow-lg rounded-xl">
                <h1 class="text-2xl font-semibold text-gray-300">Popular Topics</h1>
                <div class='flex flex-wrap mt-4'>
                    <span
                        class="px-2 m-1 text-sm font-bold leading-loose bg-gray-200 rounded-full cursor-pointer hover:bg-gray-300">#winter</span>
                    <span
                        class="px-2 m-1 text-sm font-bold leading-loose bg-gray-200 rounded-full cursor-pointer hover:bg-gray-300">#stark</span>
                    <span
                        class="px-2 m-1 text-sm font-bold leading-loose bg-gray-200 rounded-full cursor-pointer hover:bg-gray-300">#gameofthrones</span>
                    <span
                        class="px-2 m-1 text-sm font-bold leading-loose bg-gray-200 rounded-full cursor-pointer hover:bg-gray-300">#battle</span>
                    <span
                        class="px-2 m-1 text-sm font-bold leading-loose bg-gray-200 rounded-full cursor-pointer hover:bg-gray-300">#jhonsnow</span>
                    <span
                        class="px-2 m-1 text-sm font-bold leading-loose bg-gray-200 rounded-full cursor-pointer hover:bg-gray-300">#kinglandings</span>
                </div>
            </div>
        </div>
        <div class="col-span-4">
            <livewire:ideas-list />
        </div>
    </div>
@endsection
