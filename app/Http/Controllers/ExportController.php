<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KunjunganExport;

class ExportController extends Controller
{
    public function exportKunjungan()
    {
        return Excel::download(new KunjunganExport, 'kunjungan.xlsx');
    }
}
