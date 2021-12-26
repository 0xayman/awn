<div class="flex items-center justify-center h-screen">
    <div class="w-2/3 lg:w-2/5 md:w-1/2">
        <form wire:submit.prevent='login' class="min-w-full px-10 py-8 bg-gray-800 rounded-lg shadow-lg">
            <div class="flex justify-center">
                <img class="h-24 d-block" src="{{ asset('images/awn.png') }}" alt="AWN Logo">
            </div>
            <div>
                <label for="email" class="block mt-3 mb-2 font-semibold text-gray-300 text-md">Email</label>
                <input wire:model.lazy='email' name="email" id="email" placeholder="@email"
                    class="w-full px-4 py-2 bg-gray-300 rounded-lg focus:outline-none" type="text" />
                @error('email') <p class="mt-1 text-sm text-red-500"> {{ $message }} </p> @enderror
            </div>
            <div>
                <label for="password" class="block mt-3 mb-2 font-semibold text-gray-300 text-md">Password</label>
                <input wire:model.lazy='password' type="text" name="password" id="password" placeholder="password"
                    class="w-full px-4 py-2 bg-gray-300 rounded-lg focus:outline-none" />
                @error('password') <p class="mt-1 text-sm text-red-500"> {{ $message }} </p> @enderror
            </div>
            <button type="submit"
                class="w-full px-4 py-2 mt-6 font-sans text-lg font-semibold tracking-wide text-white bg-indigo-600 rounded-lg">Login</button>
        </form>
    </div>
</div>
