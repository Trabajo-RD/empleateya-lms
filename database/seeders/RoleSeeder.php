<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Administrator
         */
        $administrator = Role::create([
            'name' => 'Administrator'
        ]);

        $administrator->syncPermissions([
            'LMS Ver Dashboard',
            'LMS Crear roles',
            'LMS Editar roles',
            'LMS Leer roles',
            'LMS Eliminar roles',
            'LMS Leer usuarios',
            'LMS Editar usuarios',
            'LMS Crear cursos',
            'LMS Leer cursos',
            'LMS Actualizar cursos',
            'LMS Eliminar cursos',
        ]);

        /**
         * Manager
         */
        $manager = Role::create([
            'name' => 'Manager'
        ]);

        $manager->syncPermissions([
            'LMS Ver Dashboard',
            'LMS Crear roles',
            'LMS Editar roles',
            'LMS Leer roles',
            'LMS Eliminar roles',
            'LMS Leer usuarios',
            'LMS Editar usuarios',
            'LMS Crear cursos',
            'LMS Leer cursos',
            'LMS Actualizar cursos',
            'LMS Eliminar cursos',
        ]);

        /**
         * Moderator
         */
        $moderator = Role::create([
            'name' => 'Moderator'
        ]);

        $moderator->syncPermissions([
            'LMS Editar categoria',
            'LMS Asignar categoria',
            'LMS Editar subcategoria',
            'LMS Asignar subcategoria',
            'LMS Editar etiquetas',
            'LMS Asignar etiquetas',
            'LMS Supervisar cursos',
            'LMS Actualizar cursos',
            'LMS Calificar seccion',
            'LMS Calificar item',
            'LMS Editar calificacion'
        ]);

        /**
         * Creator
         */
        $creator = Role::create([
            'name' => 'Creator'
        ]);

        $creator->syncPermissions([
            'LMS Administrar ajustes',
            'LMS Crear contenido',
            'LMS Editar contenido',
            'LMS Eliminar contenido',
            'LMS Crear cursos',
            'LMS Leer cursos',
            'LMS Actualizar cursos',
        ]);

        /**
         * Instructor
         */
        $instructor = Role::create([
            'name' => 'Instructor'
        ]);

        $instructor->syncPermissions([
            'LMS Crear cursos',
            'LMS Leer cursos',
            'LMS Actualizar cursos',
            'LMS Calificar seccion',
            'LMS Calificar item',
        ]);

        /**
         * Contributor
         */
        $contributor = Role::create([
            'name' => 'Contributor'
        ]);

        $contributor->syncPermissions([
            'LMS Supervisar cursos',
            'LMS Calificar item',
            'LMS Crear contenido',
            'LMS Leer cursos',
        ]);

        /**
         * Student
         */
        $student = Role::create([
            'name' => 'Student'
        ]);

        $student->syncPermissions([
            'LMS Leer cursos',
        ]);

        /**
         * Guest
         */
        $guest = Role::create([
            'name' => 'Guest'
        ]);

        $guest->syncPermissions([
            'LMS Leer cursos',
        ]);

        // Role::create([
        //     'name' => 'Authenticated'
        // ]);
    }
}
