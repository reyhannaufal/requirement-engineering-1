<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiProyek extends Model
{
    use HasFactory;

    protected $fillable = ['proyek_id', 'total_penjualan', 'pemasukan_kotor', 'pemasukan_bersih'];

    public function proyek(){
        return $this->belongsTo(Proyek::class);
    }
}
