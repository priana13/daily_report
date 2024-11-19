<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    
    protected $table = "tugas";

    protected $guarded = [];

    public function kategori(){

        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function divisi(){

        return $this->belongsTo(Divisi::class, 'divisi_id');
    }

}
