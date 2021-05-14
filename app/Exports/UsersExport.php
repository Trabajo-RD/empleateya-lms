<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromCollection, WithStrictNullComparison, WithCustomStartCell, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(User::getUsers());
        // return User::all();
    }

    /**
     * @return string
     */
    public function startCell(): string
    {
        return 'A1';
    }

    public function headings(): array
    {
        return [
            // 'ID',
            'Documento de Identidad',
            // 'Tipo Documento',
            'Nombre',
            'Apellido',
            'Genero',
            'Email',
            // 'Fecha verificacion',
            // 'Equipo',
            // 'Foto',
            // 'Fecha creacion',
            // 'Fecha actualizacion',
            // 'Opciones',
            'Activo',
            'Ultimo acceso',
            'Avatar'
        ];
    }

}
