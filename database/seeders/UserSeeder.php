<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "nama" => "admin",
            "jenis_kelamin" => "laki-laki",
            "tempat_lahir" => "Surabaya",
            "tanggal_lahir" => date("Ymd", strtotime("1999-06-20")),
            "alamat" => "Siwalankerto, Surabaya",
            "level" => "admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make("admin")
        ]);
    }
}
