<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $data = Pengaduan::where('tanggal_pengaduan', Carbon::today())->get();

        return view('pages.admin.index', [
            'data'=> $data,
        ]);
    }
}
