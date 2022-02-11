<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investasi extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'proyek_id', 'total_pembiayaan'];

    public function investor(){
        return $this->belongsTo(User::class);
    }

    public function proyek(){
        return $this->belongsTo(Proyek::class);
    }
}
