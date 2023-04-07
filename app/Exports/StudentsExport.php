<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Student::query()->select(array('id', 'name', 'room'));
    }
    public function headings(): array
    {
        return [
            'id',
            'name',
            'room',
        ];
    }
}
