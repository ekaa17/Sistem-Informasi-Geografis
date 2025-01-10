@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Detail Lokasi Bidang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Detail Lokasi Bidang</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12 mt-3">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            <div class="col-xl-12 mt-3">
                <div class="card">
                    <div class="card-body pt-3">
                        <table class="table table-bdetailed">
                            <thead>
                                <tr>
                                    <th>Lokasi</th>
                                    <th>Blok </th>
                                    <th>Bidang </th>
                                    <th>Pemilik</th>
                                    <th>Luas Lahan (m²)</th>
                                    <th>Atas Hak</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $lokasiBidang->lokasi_bidang }}</td>
                                    <td>{{ $lokasiBidang->blok }}</td>
                                     <td>{{ $lokasiBidang->bidang }}</td>
                                        <td>{{ $lokasiBidang->nama_pemilik }}</td>
                                        <td>{{ $lokasiBidang->luas_lahan }} m²</td>
                                        <td>{{ $lokasiBidang->atas_hak }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="d-flex justify-content-center align-items-center my-2">
                <a href="{{ route('data-lahan.index') }}" class="btn btn-outline-secondary">
                    kembali ke halaman data lahan
                </a>
            </div>

            <div class="col-xl-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-end my-4">
                            {{-- <h5 class="card-title">Total Detail:  Koordinat</h5> --}}
                            <button type="button" class="btn btn-primary text-end" data-bs-toggle="modal" data-bs-target="#tambahDetail">
                                <i class="bi bi-plus"></i> Tambah Titik Lokasi
                            </button>
                        </div>

                        <div class="modal fade" id="tambahDetail" tabindex="-1" aria-labelledby="tambahDetailLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahDetailLabel">Tambah Detail Lokasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('detail-lahan.store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="id_lokasi_bidangs" value="{{ $lokasiBidang->id }}">
                                            <div class="row mb-3">
                                                <label for="latitude" class="col-md-4 col-lg-3 col-form-label">Latitude</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude" value="{{ old('latitude') }}">
                                                    @error('latitude')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="longitude" class="col-md-4 col-lg-3 col-form-label">Longitude</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude" value="{{ old('longitude') }}">
                                                    @error('longitude')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @if (count($detail_lahan) != 0)
                            <div class="table-responsive my-3">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Longitude</th>
                                            <th>Latitude</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detail_lahan as $index => $detail)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $detail->longitude }}</td>
                                                <td>{{ $detail->latitude }}</td>
                                                <td>
                                                    <!-- Tombol Hapus -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $detail->id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                
                                                    <!-- Modal Hapus -->
                                                    <div class="modal fade" id="deleteModal{{ $detail->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $detail->id }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel{{ $detail->id }}">Hapus Titik Lokasi</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    Apakah Anda yakin ingin menghapus data lokasi dengan koordinat: <br>
                                                                    <strong>Latitude: {{ $detail->latitude }}, Longitude: {{ $detail->longitude }}</strong>?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{ route('detail-lahan.destroy', $detail->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                                    </form>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <p class="my-3 fw-bold">
                                    Preview : 
                                </p>
                                <div id="map" style="width: 100%; height: 750px;"></div>

                                <script>
                                    const map = L.map('map').setView([-6.0106218, 106.0316497], 18);
                                
                                    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                        maxZoom: 19,
                                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                                    }).addTo(map);
                                
                                    $(document).ready(function () {
                                        // Ambil data dari server
                                        $.getJSON('/data-titik', function (data) {
                                            data.forEach(function (item) {
                                                // Ambil koordinat untuk membentuk poligon
                                                const coordinates = item.detail_lokasi.map(coord => [
                                                    coord.latitude,
                                                    coord.longitude,
                                                ]);
                                
                                                // Tentukan warna berdasarkan ID bidang
                                                const color = item.id === {{ $lokasiBidang->id }} ? 'red' : 'blue';
                                
                                                // Buat poligon dan tambahkan ke peta
                                                const polygon = L.polygon(coordinates, { color: color }).addTo(map);
                                
                                                // Isi popup dengan data dari item
                                                const popupContent = `
                                                    <b>Lokasi Bidang:</b> ${item.lokasi_bidang}<br>
                                                    <b>Blok:</b> ${item.blok}<br>
                                                    <b>Bidang:</b> ${item.bidang}<br>
                                                    <b>Pemilik:</b> ${item.nama_pemilik}<br>
                                                    <b>Luas Lahan:</b> ${item.luas_lahan} m²<br>
                                                    <b>Atas Hak:</b> ${item.atas_hak}<br>
                                                    <b>Tanggal Transaksi:</b> ${item.tanggal_transaksi}<br>
                                                `;
                                
                                                // Tambahkan popup ke poligon
                                                polygon.bindPopup(popupContent);
                                
                                                // Event klik untuk membuka popup
                                                polygon.on('click', function () {
                                                    this.openPopup();
                                                });
                                            });
                                        });
                                    });
                                </script>
                                
                            </div>
                        @else
                            <div class="row justify-content-center align-items-center p-5">
                                <div class="col-12 text-center">
                                    Titik Lokasi Belum Ditentukan
                                </div>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
