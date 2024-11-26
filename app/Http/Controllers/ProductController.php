<?php

namespace App\Http\Controllers;

use App\Models\Produk; // Import model Produk
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan daftar produk di index
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');

        // Mencari produk berdasarkan merk atau kategori
        $produk = Produk::query()
            ->when($searchTerm, function ($queryBuilder) use ($searchTerm) {
                $queryBuilder->where('merk', 'LIKE', "%{$searchTerm}%")
                             ->orWhere('kategori', 'LIKE', "%{$searchTerm}%");
            })
            ->get();

        return view('produk.index', compact('produk')); // Menampilkan daftar produk di index
    }

    // Menampilkan form untuk tambah produk
    public function create()
    {
        return view('produk.add');
    }

    // Menyimpan data produk baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'kategori' => 'required|string',
            'merk' => 'required|string|max:150',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Menyimpan foto jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('produk', 'public');
            $validated['foto'] = $fotoPath;
        }

        // Menyimpan data produk ke database
        Produk::create($validated);

        // Kembali ke halaman index dengan pesan sukses
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Menampilkan form edit produk
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    // Menyimpan perubahan setelah edit
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'kategori' => 'required|string',
            'merk' => 'required|string|max:150',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $produk = Produk::findOrFail($id);

        // Menyimpan foto baru jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('produk', 'public');
            $validated['foto'] = $fotoPath;
        }

        // Update data produk
        $produk->update($validated);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diedit');
    }

    // Menghapus produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus');
    }
}
