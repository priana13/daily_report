<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    
    protected $table = "kategori";

    protected $guarded = [];

    public function tugas(){

        return $this->hasMany(Tugas::class, 'kategori_id');
    }

    public function laporan_harian(){

        return $this->hasMany(LaporanHarian::class, 'kategori_id');
    }

}
