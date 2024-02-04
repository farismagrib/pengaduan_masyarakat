@extends('layouts.dashboard')

@section('page-contents')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="d-flex card py-5 px-4">
        <form action="{{ route('kirim-aduan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-5">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul">
            </div>
            <div class="form-group mb-5">
                <label>Deskripsi</label>
                <textarea id="isi_laporan" class="form-control" name="isi_laporan"></textarea>
            </div>
            <div class="form-group mb-5">
                <label for="judul" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            <button type="submit" class="btn btn-primary w-100">Kirim</button>
        </form>
        <a href="{{ route('masyarakat-index') }}" class="btn btn-warning w-100 mt-3">Kembali</a>
    </div>
@endsection

@push('addon-script')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#isi_laporan'), {
                // toolbar: ['heading', '|', 'bold', 'italic', 'link']
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(err => {
                console.error(err.stack);
            });
    </script>
@endpush
