@extends('layouts.main')

@section('title', 'Edit Mahasiswa')

@section('content')

<div class="container mt-4" style="max-width: 800px;">

    <div class="mb-4">
        <a href="{{ route('mahasiswa.index') }}" class="text-decoration-none text-muted fw-semibold" style="font-size: 0.875rem;">
            ← Kembali ke Daftar Mahasiswa
        </a>
        <h2 class="mt-2" style="font-family: var(--font-heading);">Edit Data Mahasiswa</h2>
        <p class="text-muted">Perbarui data mahasiswa secara berkala dan simpan perubahan.</p>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Formulir Edit Mahasiswa</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                @csrf
                @method('PUT')

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
                               value="{{ old('nim', $mahasiswa->nim) }}"
                               placeholder="Contoh: 2211082012"
                               required>
                    </div>

                    {{-- Nama --}}
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" 
                               name="nama_lengkap" 
                               class="form-control"
                               value="{{ old('nama_lengkap', $mahasiswa->nama_lengkap) }}"
                               placeholder="Nama lengkap tanpa gelar"
                               required>
                    </div>

                    {{-- Tempat Lahir --}}
                    <div class="col-md-12">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" 
                               name="tempat_lahir" 
                               class="form-control"
                               value="{{ old('tempat_lahir', $mahasiswa->tempat_lahir) }}"
                               placeholder="Kota tempat lahir"
                               required>
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div class="col-md-12">
                        <label class="form-label">Tanggal Lahir</label>
                        <div class="row g-2">
                            @php
                                $tgl = \Carbon\Carbon::parse($mahasiswa->tgl_lahir);
                            @endphp

                            {{-- Tanggal --}}
                            <div class="col-4 col-md-3">
                                <select name="tanggal" class="form-select" required>
                                    <option value="">Tanggal</option>
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}" {{ old('tanggal', $tgl->day) == $i ? 'selected' : '' }}>
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
                                        <option value="{{ $key + 1 }}" {{ old('bulan', $tgl->month) == $key + 1 ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Tahun --}}
                            <div class="col-4 col-md-4">
                                <select name="tahun" class="form-select" required>
                                    <option value="">Tahun</option>
                                    @for ($i = date('Y'); $i >= 1970; $i--)
                                        <option value="{{ $i }}" {{ old('tahun', $tgl->year) == $i ? 'selected' : '' }}>
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
                               value="{{ old('email', $mahasiswa->email) }}"
                               placeholder="nama@email.com"
                               required>
                    </div>

                    {{-- Prodi --}}
                    <div class="col-md-6">
                        <label class="form-label">Program Studi</label>
                        <select name="prodi" class="form-select" required>
                            <option value="">-- Pilih Prodi --</option>
                            <option value="TRPL" {{ old('prodi', $mahasiswa->prodi) == 'TRPL' ? 'selected' : '' }}>TRPL (D4 Teknologi Rekayasa Perangkat Lunak)</option>
                            <option value="MI" {{ old('prodi', $mahasiswa->prodi) == 'MI' ? 'selected' : '' }}>MI (D3 Manajemen Informatika)</option>
                            <option value="TK" {{ old('prodi', $mahasiswa->prodi) == 'TK' ? 'selected' : '' }}>TK (D3 Teknik Komputer)</option>
                            <option value="TEKKOM" {{ old('prodi', $mahasiswa->prodi) == 'TEKKOM' ? 'selected' : '' }}>TEKKOM (D4 Teknik Komputer)</option>
                        </select>
                    </div>

                    {{-- Alamat --}}
                    <div class="col-md-12">
                        <label class="form-label">Alamat Rumah</label>
                        <textarea name="alamat"
                                  rows="3"
                                  class="form-control"
                                  placeholder="Alamat lengkap"
                                  required>{{ old('alamat', $mahasiswa->alamat) }}</textarea>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        💾 Perbarui Data
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
