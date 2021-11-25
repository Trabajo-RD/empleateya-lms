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

        $models = [
            'role',
            'permission',
            'user',
            'course',
            'post',
            'page',
            'category',
            'certificate',
            'comment',
            'language',
            'lesson',
            'level',
            'link',
            'membership',
            'message',
            'modality',
            'observation',
            'partner',
            'platform',
            'price',
            'program',
            'question',
            'reaction',
            'requirement',
            'resource',
            'result',
            'review',
            'section',
            'slide',
            'subject',
            'subscription',
            'tag',
            'test',
            'topic',
            'type'
        ];

        $actions = [
            'create',
            'update',
            'view',
            'list',
            'delete'
        ];

        // default permissions name
        $permissionNames = [
            'view-dashboard', 
            'approve-request',
            'enroll', 
            'take-test',
            'evaluate-test',
            'generate-certificate',
            'asign-role',
            'asign-permission',
            'asign-course',
            'moderate-course',
            'asign-user',
            'manage-attendance',
            'send-email', 
            'edit-profile', 
            'send-message', 
            'view-log', 
            'delete-log',
            'moderate-content',
            'moderate-comment',
            'manage-comment',
            'reply-comment',
            'manage-user'
        ];

        // add model permissions to array
        foreach($models as $model){
            foreach($actions as $action){
                $permissionNames[] = "{$action}-{$model}";
            }
        }

        // Register all permissions
        foreach($permissionNames as $name){
            Permission::create([
                'name' => $name
            ]);
        }

        // /**
        //  * cPanel
        //  */
        // Permission::create([
        //     'name' => 'LMS Ver Dashboard',
        // ]);


        // /**
        //  * Roles
        //  */
        // Permission::create([
        //     'name' => 'LMS Crear roles',
        // ]);

        // Permission::create([
        //     'name' => 'LMS Editar roles',
        // ]);

        // Permission::create([
        //     'name' => 'LMS Leer roles',
        // ]);

        // Permission::create([
        //     'name' => 'LMS Eliminar roles',
        // ]);

        // /**
        //  * Categorias, subcategorias y etiquetas
        //  */
        // Permission::create([
        //     'name' => 'LMS Crear categoria'
        // ]);
        // Permission::create([
        //     'name' => 'LMS Editar categoria'
        // ]);
        // Permission::create([
        //     'name' => 'LMS Eliminar categoria'
        // ]);
        // Permission::create([
        //     'name' => 'LMS Asignar categoria'
        // ]);
        // Permission::create([
        //     'name' => 'LMS Editar subcategoria'
        // ]);
        // Permission::create([
        //     'name' => 'LMS Asignar subcategoria'
        // ]);
        // Permission::create([
        //     'name' => 'LMS Editar etiquetas'
        // ]);
        // Permission::create([
        //     'name' => 'LMS Asignar etiquetas'
        // ]);

        // /**
        //  * Usuarios
        //  */
        // Permission::create([
        //     'name' => 'LMS Leer usuarios',
        // ]);

        // Permission::create([
        //     'name' => 'LMS Editar usuarios',
        // ]);

        // /**
        //  * Cursos
        //  */
        // Permission::create([
        //     'name' => 'LMS Supervisar cursos',
        // ]);

        // Permission::create([
        //     'name' => 'LMS Crear cursos',
        // ]);

        // Permission::create([
        //     'name' => 'LMS Leer cursos',
        // ]);

        // Permission::create([
        //     'name' => 'LMS Actualizar cursos',
        // ]);

        // Permission::create([
        //     'name' => 'LMS Eliminar cursos',
        // ]);

        // /**
        //  * Contenido
        //  */
        // Permission::create([
        //     'name' => 'LMS Administrar ajustes',
        // ]);

        // Permission::create([
        //     'name' => 'LMS Crear contenido',
        // ]);

        // Permission::create([
        //     'name' => 'LMS Editar contenido',
        // ]);

        // Permission::create([
        //     'name' => 'LMS Eliminar contenido',
        // ]);

        // /**
        //  * Calificaciones
        //  */
        // Permission::create([
        //     'name' => 'LMS Calificar seccion',
        // ]);
        // Permission::create([
        //     'name' => 'LMS Calificar item',
        // ]);
        // Permission::create([
        //     'name' => 'LMS Editar calificacion'
        // ]);

    }
}
