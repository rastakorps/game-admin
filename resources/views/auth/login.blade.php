<x-guest-layout>
    <x-auth-session-status class="mb-4 text-white" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <x-input-label for="email" :value="__('Correo')" class="text-[#1A1D2E]" />
            <x-text-input id="email" class="block mt-1 w-full border-[#1A1D2E] text-black" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-[#F44336]" /> <!-- Rojo -->
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" class="text-[#1A1D2E]" />

            <x-text-input id="password" class="block mt-1 w-full border-[#1A1D2E] text-black"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-[#F44336]" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center text-[#1A1D2E]">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-[#F9A826] shadow-sm focus:ring-[#F9A826] dark:focus:ring-[#5AD08B]" name="remember">
                <span class="ms-2 text-sm text-gray-700">{{ __('Recordar contraseña') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-700 hover:text-[#F9A826]" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 bg-[#F9A826] hover:bg-[#F9A826] text-white">
                {{ __('Entrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
