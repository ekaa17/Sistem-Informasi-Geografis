@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Data Lahan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Data Lahan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">
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

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="d-flex align-items-center justify-content-between m-3">
                            <h5 class="card-title">Total : Lahan</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Data Baru
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table datatable" id="pegawai">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Lokasi Bidang</th>
                                        <th>Nama Bidang</th>
                                        <th>Nama Pemilik</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Luas Lahan (m²)</th>
                                        <th>Atas Hak</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Aksi</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @forelse ($lokasiBidangs as $lokasiBidang)
                                    <tr>
                                         <td>{{ $loop->iteration }}</td>
                                        <td>{{ $lokasiBidang->lokasi_bidang }}</td>
                                        <td>{{ $lokasiBidang->nama_bidang }}</td>
                                        <td>{{ $lokasiBidang->nama_pemilik }}</td>
                                        <td>{{ $lokasiBidang->latitude }}</td>
                                        <td>{{ $lokasiBidang->longitude }}</td>
                                        <td>{{ $lokasiBidang->luas_lahan }} m²</td>
                                        <td>{{ $lokasiBidang->atas_hak }}</td>
                                        <td>{{ $lokasiBidang->tanggal_transaksi }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $lokasiBidang->id }}">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </button>
                                                <!-- Tombol Hapus -->
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $lokasiBidang->id }}">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                            </td>
                                        </tr>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal{{ $lokasiBidang->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('data-lahan.update', $lokasiBidang->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="lokasi_bidang" class="form-label">Lokasi Bidang</label>
                                                                <input type="text" class="form-control" id="lokasi_bidang" name="lokasi_bidang" value="{{ $lokasiBidang->lokasi_bidang }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama_bidang" class="form-label">Nama Bidang</label>
                                                                <input type="text" class="form-control" id="nama_bidang" name="nama_bidang" value="{{ $lokasiBidang->nama_bidang }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                                                                <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" value="{{ $lokasiBidang->nama_pemilik }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="latitude" class="form-label">Latitude</label>
                                                                <input type="number" step="0.0000001" class="form-control" id="latitude" name="latitude" value="{{ $lokasiBidang->latitude }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="longitude" class="form-label">Longitude</label>
                                                                <input type="number" step="0.0000001" class="form-control" id="longitude" name="longitude" value="{{ $lokasiBidang->longitude }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="luas_lahan" class="form-label">Luas Lahan (m²)</label>
                                                                <input type="number" class="form-control" id="luas_lahan" name="luas_lahan" value="{{ $lokasiBidang->luas_lahan }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="atas_hak" class="form-label">Atas Hak</label>
                                                                <input type="text" class="form-control" id="atas_hak" name="atas_hak" value="{{ $lokasiBidang->atas_hak }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
                                                                <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" value="{{ $lokasiBidang->tanggal_transaksi }}" required>
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

                                        <!-- Modal Hapus Data Jabatan -->
                                    <div class="modal fade" id="deleteModal-{{ $lokasiBidang->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $lokasiBidang->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel-{{ $lokasiBidang->id }}">Hapus Data Jabatan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus jabatan <strong>{{ $lokasiBidang->nama_bidang }}</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('data-lahan.destroy', $lokasiBidang->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Hapus Data Jabatan -->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Data Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('data-lahan.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="lokasi_bidang" class="form-label">Lokasi Bidang</label>
                            <input type="text" class="form-control" id="lokasi_bidang" name="lokasi_bidang" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_bidang" class="form-label">Nama Bidang</label>
                            <input type="text" class="form-control" id="nama_bidang" name="nama_bidang" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                            <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" required>
                        </div>
                        <div class="mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="number" step="0.0000001" class="form-control" id="latitude" name="latitude" required>
                        </div>
                        <div class="mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="number" step="0.0000001" class="form-control" id="longitude" name="longitude" required>
                        </div>
                        <div class="mb-3">
                            <label for="luas_lahan" class="form-label">Luas Lahan (m²)</label>
                            <input type="number" class="form-control" id="luas_lahan" name="luas_lahan" required>
                        </div>
                        <div class="mb-3">
                            <label for="atas_hak" class="form-label">Atas Hak</label>
                            <input type="text" class="form-control" id="atas_hak" name="atas_hak" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
                            <input type="date" class="form-control" id="tanggal_transaksi" name="tanggal_transaksi" required>
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
@endsection
