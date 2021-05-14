<?php

namespace App\Exports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PublishedCoursesExport implements FromCollection, WithStrictNullComparison, WithCustomStartCell, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Course::getPublishedCourses());
        // return Course::where('status', 3)->get();
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
            'Título',
            // 'Subtitulo',
            'Descripción',
            'Url',
            'Duración en minutos',
            'Status',
            // 'Slug',
            'Usuario',
            'Nivel',
            'Categoría',
            //'Precio',
            'Tipo',
            'Modalidad',
            //'Fecha de creación',
            //'Fecha de modificación'
        ];
    }
}
