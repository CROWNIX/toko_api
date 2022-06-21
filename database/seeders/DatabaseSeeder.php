<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Registrasi;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Registrasi::create([
            "nama" => "admin toko",
            "email" => "admintoko@gmail.com",
            "role" => "admin",
            "password" => Hash::make("123456")
        ]);

        Registrasi::create([
            "nama" => "syahrul",
            "email" => "syahrul@gmail.com",
            "role" => "member",
            "password" => Hash::make("123456")
        ]);
    }
}
