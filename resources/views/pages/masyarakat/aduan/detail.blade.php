@extends('layouts.dashboard')

@section('page-contents')
    <!-- Page Heading -->
    <div class="d-sm-flex flex-column mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $data->judul }}</h1>
        <div class="text mt-2 ">
            Dilaporkan Oleh : {{ $data->masyarakat->nama }}</div>
        <div class="text mt-2 ">
            {{ $data->tanggal_pengaduan }}</div>
    </div>

    <div class="d-flex flex-column card py-5 px-4">
        <div class="w-100">
            <img src="{{ Storage::url($data->foto) }}" class="w-50 mx-auto d-block" alt="">
        </div>
        <div class="mt-5 w-100">
            {!! $data->isi_laporan !!}
        </div>
        <a href="{{ route('semua-aduan') }}" class="btn btn-warning w-100 mt-3">Kembali</a>
    </div>

    <div class="d-flex flex-column my-5">
        <div class="h4 font-weight-bold">Tanggapan</div>
        @foreach ($tanggapan as $item)
            <div class="card w-100 d-flex flex-column mb-5 py-3 px-4">
                <div class="h5 font-weight-bold" style="color: black">{{ $item->petugas->nama_petugas }}</div>
                <p class="mb-4">{{ $item->tgl_tanggapan }}</p>
                <div class="w-100" style="color: black">
                    {!! $item->tanggapan !!}
                </div>
            </div>
        @endforeach
    </div>
@endsection
