<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Petugas extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory;
    use Authenticatable;
    use Notifiable;
    
    // Inisialisasi Table Yang Digunakan
    protected $table = 'petugas';

    //Insialisasi Kolom
    protected $fillable = [
        'nama_petugas',
        'username',
        'password',
        'telp',
        'level'
    ];

    protected $hidden = [

    ];

    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class, 'id_petugas', 'id');
    }
        
}
