@extends('layouts.main')

@section('title', 'Tambah Dosen')

@section('content')

<div class="container mt-4" style="max-width: 800px;">

    <div class="mb-4">
        <a href="{{ route('dosen.index') }}" class="text-decoration-none text-muted fw-semibold" style="font-size: 0.875rem;">
            ← Kembali ke Daftar Dosen
        </a>
        <h2 class="mt-2" style="font-family: var(--font-heading);">Tambah Dosen Baru</h2>
        <p class="text-muted">Masukkan informasi lengkap tenaga pendidik baru Jurusan TI.</p>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Formulir Tambah Dosen</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('dosen.store') }}" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <div class="fw-bold mb-1">Periksa kembali inputan Anda:</div>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row g-3">
                    {{-- NIK --}}
                    <div class="col-md-6">
                        <label class="form-label">Nomor Induk Karyawan / NIK</label>
                        <input type="text" 
                               name="nik" 
                               class="form-control"
                               value="{{ old('nik') }}"
                               placeholder="Contoh: 198005122005011002"
                               required>
                    </div>

                    {{-- Nama --}}
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" 
                               name="nama" 
                               class="form-control"
                               value="{{ old('nama') }}"
                               placeholder="Nama lengkap beserta gelar akademik"
                               required>
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6">
                        <label class="form-label">Alamat Email</label>
                        <input type="email" 
                               name="email" 
                               class="form-control"
                               value="{{ old('email') }}"
                               placeholder="nama@pnp.ac.id"
                               required>
                    </div>

                    {{-- No Telp --}}
                    <div class="col-md-6">
                        <label class="form-label">Nomor Telepon</label>
                        <input type="text" 
                               name="notelp" 
                               class="form-control"
                               value="{{ old('notelp') }}"
                               placeholder="Contoh: 081234567890"
                               required>
                    </div>

                    {{-- Prodi --}}
                    <div class="col-md-12">
                        <label class="form-label">Program Studi Pengampu</label>
                        <select name="prodi" class="form-select" required>
                            <option value="">-- Pilih Prodi --</option>
                            <option value="TRPL" {{ old('prodi') == 'TRPL' ? 'selected' : '' }}>TRPL (D4 Teknologi Rekayasa Perangkat Lunak)</option>
                            <option value="MI" {{ old('prodi') == 'MI' ? 'selected' : '' }}>MI (D3 Manajemen Informatika)</option>
                            <option value="TK" {{ old('prodi') == 'TK' ? 'selected' : '' }}>TK (D3 Teknik Komputer)</option>
                            <option value="TEKKOM" {{ old('prodi') == 'TEKKOM' ? 'selected' : '' }}>TEKKOM (D4 Teknik Komputer)</option>
                        </select>
                    </div>

                    {{-- Alamat --}}
                    <div class="col-md-12">
                        <label class="form-label">Alamat Rumah / Kantor</label>
                        <textarea name="alamat"
                                  rows="3"
                                  class="form-control"
                                  placeholder="Alamat domisili lengkap saat ini"
                                  required>{{ old('alamat') }}</textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="{{ route('dosen.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        💾 Simpan Data
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection