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
                                    <th>Nama Lokasi</th>
                                    <th>blok </th>
                                    <th>Bidang </th>
                                    <th>Nama Pemilik</th>
                                    <th>Luas Lahan (m²)</th>
                                    <th>Atas Hak</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $lokasiBidang->lokasi_bidang }}</td>
                                    <td>{{ $lokasiBidang->blok }}</td>
                                     <td>{{ $lokasiBidang->Bidang }}</td>
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
                <a href="{{ route('data-lahan.index') }}" class="btn btn-primary">
                    kembali ke halaman penawaran harga
                </a>
            </div>

            <div class="col-xl-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between m-3">
                            <h5 class="card-title">Total Detail:  Koordinat</h5>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDetail">
                                <i class="bi bi-plus"></i> Tambah Detail
                            </button>
                        </div>

                        <div class="modal fade" id="tambahDetail" tabindex="-1" aria-labelledby="tambahDetailLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambahDetailLabel">Tambah Detail Lokasi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('detail-lahan.store') }}" method="POST">
                                            @csrf
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
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detail_lahan as $index => $detail)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $detail->latitude }}</td>
                                            <td>{{ $detail->longitude }}</td>
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
                                                                <h5 class="modal-title" id="deleteModalLabel{{ $detail->id }}">Hapus Data Lokasi</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Apakah Anda yakin ingin menghapus data lokasi dengan koordinat:
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
