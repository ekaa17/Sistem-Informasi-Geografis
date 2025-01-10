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
                            <h5 class="card-title">Total : {{ count($lokasiBidangs) }} Lahan</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                                <i class="bi bi-plus-square"></i> Data Baru
                            </button>
                        </div>

                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Lokasi</th>
                                        <th>Blok</th>
                                        <th>Bidang</th>
                                        <th>Pemilik</th>
                                        <th>Luas Lahan (m²)</th>
                                        <th>Atas Hak</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Data</th>
                                        <th>Aksi</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @forelse ($lokasiBidangs as $lokasiBidang)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $lokasiBidang->lokasi_bidang }}</td>
                                        <td>{{ $lokasiBidang->blok }}</td>
                                        <td>{{ $lokasiBidang->bidang }}</td>
                                        <td>{{ $lokasiBidang->nama_pemilik }}</td>
                                        <td>{{ $lokasiBidang->luas_lahan }} m²</td>
                                        <td>{{ $lokasiBidang->atas_hak }}</td><td>{{ \Carbon\Carbon::parse($lokasiBidang->tanggal_transaksi)->translatedFormat('d F Y') }}</td>

                                            <td>
                                                <a href="{{ route('data-lahan.show', $lokasiBidang->id) }}" class="btn btn-sm btn-secondary">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a> 
                                                
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary " data-bs-toggle="modal" data-bs-target="#editModal{{ $lokasiBidang->id }}">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </button>
                                                <!-- Tombol Hapus -->
                                            <button type="button" class="btn btn-sm btn-danger " data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $lokasiBidang->id }}">
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
                                                                <input type="text" class="form-control @error('lokasi_bidang') is-invalid @enderror" 
                                                                       id="lokasi_bidang" name="lokasi_bidang" value="{{ old('lokasi_bidang', $lokasiBidang->lokasi_bidang) }}">
                                                                @error('lokasi_bidang')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-lg-6 col-12">
                                                                    <div class="mb-3">
                                                                        <label for="nama_bidang" class="form-label">Nama Bidang</label>
                                                                        <input type="text" class="form-control @error('bidang') is-invalid @enderror" 
                                                                               id="nama_bidang" name="bidang" value="{{ old('bidang', $lokasiBidang->bidang) }}">
                                                                        @error('bidang')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="blok" class="form-label">Blok</label>
                                                                        <input type="text" class="form-control @error('blok') is-invalid @enderror" 
                                                                               id="blok" name="blok" value="{{ old('blok', $lokasiBidang->blok) }}">
                                                                        @error('blok')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    
                                                            <div class="mb-3">
                                                                <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                                                                <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" 
                                                                       id="nama_pemilik" name="nama_pemilik" value="{{ old('nama_pemilik', $lokasiBidang->nama_pemilik) }}">
                                                                @error('nama_pemilik')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                    
                                                            <div class="row">
                                                                <div class="col-lg-6 col-12">
                                                                    <div class="mb-3">
                                                                        <label for="luas_lahan" class="form-label">Luas Lahan (m²)</label>
                                                                        <input type="number" class="form-control @error('luas_lahan') is-invalid @enderror" 
                                                                               id="luas_lahan" name="luas_lahan" value="{{ old('luas_lahan', $lokasiBidang->luas_lahan) }}">
                                                                        @error('luas_lahan')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-12">
                                                                    <div class="mb-3">
                                                                        <label for="atas_hak" class="form-label">Atas Hak</label>
                                                                        <input type="text" class="form-control @error('atas_hak') is-invalid @enderror" 
                                                                               id="atas_hak" name="atas_hak" value="{{ old('atas_hak', $lokasiBidang->atas_hak) }}">
                                                                        @error('atas_hak')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    
                                                            <div class="mb-3">
                                                                <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
                                                                <input type="date" class="form-control @error('tanggal_transaksi') is-invalid @enderror" 
                                                                       id="tanggal_transaksi" name="tanggal_transaksi" value="{{ old('tanggal_transaksi', $lokasiBidang->tanggal_transaksi) }}">
                                                                @error('tanggal_transaksi')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
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
                                                    <h5 class="modal-title" id="deleteModalLabel-{{ $lokasiBidang->id }}">Hapus Data Lahan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus data serta titik lokasi <strong>{{ $lokasiBidang->nama_bidang }}</strong>?
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
                            <input type="text" class="form-control @error('lokasi_bidang') is-invalid @enderror" id="lokasi_bidang" name="lokasi_bidang" value="{{ old('lokasi_bidang') }}">
                            @error('lokasi_bidang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="bidang" class="form-label">Bidang</label>
                                    <input type="text" class="form-control @error('bidang') is-invalid @enderror" id="bidang" name="bidang" value="{{ old('bidang') }}">
                                    @error('bidang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="blok" class="form-label">Blok</label>
                                    <input type="text" class="form-control @error('blok') is-invalid @enderror" id="blok" name="blok" value="{{ old('blok') }}">
                                    @error('blok')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                            <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" id="nama_pemilik" name="nama_pemilik" value="{{ old('nama_pemilik') }}">
                            @error('nama_pemilik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="luas_lahan" class="form-label">Luas Lahan (m²)</label>
                                    <input type="number" class="form-control @error('luas_lahan') is-invalid @enderror" id="luas_lahan" name="luas_lahan" value="{{ old('luas_lahan') }}">
                                    @error('luas_lahan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-3">
                                    <label for="atas_hak" class="form-label">Atas Hak</label>
                                    <input type="text" class="form-control @error('atas_hak') is-invalid @enderror" id="atas_hak" name="atas_hak" value="{{ old('atas_hak') }}">
                                    @error('atas_hak')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
                            <input type="date" class="form-control @error('tanggal_transaksi') is-invalid @enderror" id="tanggal_transaksi" name="tanggal_transaksi" value="{{ old('tanggal_transaksi') }}">
                            @error('tanggal_transaksi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
