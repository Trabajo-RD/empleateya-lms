<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Program::create([
            'name' => 'RD-Trabaja',
            'slug' => Str::slug('RD Trabaja'),
            'description' => 'El programa RD-Trabaja, está compuesto por un sistema de intermediación laboral y acciones de capacitación para el empleo conforme a las necesidades de todos los sectores económicos del país.',
            'responsible_name' => null,
            'responsible_position' => null,
            'document_id_required' => 1,
            'adult_required' => 1,
            'organization_id' => 1
        ]);

        Program::create([
            'name' => 'Microsoft',
            'slug' => Str::slug('Microsoft'),
            'description' => null,
            'responsible_name' => null,
            'responsible_position' => null,
            'document_id_required' => 1,
            'adult_required' => 1,
            'organization_id' => 2
        ]);

        Program::create([
            'name' => 'LinkedIn',
            'slug' => Str::slug('LinkedIn'),
            'description' => null,
            'responsible_name' => null,
            'responsible_position' => null,
            'document_id_required' => 1,
            'adult_required' => 1,
            'organization_id' => 2
        ]);

        // Program::create([
        //     'name' => 'Educology',
        //     'slug' => Str::slug('Educology'),
        //     'description' => 'Si estas buscando ser más competitivo, obtener un trabajo o emprender tu propio negocio, estos cursos son para tí.',
        //     'responsible_name' => null,
        //     'responsible_position' => null,
        //     'document_id_required' => 1,
        //     'adult_required' => 1,
        //     'organization_id' => 3
        // ]);
    }
}
