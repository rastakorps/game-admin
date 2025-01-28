<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Permisos') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="mb-3 text-end">
            <x-primary-link-button href="{{ route('roles.create') }}" icon="fa fa-plus">
                {{ __('Agregar') }}
            </x-primary-link-button>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <table id="roles-table" class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Permisos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {        
    const table = document.getElementById('roles-table');

    new DataTable(table, {
        processing: true,
        serverSide: true,
        ajax: '{{ route('roles.index') }}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'assigned_permissions', name: 'assigned_permissions'},
            { 
                data: 'actions', 
                name: 'actions', 
                orderable: false, 
                searchable: false 
            }
        ],
        language: {
            url: '//cdn.datatables.net/plug-ins/2.2.1/i18n/es-ES.json',
        },
    });
});
</script>
