<?php

namespace App\Http\Controllers;

use App\Models\LokasiBidang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LokasiBidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasiBidangs = LokasiBidang::all();
        return view('pages.data-maps.index', compact('lokasiBidangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.data-maps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'lokasi_bidang' => 'required|string|max:255',
            'nama_bidang' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'luas_lahan' => 'required|integer',
            'atas_hak' => 'required|string|max:255',
            'tanggal_transaksi' => 'required|date',
        ]);

        LokasiBidang::create($validated);

        return redirect()->route('data-maps.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lokasiBidang = LokasiBidang::findOrFail($id);
        return view('data-maps.edit', compact('lokasiBidang'));
    }

    // Memperbarui data Lokasi Bidang
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'lokasi_bidang' => 'required|string|max:255',
            'nama_bidang' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'luas_lahan' => 'required|numeric',
            'atas_hak' => 'required|string|max:255',
            'tanggal_transaksi' => 'required|date',
        ]);

        $lokasiBidang = LokasiBidang::findOrFail($id);
        $lokasiBidang->update($validated);

        return redirect()->route('data-maps.index')->with('success', 'Data berhasil diperbarui');
    }

    // Menghapus data Lokasi Bidang
    public function destroy($id)
    {
        $lokasiBidang = LokasiBidang::findOrFail($id);
        $lokasiBidang->delete();

        return redirect()->route('data-maps.index')->with('success', 'Data berhasil dihapus');
    }
}
