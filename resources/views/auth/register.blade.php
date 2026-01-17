<x-guest-layout>

<div class="flex justify-center">
    <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-xl p-8 w-80 mx-auto border border-purple-200">

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Name')" class="text-purple-700"/>
                <x-text-input id="name"
                    class="block mt-1 w-full rounded-xl border-purple-300 focus:border-pink-400 focus:ring-pink-400"
                    type="text"
                    name="name"
                    :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-pink-600" />
            </div>

            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" class="text-purple-700"/>
                <x-text-input id="email"
                    class="block mt-1 w-full rounded-xl border-purple-300 focus:border-pink-400 focus:ring-pink-400"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-pink-600" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-purple-700"/>
                <x-text-input id="password"
                    class="block mt-1 w-full rounded-xl border-purple-300 focus:border-pink-400 focus:ring-pink-400"
                    type="password"
                    name="password"
                    required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-pink-600" />
            </div>

            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-purple-700"/>
                <x-text-input id="password_confirmation"
                    class="block mt-1 w-full rounded-xl border-purple-300 focus:border-pink-400 focus:ring-pink-400"
                    type="password"
                    name="password_confirmation"
                    required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-pink-600" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="text-sm text-purple-600 hover:text-pink-600 underline"
                   href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button
                    class="bg-gradient-to-r from-pink-500 to-purple-600
                           hover:from-pink-600 hover:to-purple-700
                           rounded-xl px-6 py-2">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</div>

</x-guest-layout>
