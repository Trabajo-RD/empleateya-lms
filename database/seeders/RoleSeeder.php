<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
        $roleNames = [
            'administrator',
            'manager',
            'coursemoderator',
            'coursecreator',
            'contentmoderator',
            'contentcreator',
            'internalinstructor',
            'externalinstructor',
            'helper',
            'student',
            'guest'
        ];

        // Create new aditional permissions for each role
        foreach($roleNames as $name){
            Permission::create([
                'name' => "assign-" . $name
            ]);
        }

        // Get all permissions
        $allPermissions = Permission::orderBy('name')->get();

        foreach($roleNames as $name){
            
            // create all roles
            $role = Role::create([
                'name' => $name
            ]);

            // Administrator roles
            if($name === 'administrator'){

                // give all permissions
                $role->givePermissionTo($allPermissions);

                // revoked permissions
                $role->revokePermissionTo([
                    'enroll', 
                    'take-test', 
                    'evaluate-test', 
                    'manage-attendance'
                ]);
            }

            // Manager permissions
            if($name === 'manager'){

                // give all permissions
                $role->givePermissionTo($allPermissions);

                // revoked permissions
                $role->revokePermissionTo([
                    'enroll',
                    'take-test',
                    'evaluate-test',
                    'manage-attendance',
                    'delete-log',
                    'manage-comment',
                    'create-role',
                    'update-role',             
                    'delete-role',
                    'create-permission',
                    'update-permission',
                    'delete-permission',
                    'delete-user',
                    'create-course',
                    'delete-course',
                    'create-post',
                    'update-post',
                    'delete-post', 
                    'create-lesson',
                    'update-lesson',
                    'delete-lesson',
                    'create-question',
                    'update-question',
                    'delete-question',
                    'create-reaction',
                    'update-reaction',       
                    'delete-reaction',
                    'create-requirement',
                    'update-requirement',   
                    'delete-requirement',
                    'create-resource',
                    'update-resource',   
                    'delete-resource',
                    'create-result',
                    'update-result',
                    'delete-result',
                    'create-review',
                    'update-review',
                    'delete-review',
                    'create-section',
                    'update-section',
                    'delete-section',
                    'create-slide',
                    'update-slide',
                    'delete-slide',
                    'create-test',
                    'update-test',             
                    'delete-test'
                ]);                
            }

            // Course Moderator permissions
            if($name === 'coursemoderator'){
                $role->givePermissionTo([
                    'send-email', 
                    'edit-profile', 
                    'send-message', 
                    'moderate-course',  
                    'manage-comment',
                    'moderate-comment',
                    'view-course',  
                    'list-course',
                    'view-post',
                    'list-post',
                    'view-page',
                    'list-page',
                    'view-category',
                    'list-category',
                    'view-certificate',
                    'list-certificate',
                    'view-lesson',
                    'list-lesson',
                    'view-level',
                    'list-level',
                    'create-message',
                    'view-message',
                    'list-message',
                    'delete-message',
                    'view-modality',
                    'list-modality',
                    'create-observation',
                    'update-observation',
                    'view-observation',
                    'list-observation',
                    'delete-observation',
                    'view-platform',
                    'list-platform',
                    'view-price',
                    'list-price',
                    'view-program',
                    'list-program',
                    'view-question',
                    'list-question',
                    'view-reaction',
                    'list-reaction',
                    'view-requirement',
                    'list-requirement',
                    'view-resource',
                    'list-resource',
                    'view-result',
                    'list-result',
                    'view-review',
                    'list-review',
                    'view-section',
                    'list-section',
                    'view-subject',
                    'list-subject',
                    'view-subscription',
                    'list-subscription',
                    'create-tag',
                    'view-tag',
                    'list-tag',
                    'view-test',
                    'list-test',
                    'view-topic',
                    'list-topic',
                    'view-type',
                    'list-type'
                ]);
            }

            // Course creator permissions
            if($name === 'coursecreator'){
                $role->givePermissionTo([
                    'approve-request',
                    'manage-attendance',
                    'asign-user',
                    'send-email', 
                    'edit-profile', 
                    'send-message', 
                    'create-course',
                    'update-course',  
                    'view-course',  
                    'list-course',
                    'delete-course',
                    'asign-course',
                    'view-post',
                    'list-post',
                    'view-page',
                    'list-page',          
                    'view-category',
                    'list-category',
                    'view-certificate',
                    'list-certificate',
                    'create-lesson',
                    'update-lesson',
                    'view-lesson',
                    'list-lesson',
                    'delete-lesson',
                    'view-level',
                    'list-level',
                    'create-message',
                    'view-message',
                    'list-message',
                    'delete-message',
                    'view-modality',
                    'list-modality',           
                    'view-observation',
                    'list-observation',        
                    'view-platform',
                    'list-platform',
                    'view-price',
                    'list-price',
                    'view-program',
                    'list-program',
                    'create-question',
                    'update-question',
                    'view-question',
                    'list-question',
                    'delete-question',
                    'view-reaction',
                    'list-reaction',
                    'create-requirement',
                    'update-requirement',
                    'view-requirement',
                    'list-requirement',
                    'delete-requirement',
                    'create-resource',
                    'update-resource',
                    'view-resource',
                    'list-resource',
                    'delete-resource',
                    'create-result',
                    'view-result',
                    'list-result',
                    'view-review',
                    'list-review',
                    'create-section',
                    'update-section',
                    'view-section',
                    'list-section',
                    'delete-section',
                    'view-subject',
                    'list-subject',
                    'view-subscription',
                    'list-subscription',
                    'create-tag',
                    'view-tag',
                    'list-tag',  
                    'evaluate-test',   
                    'create-test',
                    'update-test',
                    'view-test',
                    'list-test',
                    'delete-test',
                    'view-topic',
                    'list-topic',
                    'view-type',
                    'list-type',
                    'view-language',
                    'list-language',
                    'manage-comment',
                    'create-comment',
                    'update-comment',
                    'view-comment',
                    'list-comment',
                    'delete-comment',
                    'reply-comment'
                ]);
            }

            // Content Moderator permissions
            if($name === 'contentmoderator'){
                $role->givePermissionTo([
                    'send-email', 
                    'edit-profile', 
                    'send-message',                     
                    'moderate-content',
                    'manage-comment',
                    'moderate-comment',
                    'view-post',
                    'list-post',
                    'view-page',
                    'list-page',
                    'create-message',
                    'view-message',
                    'list-message',
                    'delete-message',                   
                    'create-observation',
                    'update-observation',
                    'view-observation',
                    'list-observation',
                    'delete-observation',                   
                    'view-reaction',
                    'list-reaction',                  
                    'view-resource',
                    'list-resource',                  
                    'view-review',
                    'list-review'                  
                ]);
            }

            // Content creator permissions
            if($name === 'contentcreator'){
                $role->givePermissionTo([                         
                    'enroll', 
                    'take-test',     
                    'asign-user',                   
                    'send-email', 
                    'edit-profile', 
                    'send-message',                     
                    'create-post',
                    'update-post',
                    'view-post',
                    'list-post',
                    'delete-post',
                    'create-page',
                    'update-page',
                    'view-page',
                    'list-page',  
                    'delete-page',        
                    'view-category',
                    'list-category',                    
                    'create-message',
                    'view-message',
                    'list-message',
                    'delete-message',                   
                    'view-observation',
                    'list-observation',        
                    'view-platform',
                    'list-platform',                   
                    'view-program',
                    'list-program',                   
                    'view-reaction',
                    'list-reaction',                   
                    'create-resource',
                    'update-resource',
                    'view-resource',
                    'list-resource',
                    'delete-resource',                   
                    'view-review',
                    'list-review',                     
                    'create-tag',
                    'view-tag',
                    'list-tag',
                    'manage-comment',
                    'create-comment',
                    'update-comment',
                    'view-comment',
                    'list-comment',
                    'delete-comment',
                    'reply-comment'               
                ]);
            }

            // Internal Instructor permissions
            if($name === 'internalinstructor'){
                $role->givePermissionTo([
                    'approve-request',
                    'manage-attendance',
                    'asign-user',
                    'send-email', 
                    'edit-profile', 
                    'send-message', 
                    'create-course',
                    'update-course',  
                    'view-course',  
                    'list-course',
                    'delete-course',
                    'asign-course',                   
                    'view-category',
                    'list-category',
                    'view-certificate',
                    'list-certificate',
                    'create-lesson',
                    'update-lesson',
                    'view-lesson',
                    'list-lesson',
                    'delete-lesson',
                    'view-level',
                    'list-level',
                    'create-message',
                    'view-message',
                    'list-message',
                    'delete-message',
                    'view-modality',
                    'list-modality',           
                    'view-observation',
                    'list-observation',        
                    'view-platform',
                    'list-platform',
                    'view-price',
                    'list-price',
                    'view-program',
                    'list-program',
                    'create-question',
                    'update-question',
                    'view-question',
                    'list-question',
                    'delete-question',
                    'view-reaction',
                    'list-reaction',
                    'create-requirement',
                    'update-requirement',
                    'view-requirement',
                    'list-requirement',
                    'delete-requirement',
                    'create-resource',
                    'update-resource',
                    'view-resource',
                    'list-resource',
                    'delete-resource',
                    'create-result',
                    'view-result',
                    'list-result',
                    'view-review',
                    'list-review',
                    'create-section',
                    'update-section',
                    'view-section',
                    'list-section',
                    'delete-section',
                    'view-subject',
                    'list-subject',
                    'view-subscription',
                    'list-subscription',
                    'create-tag',
                    'view-tag',
                    'list-tag',  
                    'evaluate-test',   
                    'create-test',
                    'update-test',
                    'view-test',
                    'list-test',
                    'delete-test',
                    'view-topic',
                    'list-topic',
                    'view-type',
                    'list-type',
                    'view-language',
                    'list-language',
                    'manage-comment',
                    'create-comment',
                    'update-comment',
                    'view-comment',
                    'list-comment',
                    'delete-comment',
                    'reply-comment'
                ]);
            }

            // External Instructor permissions
            if($name === 'externalinstructor'){
                $role->givePermissionTo([
                    'approve-request',
                    'manage-attendance',
                    'asign-user',
                    'send-email', 
                    'edit-profile', 
                    'send-message',                     
                    'update-course',  
                    'view-course',  
                    'list-course',
                    'delete-course',                       
                    'view-category',
                    'list-category',
                    'view-certificate',
                    'list-certificate',
                    'create-lesson',
                    'update-lesson',
                    'view-lesson',
                    'list-lesson',
                    'delete-lesson',
                    'view-level',
                    'list-level',
                    'create-message',
                    'view-message',
                    'list-message',
                    'delete-message',
                    'view-modality',
                    'list-modality',           
                    'view-observation',
                    'list-observation',        
                    'view-platform',
                    'list-platform',
                    'view-price',
                    'list-price',
                    'view-program',
                    'list-program',
                    'create-question',
                    'update-question',
                    'view-question',
                    'list-question',
                    'delete-question',
                    'view-reaction',
                    'list-reaction',
                    'create-requirement',
                    'update-requirement',
                    'view-requirement',
                    'list-requirement',
                    'delete-requirement',
                    'create-resource',
                    'update-resource',
                    'view-resource',
                    'list-resource',
                    'delete-resource',
                    'create-result',
                    'view-result',
                    'list-result',
                    'view-review',
                    'list-review',
                    'create-section',
                    'update-section',
                    'view-section',
                    'list-section',
                    'delete-section',
                    'view-subject',
                    'list-subject',
                    'view-subscription',
                    'list-subscription',
                    'create-tag',
                    'view-tag',
                    'list-tag',  
                    'evaluate-test',   
                    'create-test',
                    'update-test',
                    'view-test',
                    'list-test',
                    'delete-test',
                    'view-topic',
                    'list-topic',
                    'view-type',
                    'list-type',
                    'view-language',
                    'list-language',
                    'manage-comment',
                    'create-comment',
                    'update-comment',
                    'view-comment',
                    'list-comment',
                    'delete-comment',
                    'reply-comment'
                ]);
            }

            // Helper permissions
            if($name === 'helper'){
                $role->givePermissionTo([
                    'approve-request',
                    'manage-attendance',
                    'send-email', 
                    'edit-profile', 
                    'send-message', 
                    'view-course',  
                    'list-course',    
                    'view-category',                 
                    'view-certificate',
                    'list-certificate',                    
                    'view-lesson',
                    'list-lesson',
                    'view-level',
                    'create-message',
                    'view-message',
                    'list-message',
                    'delete-message',
                    'view-modality',              
                    'view-price',
                    'view-program',
                    'list-program',                  
                    'view-question',
                    'list-question',                   
                    'view-reaction',
                    'list-reaction',                  
                    'view-requirement',
                    'list-requirement',                 
                    'view-resource',
                    'list-resource',     
                    'create-result',              
                    'view-result',
                    'list-result',
                    'view-review',
                    'list-review',                   
                    'view-section',
                    'list-section',                  
                    'view-subject',
                    'list-subject',
                    'view-subscription',
                    'list-subscription',                    
                    'view-tag',
                    'evaluate-test',                       
                    'view-test',
                    'list-test',                   
                    'view-topic',
                    'view-type',
                    'view-language',
                    'create-comment',
                    'update-comment',
                    'view-comment',
                    'list-comment',
                    'delete-comment',
                    'reply-comment'
                ]);
            }

            // Student permissions
            if($name === 'student'){
                $role->givePermissionTo([
                    'enroll',
                    'take-test',    
                    'send-email', 
                    'edit-profile', 
                    'send-message', 
                    'view-course',  
                    'list-course',    
                    'view-category',                 
                    'generate-certificate',               
                    'view-certificate',
                    'list-certificate',                    
                    'view-lesson',
                    'list-lesson',
                    'view-level',
                    'create-message',
                    'view-message',
                    'list-message',
                    'delete-message',
                    'view-modality',              
                    'view-price',
                    'view-program',             
                    'view-question',
                    'list-question',
                    'create-reaction',
                    'update-reaction',            
                    'view-reaction',
                    'list-reaction',  
                    'delete-reaction',                
                    'view-requirement',
                    'list-requirement',
                    'create-resource',
                    'update-resource',                 
                    'view-resource',
                    'list-resource',  
                    'delete-resource',                 
                    'view-result',
                    'list-result',
                    'view-review',
                    'list-review',                   
                    'view-section',
                    'list-section',                  
                    'view-subject',
                    'list-subject',
                    'view-subscription',
                    'list-subscription',                    
                    'view-tag',
                    'evaluate-test',                       
                    'view-test',
                    'list-test',                   
                    'view-topic',
                    'view-type',
                    'view-language',
                    'create-comment',
                    'update-comment',
                    'view-comment',
                    'list-comment',
                    'delete-comment',
                    'reply-comment'
                ]);
            }

            // Guest permissions
            if($name === 'guest'){
                $role->givePermissionTo([                  
                    'view-course', 
                    'view-section',
                    'view-lesson',
                    'view-program',
                    'view-requirement',
                    'view-modality',
                    'view-level',
                    'view-review',    
                    'view-category',     
                    'view-tag',
                    'view-topic',
                    'view-type',
                    'view-language'
                ]);
            }
        }

        // /**
        //  * Administrator
        //  */
        // $administrator = Role::create([
        //     'name' => 'Administrator'
        // ]);

        // $administrator->syncPermissions([
        //     'LMS Ver Dashboard',
        //     'LMS Crear roles',
        //     'LMS Editar roles',
        //     'LMS Leer roles',
        //     'LMS Eliminar roles',
        //     'LMS Leer usuarios',
        //     'LMS Editar usuarios',
        //     'LMS Crear cursos',
        //     'LMS Leer cursos',
        //     'LMS Actualizar cursos',
        //     'LMS Eliminar cursos',
        // ]);

        // /**
        //  * Manager
        //  */
        // $manager = Role::create([
        //     'name' => 'Manager'
        // ]);

        // $manager->syncPermissions([
        //     'LMS Ver Dashboard',
        //     'LMS Crear roles',
        //     'LMS Editar roles',
        //     'LMS Leer roles',
        //     'LMS Eliminar roles',
        //     'LMS Leer usuarios',
        //     'LMS Editar usuarios',
        //     'LMS Crear cursos',
        //     'LMS Leer cursos',
        //     'LMS Actualizar cursos',
        //     'LMS Eliminar cursos',
        // ]);

        // /**
        //  * Moderator
        //  */
        // $moderator = Role::create([
        //     'name' => 'Moderator'
        // ]);

        // $moderator->syncPermissions([
        //     'LMS Editar categoria',
        //     'LMS Asignar categoria',
        //     'LMS Editar subcategoria',
        //     'LMS Asignar subcategoria',
        //     'LMS Editar etiquetas',
        //     'LMS Asignar etiquetas',
        //     'LMS Supervisar cursos',
        //     'LMS Actualizar cursos',
        //     'LMS Calificar seccion',
        //     'LMS Calificar item',
        //     'LMS Editar calificacion'
        // ]);

        // /**
        //  * Creator
        //  */
        // $creator = Role::create([
        //     'name' => 'Creator'
        // ]);

        // $creator->syncPermissions([
        //     'LMS Administrar ajustes',
        //     'LMS Crear contenido',
        //     'LMS Editar contenido',
        //     'LMS Eliminar contenido',
        //     'LMS Crear cursos',
        //     'LMS Leer cursos',
        //     'LMS Actualizar cursos',
        // ]);

        // /**
        //  * Instructor
        //  */
        // $instructor = Role::create([
        //     'name' => 'Instructor'
        // ]);

        // $instructor->syncPermissions([
        //     'LMS Crear cursos',
        //     'LMS Leer cursos',
        //     'LMS Actualizar cursos',
        //     'LMS Calificar seccion',
        //     'LMS Calificar item',
        // ]);

        // /**
        //  * Contributor
        //  */
        // $contributor = Role::create([
        //     'name' => 'Contributor'
        // ]);

        // $contributor->syncPermissions([
        //     'LMS Supervisar cursos',
        //     'LMS Calificar item',
        //     'LMS Crear contenido',
        //     'LMS Leer cursos',
        // ]);

        // /**
        //  * Student
        //  */
        // $student = Role::create([
        //     'name' => 'Student'
        // ]);

        // $student->syncPermissions([
        //     'LMS Leer cursos',
        // ]);

        // /**
        //  * Guest
        //  */
        // $guest = Role::create([
        //     'name' => 'Guest'
        // ]);

        // $guest->syncPermissions([
        //     'LMS Leer cursos',
        // ]);

        // // Role::create([
        // //     'name' => 'Authenticated'
        // // ]);
    }
}
