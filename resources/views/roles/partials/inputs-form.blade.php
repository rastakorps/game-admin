<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 ps-2">
            {{ __('Alta de rol') }}
        </h2>
    </header>

    <div class="flex flex-wrap">
        <div class="w-full sm:w-1/2 px-2 pt-2">
            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="isset($role) ? $role->name : ''" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
        </div>

        <div class="w-full px-2 pt-4">
            <p class="font-medium mb-2">{{ __('Seleccionar Permisos') }}</p>
            
            <div class="flex flex-wrap md:flex-nowrap gap-4 mt-2">
                <div class="w-full md:w-1/2">
                    <x-input-label :value="__('Permisos disponibles')" />
                    <div id="availablePermissions" class="border rounded-lg p-4 h-64 overflow-y-auto">
                        @foreach($permissions as $permission)
                            <div data-id="{{ $permission->id }}" 
                                 class="permission-item cursor-move p-2 mb-2 bg-gray-100 dark:bg-gray-700 rounded hover:bg-gray-200 dark:hover:bg-gray-600">
                                {{ $permission->name }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="w-full md:w-1/2">
                    <x-input-label :value="__('Permisos asignados')" />
                    <div id="selectedPermissions" class="border rounded-lg p-4 h-64 overflow-y-auto">
                        @if(isset($role))
                            @foreach($role->permissions as $permission)
                                <div data-id="{{ $permission->id }}" 
                                     class="permission-item cursor-move p-2 mb-2 bg-blue-100 dark:bg-blue-900 rounded hover:bg-blue-200 dark:hover:bg-blue-800">
                                    {{ $permission->name }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            
            <input type="hidden" name="permissions" id="permissionsInput" value="{{ isset($role) ? $role->permissions->pluck('id')->implode(',') : '' }}">

            <x-input-error class="mt-2" :messages="$errors->get('permissions')" />
            <x-input-error class="mt-2" :messages="$errors->get('permissions.*')" />
        </div>

        <div class="w-full px-2 pt-2">
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>
        </div>
    </div>
    
</section>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const updatePermissionsInput = () => {
            const selectedIds = Array.from(selectedPermissions.children).map(item => item.dataset.id);
            document.getElementById('permissionsInput').value = selectedIds.join(',');
        };

        const availablePermissions = document.getElementById('availablePermissions');
        const selectedPermissions = document.getElementById('selectedPermissions');

        new Sortable(availablePermissions, {
            group: 'shared',
            animation: 150,
            onSort: updatePermissionsInput
        });

        new Sortable(selectedPermissions, {
            group: 'shared',
            animation: 150,
            onSort: updatePermissionsInput
        });

        updatePermissionsInput();
    });
</script>