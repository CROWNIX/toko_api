<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Registrasi;

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
            "nama" => "syahrul",
            "email" => "syahrul@gmail.com",
            "role" => "admin",
            "password" => "123456"
        ]);

        Registrasi::create([
            "nama" => "yesi",
            "email" => "yesi@gmail.com",
            "role" => "member",
            "password" => "123456"
        ]);
    }
}