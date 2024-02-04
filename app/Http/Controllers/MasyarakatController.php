<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MasyarakatController extends Controller
{
    public function index()
    {
        $data = Pengaduan::where('tanggal_pengaduan', Carbon::today())->get();
        return view('pages.masyarakat.index', [
            'data'=> $data,
        ]);
    }

    public function show()
    {
        $data = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->get();

        return view('pages.masyarakat.aduan.mine', [
            'data' => $data,
        ]);
    }
}
