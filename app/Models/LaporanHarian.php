<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanHarian extends Model
{
    use HasFactory;
    
    protected $table = "laporan_harian";

    protected $guarded = [];

    public function kategori(){

        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function user(){

        return $this->belongsTo(User::class, 'user_id');
    }

    public function divisi() {

        return $this->belongsTo(Divisi::class, 'divisi_id');
    }

    public function tugas(){

        return $this->belongsTo(Tugas::class , 'tugas_id');
    }

}
