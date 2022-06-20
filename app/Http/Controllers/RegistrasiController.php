<?php

namespace App\Http\Controllers;

use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    public function registrasi(Request $request)
    {
        $nama = $request->input("nama");
        $email = $request->input("email");
        $password = Hash::make($request->input("password"));

        try {
            Registrasi::create([
                "nama" => $nama,
                "email" => $email,
                "password" => $password
            ]);
        } catch (\Exception $e) {
            return $this->responseHasil(500, false, $e->getPrevious()->getMessage());
        }

        return $this->responseHasil(200, true, "Registrasi Berhasil");
    }
}
