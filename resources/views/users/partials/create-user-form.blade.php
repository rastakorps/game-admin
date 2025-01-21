<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 ps-2">
            {{ __('Alta de usuario') }}
        </h2>
    </header>

    <form method="post" action="{{ route('users.store') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="flex flex-wrap">
            <div class="w-full sm:w-1/2 px-2">
                <div>
                    <x-input-label for="name" :value="__('Nombre')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
            </div>
            <div class="w-full sm:w-1/2 px-2">
                <div>
                    <x-input-label for="email" :value="__('Correo')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

            <div class="w-full sm:w-1/2 px-2 pt-2">
                <div>
                    <x-input-label for="password" :value="__('Contraseña')" />
        
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
            </div>

            <div class="w-full sm:w-1/2 px-2 pt-2">
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
            </div>

            <div class="w-full sm:w-1/2 px-2 pt-2">
                <div>
                    <x-input-label for="role" :value="__('Rol')" />
                    <x-select-input :options="['value1' => 'Option 1', 'value2' => 'Option 2']" placeholder="Elige una opción" />
                    <x-input-error class="mt-2" :messages="$errors->get('role')" />
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4 ps-2">
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>
        </div>
    </form>
</section>
