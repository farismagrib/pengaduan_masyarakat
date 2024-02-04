<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Exports\PengaduanExport;
use Maatwebsite\Excel\Facades\Excel;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pengaduan::all();

        return view('pages.masyarakat.aduan.index', [
            'data'=> $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.masyarakat.aduan.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        Pengaduan::create([
            'nik' => Auth::guard('masyarakat')->user()->nik,
            'judul' => $request->judul,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $request->file('foto')->store('assets/aduan', 'public'),
            'tanggal_pengaduan' => Carbon::today(),
            'status' => "Belum Ditanggapi" ,
        ]);

        return redirect()->route('masyarakat-index')->with("success","Aduan anda telah terkirim");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pengaduan::findOrFail($id);
        $tanggapan = Tanggapan::where('id_pengaduan', $id)->get();
        
        return view('pages.masyarakat.aduan.detail',[

            'data'=> $data,
            'tanggapan' => $tanggapan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
   
    //export excel
    public function export() 
    {
        return Excel::download(new PengaduanExport, 'users.xlsx');
    }
}
