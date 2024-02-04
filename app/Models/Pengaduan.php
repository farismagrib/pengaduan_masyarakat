<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    
    protected $fillable = [
        'nik',
        'judul',
        'isi_laporan',
        'foto',
        'tanggal_pengaduan',
        'status',
    ];

    protected $hidden = [

    ];

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'nik', 'nik');
    }
}
