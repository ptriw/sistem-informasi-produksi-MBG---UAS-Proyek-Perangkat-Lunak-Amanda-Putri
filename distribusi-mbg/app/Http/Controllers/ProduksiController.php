<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProduksiController extends Controller
{
    /**
     * Tampilkan daftar data produksi dengan pagination.
     * Menggunakan paginate(10) agar ringan dan tidak crash saat data membengkak.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $produksis = Produksi::when($search, function ($query, $search) {
                $query->where('kode_produksi', 'like', "%{$search}%")
                      ->orWhere('nama_barang', 'like', "%{$search}%")
                      ->orWhere('status', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('produksi.index', compact('produksis', 'search'));
    }

    /**
     * Tampilkan form tambah data produksi.
     */
    public function create()
    {
        $kode = 'PRD-' . strtoupper(Str::random(6));
        return view('produksi.create', compact('kode'));
    }

    /**
     * Simpan data produksi baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_produksi'    => 'required|string|max:50|unique:produksis,kode_produksi',
            'nama_barang'      => 'required|string|max:255',
            'jumlah_produksi'  => 'required|integer|min:1',
            'tanggal_produksi' => 'required|date',
            'status'           => 'required|in:Planning,On Progress,Done',
        ], [
            'kode_produksi.required'    => 'Kode produksi wajib diisi.',
            'kode_produksi.unique'      => 'Kode produksi sudah digunakan.',
            'nama_barang.required'      => 'Nama barang wajib diisi.',
            'jumlah_produksi.required'  => 'Jumlah produksi wajib diisi.',
            'jumlah_produksi.min'       => 'Jumlah produksi minimal 1.',
            'tanggal_produksi.required' => 'Tanggal produksi wajib diisi.',
            'status.required'           => 'Status wajib dipilih.',
            'status.in'                 => 'Status tidak valid.',
        ]);

        Produksi::create($validated);

        return redirect()->route('produksi.index')
                         ->with('success', 'Data produksi berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit data produksi.
     */
    public function edit(Produksi $produksi)
    {
        return view('produksi.edit', compact('produksi'));
    }

    /**
     * Perbarui data produksi di database.
     */
    public function update(Request $request, Produksi $produksi)
    {
        $validated = $request->validate([
            'kode_produksi'    => 'required|string|max:50|unique:produksis,kode_produksi,' . $produksi->id,
            'nama_barang'      => 'required|string|max:255',
            'jumlah_produksi'  => 'required|integer|min:1',
            'tanggal_produksi' => 'required|date',
            'status'           => 'required|in:Planning,On Progress,Done',
        ], [
            'kode_produksi.required'    => 'Kode produksi wajib diisi.',
            'kode_produksi.unique'      => 'Kode produksi sudah digunakan.',
            'nama_barang.required'      => 'Nama barang wajib diisi.',
            'jumlah_produksi.required'  => 'Jumlah produksi wajib diisi.',
            'jumlah_produksi.min'       => 'Jumlah produksi minimal 1.',
            'tanggal_produksi.required' => 'Tanggal produksi wajib diisi.',
            'status.required'           => 'Status wajib dipilih.',
            'status.in'                 => 'Status tidak valid.',
        ]);

        $produksi->update($validated);

        return redirect()->route('produksi.index')
                         ->with('success', 'Data produksi berhasil diperbarui.');
    }

    /**
     * Hapus data produksi dari database.
     */
    public function destroy(Produksi $produksi)
    {
        $produksi->delete();

        return redirect()->route('produksi.index')
                         ->with('success', 'Data produksi berhasil dihapus.');
    }
}
