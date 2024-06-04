<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class rolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Estudiante']);

        Permission::create(['name' => 'Usuarios.index', 'description' => 'Ver usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'Usuarios.store', 'description' => 'Crear usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'Usuarios.edit', 'description' => 'Mostrar para editar usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'Usuarios.update', 'description' => 'Actualizar usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'Usuarios.destroy', 'description' => 'Eliminar usuarios'])->syncRoles([$role1]);

        // Permission::create(['name' => 'Compras.index', 'description' => 'Ver usuarios'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Compras.create', 'description' => 'Ver usuarios'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Compras.update', 'description' => 'Ver usuarios'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Compras.destroy', 'description' => 'Ver usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'Noticias.index', 'description' => 'Ver noticias'])->syncRoles([$role1]);
        Permission::create(['name' => 'Noticias.store', 'description' => 'Crear noticias'])->syncRoles([$role1]);
        Permission::create(['name' => 'Noticias.show', 'description' => 'Detalle noticias'])->syncRoles([$role1]);
        Permission::create(['name' => 'Noticias.edit', 'description' => 'Mostrar para editar noticias'])->syncRoles([$role1]);
        Permission::create(['name' => 'Noticias.update', 'description' => 'Actualizar noticias'])->syncRoles([$role1]);
        Permission::create(['name' => 'Noticias.destroy', 'description' => 'Eliminar noticias'])->syncRoles([$role1]);

        // Permission::create(['name' => 'Cursos.index', 'description' => 'Ver Cursos'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Cursos.create', 'description' => 'Pagina crear Cursos'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Cursos.store', 'description' => 'Crear Cursos'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Cursos.edit', 'description' => 'Mostrar para editar Cursos'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Cursos.update', 'description' => 'Actualizar Cursos'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Cursos.destroy', 'description' => 'Eliminar Cursos'])->syncRoles([$role1]);

        Permission::create(['name' => 'Capacitaciones.index', 'description' => 'Ver Capacitaciones'])->syncRoles([$role1]);
        Permission::create(['name' => 'Capacitaciones.create', 'description' => 'Pagina crear Capacitaciones'])->syncRoles([$role1]);
        Permission::create(['name' => 'Capacitaciones.store', 'description' => 'Crear Capacitaciones'])->syncRoles([$role1]);
        Permission::create(['name' => 'Capacitaciones.edit', 'description' => 'Mostrar para editar Capacitaciones'])->syncRoles([$role1]);
        Permission::create(['name' => 'Capacitaciones.update', 'description' => 'Actualizar Capacitaciones'])->syncRoles([$role1]);
        Permission::create(['name' => 'Capacitaciones.destroy', 'description' => 'Eliminar Capacitaciones'])->syncRoles([$role1]);


    }
}
