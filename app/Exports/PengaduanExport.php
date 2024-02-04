<?php

namespace App\Exports;

use App\Models\Pengaduan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PengaduanExport implements FromView
{
    public function view(): View
    {
        return view('export', [
            'pengaduan' => Pengaduan::all()
        ]);
    }
}