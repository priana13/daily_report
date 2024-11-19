<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = "divisi";

    protected $guarded = [];

    public function users(){

        return $this->hasMany(User::class, 'divisi_id');
    }
}
