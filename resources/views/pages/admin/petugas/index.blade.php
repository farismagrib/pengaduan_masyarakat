@extends('layouts.dashboard')

@section('page-contents')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Petugas</h1>

    </div>

    <div class="card w-100 py-5 px-4">
        <a href="{{ route('tambah-petugas') }}" class="btn btn-primary mb-5">Tambah Data Petugas</a>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead style="color: black">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="white-space: nowrap">Nama</th>
                        <th scope="col" style="white-space: nowrap">Username</th>
                        <th scope="col" style="white-space: nowrap">No Telp</th>
                        <th scope="col" style="white-space: nowrap">Level</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td style="white-space: nowrap">{{ $item->nama_petugas }}</td>
                            <td style="white-space: nowrap">{{ $item->username }}</td>
                            <td style="white-space: nowrap">{{ $item->telp }}</td>
                            <td style="white-space: nowrap">{{ $item->level }}</td>
                            <td class="w-25">
                                <div class="d-flex">
                                    <div class="w-50 mx-2 ">
                                        <a href="{{ route('edit-petugas', $item->id) }}"
                                            class="btn btn-sm btn-warning  w-100"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                    </div>
                                    <div class="w-50 mx-2">
                                        <button type="button" class="btn btn-sm btn-danger w-100" data-toggle="modal"
                                            data-target="#hapusModal" data-id="">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>

                                </div>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog"
                            aria-labelledby="hapusModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus Petugas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <form id="delete-form" method="POST"
                                            action="{{ route('hapus-petugas', $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
