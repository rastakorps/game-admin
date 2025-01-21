<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Permission::truncate();
        Schema::enableForeignKeyConstraints();

        Permission::insert([
            // ROLES
            [
                'name' => Str::slug('Lista de roles', '_'),
                'guard_name' => 'web',
                'display_name' => 'Lista de roles',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => Str::slug('Crear rol', '_'),
                'guard_name' => 'web',
                'display_name' => 'Crear rol',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => Str::slug('Editar rol', '_'),
                'guard_name' => 'web',
                'display_name' => 'Editar rol',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => Str::slug('Eliminar rol', '_'),
                'guard_name' => 'web',
                'display_name' => 'Eliminar rol',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
