@extends('layouts.dashboard')

@section('page-contents')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Aduan Anda</h1>
        <a href="{{ route('buat-aduan') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Buat Aduan</a>

    </div>

    <!-- Content Row -->
    <div class="row">
        @if (session()->has('success'))
            <div class="w-100 alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <!-- Earnings (Monthly) Card Example -->
        @foreach ($data as $item)
            <div class="col-xl-12 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <a class="card-body" href="{{ route('detail-aduan', $item->id) }}" style="text-decoration: none">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $item->judul }}</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    {{ $item->status }}</div>
                            </div>
                            <div class="col-auto">
                                <div class="d-flex flex-column align-items-center">
                                    <img src="{{ Storage::url($item->foto) }}" alt="" class="h-100"
                                        style="width: 75px">

                                    <div class="text-xs mt-2 ">
                                        {{ $item->tanggal_pengaduan }}</div>
                                </div>

                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach


    </div>
@endsection
