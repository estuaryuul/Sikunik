<?php

namespace App\Exports;

use App\Models\Kunjungan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KunjunganExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Kunjungan::select('user_id', 'instansi', 'tujuan', 'name', 'jabatan', 'jenis', 'jumlah', 'hp', 'surel', 'tanggal', 'waktu', 'pdf_file', 'mentor', 'ulasan', 'status', 'mail')->get();
    }

    public function headings(): array
    {
        return [
            'User ID',
            'Instansi',
            'Tujuan',
            'Nama',
            'Jabatan',
            'Jenis',
            'Jumlah',
            'No HP',
            'Surel (Email)',
            'Tanggal',
            'Waktu',
            'File PDF',
            'Mentor',
            'Ulasan',
            'Status',
            'Mail',
        ];
    }
}
