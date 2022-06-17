<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use illuminate\Http\Request;

class ProdukController extends Controller{
    public function create(Request $request){
        $kodeProduk = request("kode_produk");
        $namaProduk = request("nama_produk");
        $harga = request("harga");

        if($request->hasFile("gambar_produk")){
            $fileName = $request->file("gambar_produk")->getClientOriginalName();
            $request->file("gambar_produk")->move("uploads", $fileName);
        }
        
        $produk = Produk::create([
            "kode_produk" => $kodeProduk,
            "nama_produk" => $namaProduk,
            "harga" => $harga,
            "gambar_produk" => $fileName
        ]);

        return $this->responseHasil(200, true, $produk);
    }

    public function list(){
        $produk = Produk::all();

        return $this->responseHasil(200, true, $produk);
    }

    public function show($id){
        $produk = Produk::findOrFail($id);

        return $this->responseHasil(200, true, $produk);
    }

    public function update(Request $request, $id){
        $kodeProduk = request("kode_produk");
        $namaProduk = request("nama_produk");
        $harga = request("harga");
        $gambarProduk = request("gambar_produk");

        $produk = Produk::findOrFail($id);
        $result = $produk->update([
            "kode_produk" => $kodeProduk,
            "nama_produk" => $namaProduk,
            "harga" => $harga,
            "gambar_produk" => $gambarProduk
        ]);

        return $this->responseHasil(200, true, $result);
    }

    public function delete($id){
        $produk = Produk::findOrFail($id);
        $delete = $produk->delete();

        return $this->responseHasil(200, true, $delete);
    }
}