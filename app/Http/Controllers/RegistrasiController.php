<?php

namespace App\Http\Controllers;

use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller{
    public function registrasi(Request $request){
        $nama = $request->input("nama");
        $email = $request->input("email");
        $password = Hash::make($request->input("password"));

        Registrasi::create([
            "nama" => $nama,
            "email" => $email,
            "password" => $password
        ]);

        return $this->responseHasil(200, true, "Registrasi Berhasil");
    }
}