@extends('layouts.main')

@section('title', 'Beranda')

@section('content')

<div class="container py-4">

    {{-- Hero Section --}}
    <div class="p-5 mb-5 rounded-4 text-white" style="background: linear-gradient(135deg, #1e3a8a 0%, #0f172a 100%); border: none; position: relative; overflow: hidden; box-shadow: 0 10px 30px rgba(30, 58, 138, 0.15);">
        
        {{-- Soft Abstract Background Shapes --}}
        <div style="position: absolute; top: -10%; right: -5%; width: 250px; height: 250px; border-radius: 50%; background: radial-gradient(circle, rgba(37, 99, 235, 0.2) 0%, rgba(37, 99, 235, 0) 70%); pointer-events: none;"></div>
        <div style="position: absolute; bottom: -20%; left: 30%; width: 350px; height: 350px; border-radius: 50%; background: radial-gradient(circle, rgba(37, 99, 235, 0.1) 0%, rgba(37, 99, 235, 0) 70%); pointer-events: none;"></div>

        <div class="row align-items-center" style="position: relative; z-index: 1;">
            <div class="col-lg-12">
                <span class="badge border px-3 py-2 rounded-pill mb-3 d-inline-block font-monospace hero-badge text-white" style="font-size: 0.75rem; letter-spacing: 0.05em; border-color: rgba(255, 255, 255, 0.2); background-color: rgba(255, 255, 255, 0.08);">
                    PORTAL AKADEMIK JURUSAN TEKNOLOGI INFORMASI
                </span>
                <h1 class="display-5 fw-bold mb-3" style="font-family: var(--font-heading); letter-spacing: -0.03em;">
                    Sistem Informasi Akademik
                </h1>
                <p class="lead mb-4 text-white text-opacity-80" style="font-weight: 400; max-width: 720px; font-size: 1.05rem; line-height: 1.7; letter-spacing: -0.01em;">
                    Selamat datang di Portal Utama Sistem Informasi Jurusan Teknologi Informasi Politeknik Negeri Padang. Kelola dan awasi basis data akademik mahasiswa dan dosen dengan antarmuka yang terintegrasi, cepat, dan efisien.
                </p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-light btn-lg px-4 d-flex align-items-center gap-2" style="color: var(--primary); font-weight: 600; border-radius: 8px;">
                        Kelola Data Mahasiswa
                    </a>
                    <a href="{{ route('dosen.index') }}" class="btn btn-outline-light btn-lg px-4" style="border-radius: 8px; border-color: rgba(255, 255, 255, 0.4);">
                        Kelola Data Dosen
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistik --}}
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card h-100 stats-card card-accent-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted mb-2 text-uppercase font-monospace" style="font-size: 0.75rem; letter-spacing: 0.05em; font-weight: 600;">Jumlah Mahasiswa</h6>
                            <h2 class="mb-2 fw-bold text-primary" style="font-size: 2.25rem;">
                                @php
                                    try {
                                        echo \App\Models\Mahasiswa::count();
                                    } catch (\Exception $e) {
                                        echo 0;
                                    }
                                @endphp
                            </h2>
                        </div>
                        <div class="stats-icon-wrapper text-primary" style="background-color: #eff6ff;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                    </div>
                    <span class="text-muted" style="font-size: 0.85rem;">Mahasiswa terdaftar aktif</span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 stats-card card-accent-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted mb-2 text-uppercase font-monospace" style="font-size: 0.75rem; letter-spacing: 0.05em; font-weight: 600;">Jumlah Dosen</h6>
                            <h2 class="mb-2 fw-bold text-success" style="font-size: 2.25rem;">
                                @php
                                    try {
                                        echo \App\Models\Dosen::count();
                                    } catch (\Exception $e) {
                                        echo 0;
                                    }
                                @endphp
                            </h2>
                        </div>
                        <div class="stats-icon-wrapper text-success" style="background-color: #ecfdf5;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/><path d="M6 6h10"/><path d="M6 10h10"/></svg>
                        </div>
                    </div>
                    <span class="text-muted" style="font-size: 0.85rem;">Dosen terdaftar aktif</span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 stats-card card-accent-warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="text-muted mb-2 text-uppercase font-monospace" style="font-size: 0.75rem; letter-spacing: 0.05em; font-weight: 600;">Program Studi</h6>
                            <h2 class="mb-2 fw-bold text-warning" style="font-size: 2.25rem;">4</h2>
                        </div>
                        <div class="stats-icon-wrapper text-warning" style="background-color: #fffbeb;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c0 2 2 3 6 3s6-1 6-3v-5"/></svg>
                        </div>
                    </div>
                    <span class="text-muted" style="font-size: 0.85rem;">Program studi Jurusan TI</span>
                </div>
            </div>
        </div>
    </div>

    {{-- About --}}
    <div class="card">
        <div class="card-header">
            <h4>Tentang Sistem</h4>
        </div>
        <div class="card-body">
            <p class="text-muted mb-0" style="line-height: 1.7; font-size: 0.95rem;">
                Sistem Informasi Akademik Jurusan Teknologi Informasi Politeknik Negeri Padang merupakan aplikasi berbasis web yang berfungsi sebagai pusat penyimpanan dan pengelolaan data. Sistem mencakup pengelolaan data lengkap mahasiswa seperti Nomor Induk Mahasiswa (NIM), nama, tempat & tanggal lahir, alamat, email, dan program studi, serta data dosen berupa Nomor Induk Karyawan (NIK), nomor telepon, program studi pengampu, dan alamat kontak.
            </p>
        </div>
    </div>

</div>

@endsection