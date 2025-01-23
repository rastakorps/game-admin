<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Permisos') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="mb-3 text-end">            
            <a href="{{ route('permissions.create') }}">Agregar</a>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <table id="permissions-table" class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {        
    const table = document.getElementById('permissions-table');

    new DataTable(table, {
        processing: true,
        serverSide: true,
        ajax: '{{ route('permissions.index') }}',
        columns: [
            { data: 'display_name', name: 'display_name' },
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
