@extends('layouts.dashboard')

@section('page-contents')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Petugas</h1>
    </div>

    <div class="d-flex card py-5 px-4">
        <form action="{{ route('simpan-petugas') }}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group mb-3 col-12">
                    <label for="nama_petugas" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" required>
                </div>
                <div class="form-group mb-3 col-6">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group mb-3 col-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group mb-3 col-6">
                    <label for="telp" class="form-label">No Telp</label>
                    <input type="text" class="form-control" id="telp" name="telp" required>
                </div>
                <div class="form-group mb-3 col-6">
                    <label for="level" class="form-label">Level</label>
                    <select id="level" name="level" class="form-select form-control" required>
                        <option value="ADMIN">ADMIN</option>
                        <option value="PETUGAS">PETUGAS</option>
                    </select>
                </div>
            </div>


            <button type="submit" class="btn btn-primary w-100 mt-3">Tambah</button>
        </form>
        <a href="{{ route('data-petugas') }}" class="btn btn-warning w-100 mt-3">Kembali</a>
    </div>
@endsection
