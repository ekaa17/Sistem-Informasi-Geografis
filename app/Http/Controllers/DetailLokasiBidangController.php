<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailLokasiBidang;
use Illuminate\Routing\Controller;

class DetailLokasiBidangController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'id_lokasi_bidangs' => 'required|exists:lokasi_bidangs,id',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Simpan data ke dalam database
        $detailLokasiBidang = new DetailLokasiBidang();
        $detailLokasiBidang->id_lokasi_bidangs = $request->id_lokasi_bidangs;
        $detailLokasiBidang->latitude = $request->latitude;
        $detailLokasiBidang->longitude = $request->longitude;
        $detailLokasiBidang->save();

        // Redirect dengan notifikasi sukses
        return redirect()->back()->with('success', 'Data detail lokasi bidang berhasil disimpan.');
    }

    public function destroy($id)
    {
        // Cari data berdasarkan ID
        $detailLokasiBidang = DetailLokasiBidang::findOrFail($id);

        // Hapus data
        $detailLokasiBidang->delete();

        // Redirect dengan notifikasi sukses
        return redirect()->back()->with('success', 'Data detail lokasi bidang berhasil dihapus.');
    }
}
