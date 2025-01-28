<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear rol') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div>
                    <form method="post" action="{{ route('roles.store') }}" class="space-y-3">
                        @csrf
                        @include('roles.partials.inputs-form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>