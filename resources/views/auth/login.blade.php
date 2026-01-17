<x-guest-layout>

<div class="flex justify-center">
    <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-xl p-8 w-80 mx-auto border border-purple-200">

        <x-auth-session-status class="mb-4 text-pink-600" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" class="text-purple-700"/>
                <x-text-input
                    id="email"
                    class="block mt-1 w-full rounded-xl border-purple-300 focus:border-pink-400 focus:ring-pink-400"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-pink-600" />
            </div>

            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="text-purple-700"/>
                <x-text-input
                    id="password"
                    class="block mt-1 w-full rounded-xl border-purple-300 focus:border-pink-400 focus:ring-pink-400"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-pink-600" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me"
                           type="checkbox"
                           class="rounded border-purple-300 text-pink-500 shadow-sm focus:ring-pink-400"
                           name="remember">
                    <span class="ms-2 text-sm text-purple-600">
                        {{ __('Remember me') }}
                    </span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="text-sm text-purple-600 hover:text-pink-600 underline"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button
                    class="bg-gradient-to-r from-pink-500 to-purple-600
                           hover:from-pink-600 hover:to-purple-700
                           rounded-xl px-6 py-2">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</div>

</x-guest-layout>
