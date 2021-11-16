<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * cPanel
         */
        Permission::create([
            'name' => 'LMS Ver Dashboard',
        ]);


        /**
         * Roles
         */
        Permission::create([
            'name' => 'LMS Crear roles',
        ]);

        Permission::create([
            'name' => 'LMS Editar roles',
        ]);

        Permission::create([
            'name' => 'LMS Leer roles',
        ]);

        Permission::create([
            'name' => 'LMS Eliminar roles',
        ]);

        /**
         * Categorias, subcategorias y etiquetas
         */
        Permission::create([
            'name' => 'LMS Crear categoria'
        ]);
        Permission::create([
            'name' => 'LMS Editar categoria'
        ]);
        Permission::create([
            'name' => 'LMS Eliminar categoria'
        ]);
        Permission::create([
            'name' => 'LMS Asignar categoria'
        ]);
        Permission::create([
            'name' => 'LMS Editar subcategoria'
        ]);
        Permission::create([
            'name' => 'LMS Asignar subcategoria'
        ]);
        Permission::create([
            'name' => 'LMS Editar etiquetas'
        ]);
        Permission::create([
            'name' => 'LMS Asignar etiquetas'
        ]);

        /**
         * Usuarios
         */
        Permission::create([
            'name' => 'LMS Leer usuarios',
        ]);

        Permission::create([
            'name' => 'LMS Editar usuarios',
        ]);

        /**
         * Cursos
         */
        Permission::create([
            'name' => 'LMS Supervisar cursos',
        ]);

        Permission::create([
            'name' => 'LMS Crear cursos',
        ]);

        Permission::create([
            'name' => 'LMS Leer cursos',
        ]);

        Permission::create([
            'name' => 'LMS Actualizar cursos',
        ]);

        Permission::create([
            'name' => 'LMS Eliminar cursos',
        ]);

        /**
         * Contenido
         */
        Permission::create([
            'name' => 'LMS Administrar ajustes',
        ]);

        Permission::create([
            'name' => 'LMS Crear contenido',
        ]);

        Permission::create([
            'name' => 'LMS Editar contenido',
        ]);

        Permission::create([
            'name' => 'LMS Eliminar contenido',
        ]);

        /**
         * Calificaciones
         */
        Permission::create([
            'name' => 'LMS Calificar seccion',
        ]);
        Permission::create([
            'name' => 'LMS Calificar item',
        ]);
        Permission::create([
            'name' => 'LMS Editar calificacion'
        ]);

    }
}
