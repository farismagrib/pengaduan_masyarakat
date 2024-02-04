<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\String_;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pengaduan::all();

        return view('pages.admin.tanggapan.index', [
            'data' => $data,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pengaduan::findOrFail($id);
        $tanggapan = Tanggapan::where('id_pengaduan', $id)->get();

        return view('pages.admin.tanggapan.detail', [
            'data'=> $data,
            'tanggapan' => $tanggapan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, String $id)
    {
        Tanggapan::create([
            'id_petugas' => Auth::guard('petugas')->user()->id,
            'id_pengaduan' => $id,
            'tanggapan' => $request->tanggapan,
            'tgl_tanggapan' => Carbon::today(),
        ]);

        Pengaduan::findOrFail($id)->update([
            'status' => 'Sudah Ditanggapi',
        ]);

        return redirect()->route('detail-aduan-masyarakat', $id)->with('success','Tanggapan Berhasil Dikirim');
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
        $item = Pengaduan::findOrFail($id);

        $item->delete();

        return redirect()->route('admin-index');
    }
}
