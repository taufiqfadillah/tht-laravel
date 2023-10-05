<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori' => 'required',
            'namabarang' => 'required|string|max:255',
            'hargabeli' => 'required|numeric',
            'hargajual' => 'required|numeric',
            'stokbarang' => 'required|integer',
            'image' => 'required|image|mimes:png,jpg|max:100',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/assets/produk-images');
            $imageName = basename($imagePath);
            $data['image'] = $imageName;
        }

        Produk::create($data);

        return redirect()->back()->with('success', 'Produk berhasil disimpan!');
    }

    public function edit($id)
    {
        $produk = \App\Models\Produk::find($id);

        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        return view('dashboard.edit-product', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return redirect()->route('index')->with('error', 'Produk tidak ditemukan.');
        }

        $data = $request->validate([
            'kategori' => 'required',
            'namabarang' => 'required|string|max:255',
            'hargabeli' => 'required|numeric',
            'hargajual' => 'required|numeric',
            'stokbarang' => 'required|integer',
            'image' => 'image|mimes:png,jpg|max:100',
        ]);

        $produk->kategori = $data['kategori'];
        $produk->namabarang = $data['namabarang'];
        $produk->hargabeli = $data['hargabeli'];
        $produk->hargajual = $data['hargajual'];
        $produk->stokbarang = $data['stokbarang'];

        if ($request->hasFile('image')) {
            if ($produk->image) {
                $imagePath = storage_path('app/public/assets/produk-images/' . $produk->image);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }

            $imagePath = $request->file('image')->store('public/assets/produk-images');
            $imageName = basename($imagePath);

            $produk->image = $imageName;
        }

        $produk->save();

        return redirect()->route('index')->with('success', 'Produk berhasil diupdate');
    }

    public function delete($id)
    {
        $produk = \App\Models\Produk::find($id);

        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        if ($produk->image) {
            Storage::delete('public/assets/produk-images/' . $produk->image);
        }

        $produk->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus.');
    }
}
