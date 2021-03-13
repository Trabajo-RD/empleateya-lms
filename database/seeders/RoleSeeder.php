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
            'LMS Leer roles',
            'LMS Leer usuarios',
            'LMS Editar usuarios',
            'LMS Leer cursos',
            'LMS Eliminar cursos',
        ]);

        /**
         * Creator
         */
        $creator = Role::create([
            'name' => 'Creator'
        ]);

        $creator->syncPermissions([
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
            'LMS Calificar sección',
            'LMS Calificar item',
        ]);

        /**
         * Contributor
         */
        $contributor = Role::create([
            'name' => 'Contributor'
        ]);

        $contributor->syncPermissions([
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
