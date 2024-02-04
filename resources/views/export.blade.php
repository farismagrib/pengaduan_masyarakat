<table>
    <thead>
    <tr>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>Foto</th>
        <th>Tanggal Pengaduan</th>
        <th>Keterangan</th>
    </tr>
    </thead>
    <tbody>
        @foreach($pengaduan as $pengaduan)
        <tr>
            <td>{{ $pengaduan->judul }}</td>
            <td>{!!$pengaduan->isi_laporan !!}</td>
            <td>{{ $pengaduan->foto }}</td>
            <td>{{ $pengaduan->tanggal_pengaduan }}</td>
            <td>{{ $pengaduan->status }}</td>
            
        </tr>
    @endforeach
    </tbody>
</table>