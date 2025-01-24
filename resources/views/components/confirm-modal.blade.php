<div x-data="{ isOpen: false, tableName: '{{ $tableName }}', url: '{{ $url }}' }">
    <a href="#" 
        class="inline-flex items-center px-2 py-2 bg-[#F44336] dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-[#F9A826] focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
        @click="isOpen = true"
    >
        <i class="fa-solid fa-trash"></i>
    </a>

    <div
        x-show="isOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4"
    >
        <div
            x-show="isOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="bg-white rounded-lg shadow-lg w-full max-w-md"
        >
            <div class="p-4 border-b">
                <h3 class="text-lg font-semibold">{{ $title }}</h3>
            </div>

            <div class="p-4">
                <p>{{ $body }}</p>
            </div>

            <div class="p-4 flex justify-end space-x-2">
                <button @click="isOpen = false" class="bg-gray-500 text-white px-4 py-2 rounded">
                    Cancelar
                </button>
                <button @click="deleteEntry" class="bg-[#5AD08B] text-white px-4 py-2 rounded">
                    Aceptar
                </button>
            </div>
        </div>
    </div>

    <script>
        function deleteEntry() {
            axios.delete(this.url)
                .then((response) => {
                    const table = $(`#${this.tableName}`).DataTable();
                    table.ajax.reload();
                    this.isOpen = false;
                })
                .catch((error) => {
                    console.error(error);
                });
        }
    </script>
</div>