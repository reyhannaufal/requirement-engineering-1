<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akad extends Model
{
    use HasFactory;
    protected $fillable=['nama','perhitungan'];

    public function proyek(){
        return $this->hasMany(Proyek::class);
    }
}
