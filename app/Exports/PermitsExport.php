<?php

namespace App\Exports;

use App\Models\Permit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PermitsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Permit::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'nama santri',
            'room santri',
            'tanggal pulang',
            'tanggal kembali',
            'alasan',
            'pengizin',
            'status'
        ];
    }

    public function map($permit): array
    {
        return [
            $permit->id,
            $permit->student->name,
            $permit->student->room,
            $permit->start_date,
            $permit->end_date,
            $permit->reason,
            $permit->user->name,
            $permit->returned?"Sudah Kembali":"Belum Kembali",
        ];
    }
}
