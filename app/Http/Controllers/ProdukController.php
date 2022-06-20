<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use illuminate\Http\Request;

class ProdukController extends Controller
{
    public function create(Request $request)
    {
        $kodeProduk = request("kode_produk");
        $namaProduk = request("nama_produk");
        $harga = request("harga");
        $deskripsi = request("deskripsi");
        $kategori = request("kategori");
        $fileName = request("gambar_produk");

        try {
            $produk = Produk::create([
                "kode_produk" => $kodeProduk,
                "nama_produk" => $namaProduk,
                "harga" => $harga,
                "deskripsi" => $deskripsi,
                "kategori" => $kategori,
                "gambar_produk" => $fileName
            ]);
        } catch (\Exception $e) {
            return $this->responseHasil(500, false, $e->getPrevious()->getMessage());
        }

        return $this->responseHasil(200, true, $produk);
    }

    public function list()
    {
        try {
            $produk = Produk::all();
        } catch (\Exception $e) {
            return $this->responseHasil(500, false, $e->getPrevious()->getMessage());
        }

        return $this->responseHasil(200, true, $produk);
    }

    public function show($id)
    {
        try {
            $produk = Produk::findOrFail($id);
        } catch (\Exception $e) {
            return $this->responseHasil(500, false, $e->getPrevious()->getMessage());
        }

        return $this->responseHasil(200, true, $produk);
    }

    public function update(Request $request, $id)
    {
        $kodeProduk = request("kode_produk");
        $namaProduk = request("nama_produk");
        $harga = request("harga");
        $deskripsi = request("deskripsi");
        $kategori = request("kategori");
        $fileName = request("gambar_produk");

        try {
            $produk = Produk::findOrFail($id);
        } catch (\Exception $e) {
            return $this->responseHasil(500, false, $e->getPrevious()->getMessage());
        }
        $result = $produk->update([
            "kode_produk" => $kodeProduk,
            "nama_produk" => $namaProduk,
            "harga" => $harga,
            "deskripsi" => $deskripsi,
            "kategori" => $kategori,
            "gambar_produk" => $fileName
        ]);

        return $this->responseHasil(200, true, $result);
    }

    public function delete($id)
    {
        $produk = Produk::findOrFail($id);
        $delete = $produk->delete();
        try {
            return $this->responseHasil(200, true, $delete);
        } catch (\Exception $e) {
            return $this->responseHasil(500, false, $e->getPrevious()->getMessage());
        }
    }
}
