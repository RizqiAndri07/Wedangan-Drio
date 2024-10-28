<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $produk = Product::all();
        return view("produk.index",compact('produk'));
    }
      public function add()
    {
        return view('produk.add'); // Sesuaikan dengan view 'add'
    }

    public function submit(Request $request)
    {
        // Validasi data inputan
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori' => 'required|string',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // Validasi gambar
        ]);

        // Simpan file gambar
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public'); // Simpan di folder storage/app/public/images
        }

        // Simpan data ke database
        Product::create([
            'nama_produk' => $request->nama_produk,
            'kategori' => $request->kategori,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'gambar' => $path, // Path gambar yang disimpan
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }
   function update(Request $request, $id)
{
    // Validasi data inputan
    $validatedData = $request->validate([
        'nama_produk' => 'required|string|max:255',
        'kategori' => 'required|string',
        'harga_beli' => 'required|numeric',
        'harga_jual' => 'required|numeric',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Gambar tidak wajib di-update
    ]);

    $produk = Product::find($id);

    // Jika ada gambar yang di-upload, proses gambar
    if ($request->hasFile('gambar')) {
        // Simpan file gambar baru
        $path = $request->file('gambar')->store('images', 'public');
        // Update dengan gambar baru
        $produk->gambar = $path;
    }

    // Update data lainnya
    $produk->nama_produk = $request->nama_produk;
    $produk->kategori = $request->kategori;
    $produk->harga_beli = $request->harga_beli;
    $produk->harga_jual = $request->harga_jual;

    // Simpan perubahan
    $produk->save();

    return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
}

    function delete($id){
        Product::find($id)->delete();
        return redirect()->route('produk.index')->with('success','');
    }

   
}

