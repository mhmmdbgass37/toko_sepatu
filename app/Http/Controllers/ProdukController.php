<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::get();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        return view('produk.from');
    }

    public function simpan(Request $request)
    {

        // ddd($request);
        // return $request->file('gambar')->store('post-img');

        $request->validate(
            [
                'gambar' => 'image|mimes:jpg,jpeg,png,gif|max:1024',
                'nama_produk' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
            ],
            [
                'gambar.mimes' => 'file yg anda uploade bukan gambar',
                'gambar.max' => 'harus',
            ]
        );

        // cek gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar_nama = $gambar->hashName();
            
        }


        $produk = Produk::create($request->all());
        return redirect()->route('produk')->with('success', 'Data barang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $produk = Produk::find($id)->first();
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        dd('Product ID: ' . $id, $request->all());
        $request->validate(
            [
                'gambar' => 'mimes:jpg,jpeg,png,gif|max:2019',
                'nama_produk' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
            ],
            [
                'gambar.mimes' => 'File yang Anda upload bukan gambar',
                'gambar.max' => 'Ukuran gambar maksimal 2019 kilobytes',
            ]
        );

        $produk = Produk::find($id);
        if (!$produk) {
            return redirect()->route('produk')->with('error', 'Produk tidak ditemukan');
        }

        // Handle file upload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($produk->gambar && file_exists(public_path('img/' . $produk->gambar))) {
                unlink(public_path('img/' . $produk->gambar));
            }

            $gambar = $request->file('gambar');
            $gambar_nama = $gambar->hashName();
            $gambar->move(public_path('img'), $gambar_nama);
            $produk->gambar = $gambar_nama;
        }

        // Update the product
        $produk->nama_produk = $request->nama_produk;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->save();

        return redirect()->route('produk')->with('success', 'Data barang berhasil diupdate');
    }

    public function delete($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect()->route('produk')->with('success', 'Data barang berhasil dihapus');
    }
}
