@extends('layouts.main')

@section('title', 'Tambah Mahasiswa')

@section('content')

<div class="container mt-4" style="max-width: 800px;">

    <div class="mb-4">
        <a href="{{ route('mahasiswa.index') }}" class="text-decoration-none text-muted fw-semibold" style="font-size: 0.875rem;">
            ← Kembali ke Daftar Mahasiswa
        </a>
        <h2 class="mt-2" style="font-family: var(--font-heading);">Tambah Mahasiswa Baru</h2>
        <p class="text-muted">Masukkan data mahasiswa secara lengkap dan valid.</p>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Formulir Mahasiswa</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('mahasiswa.store') }}" method="POST">
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
                    {{-- NIM --}}
                    <div class="col-md-6">
                        <label class="form-label">Nomor Induk Mahasiswa (NIM)</label>
                        <input type="text" 
                               name="nim" 
                               class="form-control"
                               value="{{ old('nim') }}"
                               placeholder="Contoh: 2211082012"
                               required>
                    </div>

                    {{-- Nama --}}
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" 
                               name="nama_lengkap" 
                               class="form-control"
                               value="{{ old('nama_lengkap') }}"
                               placeholder="Nama lengkap tanpa gelar"
                               required>
                    </div>

                    {{-- Tempat Lahir --}}
                    <div class="col-md-12">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" 
                               name="tempat_lahir" 
                               class="form-control"
                               value="{{ old('tempat_lahir') }}"
                               placeholder="Kota tempat lahir"
                               required>
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div class="col-md-12">
                        <label class="form-label">Tanggal Lahir</label>
                        <div class="row g-2">
                            {{-- Tanggal --}}
                            <div class="col-4 col-md-3">
                                <select name="tanggal" class="form-select" required>
                                    <option value="">Tanggal</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}" {{ old('tanggal') == $i ? 'selected' : '' }}>
                                            {{ sprintf('%02d', $i) }}
                                        </option>
                                    @endfor
                                </select>
                            </div>

                            {{-- Bulan --}}
                            <div class="col-4 col-md-5">
                                <select name="bulan" class="form-select" required>
                                    <option value="">Bulan</option>
                                    @php
                                        $bulan = [
                                            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                                            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                                        ];
                                    @endphp
                                    @foreach ($bulan as $key => $value)
                                        <option value="{{ $key + 1 }}" {{ old('bulan') == $key + 1 ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Tahun --}}
                            <div class="col-4 col-md-4">
                                <select name="tahun" class="form-select" required>
                                    <option value="">Tahun</option>
                                    @for ($i = date('Y') - 15; $i >= 1970; $i--)
                                        <option value="{{ $i }}" {{ old('tahun') == $i ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6">
                        <label class="form-label">Alamat Email</label>
                        <input type="email" 
                               name="email" 
                               class="form-control"
                               value="{{ old('email') }}"
                               placeholder="nama@email.com"
                               required>
                    </div>

                    {{-- Prodi --}}
                    <div class="col-md-6">
                        <label class="form-label">Program Studi</label>
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
                        <label class="form-label">Alamat Rumah</label>
                        <textarea name="alamat"
                                  rows="3"
                                  class="form-control"
                                  placeholder="Alamat lengkap, jalan, nomor rumah, RT/RW, kecamatan, kota"
                                  required>{{ old('alamat') }}</textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
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