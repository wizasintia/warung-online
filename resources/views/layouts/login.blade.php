<x-guest-layout>

<div class="flex justify-center">
    <div class="bg-white rounded-2xl shadow-xl p-8 w-80 mx-auto border border-pink-300">

        <x-auth-session-status class="mb-4 text-pink-700 font-semibold" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" class="text-purple-800 font-medium"/>
                <x-text-input
                    id="email"
                    class="block mt-1 w-full rounded-xl border-purple-400 focus:border-pink-500 focus:ring-pink-500 text-gray-900"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-pink-700" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-purple-800 font-medium"/>
                <x-text-input
                    id="password"
                    class="block mt-1 w-full rounded-xl border-purple-400 focus:border-pink-500 focus:ring-pink-500 text-gray-900"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-pink-700" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me"
                           type="checkbox"
                           class="rounded border-purple-400 text-pink-600 shadow-sm focus:ring-pink-500"
                           name="remember">
                    <span class="ms-2 text-sm text-purple-700 font-medium">
                        {{ __('Remember me') }}
                    </span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="text-sm text-purple-700 hover:text-pink-700 underline font-medium"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button
                    class="bg-gradient-to-r from-pink-500 to-purple-600
                           hover:from-pink-600 hover:to-purple-700
                           rounded-xl px-6 py-2 font-semibold">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</div>

</x-guest-layout>
