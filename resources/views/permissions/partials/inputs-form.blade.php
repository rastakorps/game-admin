<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 ps-2">
            {{ __('Alta de permiso') }}
        </h2>
    </header>

    <div class="flex flex-wrap">
        <div class="w-full sm:w-1/2 px-2 pt-2">
            <div>
                <x-input-label for="display_name" :value="__('Nombre')" />
                <x-text-input id="display_name" name="display_name" type="text" class="mt-1 block w-full" :value="old('display_name')" required autofocus autocomplete="display_name" />
                <x-input-error class="mt-2" :messages="$errors->get('display_name')" />
            </div>
        </div>

        <div class="w-full px-2 pt-2">
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>
        </div>
    </div>
    
</section>