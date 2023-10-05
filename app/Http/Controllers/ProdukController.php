<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

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
}
