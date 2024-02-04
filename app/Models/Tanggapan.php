<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    protected $table = 'tanggapan';

    protected $fillable = [
        'id_petugas',
        'id_pengaduan',
        'tanggapan',
        'tgl_tanggapan',
    ];

    protected $hidden = [

    ];

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas', 'id');
    }
}
