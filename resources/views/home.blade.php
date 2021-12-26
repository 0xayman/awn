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
            @foreach ($ideas as $idea)
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
            @endforeach
        </div>
    </div>
@endsection
