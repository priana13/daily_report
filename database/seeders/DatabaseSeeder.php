<?php

namespace Database\Seeders;

use App\Models\Divisi;
use App\Models\Kategori;
use App\Models\Tugas;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $divisions = ["Front End", "Back End" , "Content" , "IT Support"];        

        foreach ($divisions as $key => $value) {

            Divisi::create([
                "nama" => $value
            ]);

        }               


        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'level' => "Manajer",
            'divisi_id' => 1,
            'password' => Hash::make('password')
        ]);

      
        Kategori::create([
            "title" => "Backup"
        ]);       

        Tugas::create([

            "judul" => "Tugas Harian",
            "kategori_id" => 1,
            "divisi_id" => 1
        ]);

    }
}
