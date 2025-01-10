<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LokasiBidang;
use App\Models\DetailLokasiBidang;

class LokasiBidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasiBidangs = LokasiBidang::all();
        return view('pages.Data-maps.index', compact('lokasiBidangs'));
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
            'bidang' => 'required|string|max:255',
            'blok' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255',
            'luas_lahan' => 'required|integer',
            'atas_hak' => 'required|string|max:255',
            'tanggal_transaksi' => 'required|date',
        ]);

        LokasiBidang::create($validated);

        return redirect()->route('data-lahan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Ambil data lokasi bidang berdasarkan ID
        $lokasiBidang = LokasiBidang::findOrFail($id);
    
        $detail_lahan = DetailLokasiBidang::where('id_lokasi_bidangs', $id)->get();
    
        return view('pages.data-maps.show', compact('lokasiBidang', 'detail_lahan'));
    }

    public function edit($id)
    {
        $lokasiBidang = LokasiBidang::findOrFail($id);
        return view('pages.data-maps.edit', compact('lokasiBidang'));
    }

    // Memperbarui data Lokasi Bidang
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'lokasi_bidang' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
            'blok' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255',
            'luas_lahan' => 'required|numeric',
            'atas_hak' => 'required|string|max:255',
            'tanggal_transaksi' => 'required|date',
        ]);

        $lokasiBidang = LokasiBidang::findOrFail($id);
        $lokasiBidang->update($validated);

        return redirect()->route('data-lahan.index')->with('success', 'Data berhasil diperbarui');
    }

    // Menghapus data Lokasi Bidang
    public function destroy($id)
    {
        // hapus titik lokasi


        $lokasiBidang = LokasiBidang::findOrFail($id);
        $lokasiBidang->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function titik_lokasi() {
        return view('pages.data-maps.maps');
    }

    public function json() {
        $titik_lokasi = LokasiBidang::with('detail_lokasi')->get();
        return response()->json($titik_lokasi);
    }

    // public function json($id) {
    //     $titik_lokasi = LokasiBidang::with('detail_lokasi')->get();
    //     return response()->json($titik_lokasi);
    // }
    
}
