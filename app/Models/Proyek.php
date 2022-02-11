<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $fillable = ['nama',
        'deskripsi',
        'foto_produk',
        'waktu_pengerjaan_proyek_mulai',
        'waktu_pengerjaan_proyek_berakhir',
        'dana_dibutuhkan',
        'tanggal_pendanaan_dibuka',
        'tanggal_pendanaan_ditutup',
        'dana_terkumpul',
        'akad_id'];

    public function akad()
    {
        return $this->belongsTo(Akad::class);
    }

    public function transaksi(){
        return $this->hasMany(TransaksiProyek::class);
    }

    public function investasi(){
        return $this->hasMany(Investasi::class);
    }
}
