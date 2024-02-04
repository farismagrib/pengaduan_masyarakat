@extends('layouts.dashboard')

@section('page-contents')
    <!-- Page Heading -->
    <div class="d-sm-flex flex-column mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $data->judul }}</h1>
        <div class="text mt-2 ">
            Dilaporkan Oleh : {{ $data->masyarakat->nama }}</div>
        <div class="text mt-2 ">
            {{ $data->tanggal_pengaduan }}</div>
        @if (session()->has('success'))
            <div class="alert alert-success MT-4">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>

    <div class="d-flex flex-column card py-5 px-4">
        <div class="w-100">
            <img src="{{ Storage::url($data->foto) }}" class="w-50 mx-auto d-block" alt="">
        </div>
        <div class="mt-5 w-100">
            {!! $data->isi_laporan !!}
        </div>
        <a href="{{ route('aduan-masyarakat') }}" class="btn btn-warning w-100 my-3">Kembali</a>
        <form action="{{ route('hapus-aduan', $data->id) }}" method="POST" class="w-100">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger w-100"><i
                    class="fa-solid fa-trash-can"></i></button>
        </form>
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

    <div class="d-flex flex-column card py-5 px-4">
        <div class="h4 font-weight-bold">Beri Tanggapan</div>
        <form action="{{ route('kirim-tanggapan', $data->id) }}" method="POST">
            @csrf
            <div class="form-group mb-5">
                <textarea id="tanggapan" class="form-control" name="tanggapan"></textarea>
            </div>
            <button type="submit" class="btn btn-success w-100">Kirim Tanggapan</button>
        </form>
    </div>
@endsection

@push('addon-script')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#tanggapan'), {
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
