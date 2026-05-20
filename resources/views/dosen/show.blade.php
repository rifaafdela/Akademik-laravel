@extends('layouts.main')

@section('title', 'Detail Dosen')

@section('content')

<div class="container mt-4">

    <div class="mb-4 text-center text-md-start">
        <a href="{{ route('dosen.index') }}" class="text-decoration-none text-muted fw-semibold" style="font-size: 0.875rem;">
            ← Kembali ke Daftar Dosen
        </a>
        <h2 class="mt-2" style="font-family: var(--font-heading);">Detail Informasi Dosen</h2>
        <p class="text-muted">Profil lengkap tenaga pendidik Jurusan Teknologi Informasi.</p>
    </div>

    <div class="card profile-card">
        <div class="card-body p-4 p-md-5">
            
            {{-- Profile Avatar & Header --}}
            @php
                $avatarBg = '#cbd5e1';
                $avatarColor = '#475569';
                $avatarBorder = '#cbd5e1';
                $prodiUpper = strtoupper($dosen->prodi);
                if ($prodiUpper === 'TRPL') {
                    $avatarBg = '#dbeafe'; $avatarColor = '#1e40af'; $avatarBorder = '#bfdbfe';
                } elseif ($prodiUpper === 'MI') {
                    $avatarBg = '#d1fae5'; $avatarColor = '#065f46'; $avatarBorder = '#a7f3d0';
                } elseif ($prodiUpper === 'TK') {
                    $avatarBg = '#fef3c7'; $avatarColor = '#92400e'; $avatarBorder = '#fde68a';
                } elseif ($prodiUpper === 'TEKKOM') {
                    $avatarBg = '#f3e8ff'; $avatarColor = '#6b21a8'; $avatarBorder = '#e9d5ff';
                }
            @endphp
            <div class="profile-avatar-container" style="background-color: {{ $avatarBg }}; color: {{ $avatarColor }}; border-color: {{ $avatarBorder }};">
                @php
                    $words = explode(' ', $dosen->nama);
                    $initials = '';
                    if (count($words) >= 2) {
                        $initials = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
                    } else {
                        $initials = strtoupper(substr($dosen->nama, 0, 2));
                    }
                @endphp
                {{ $initials }}
            </div>

            <h3 class="profile-header-name">{{ $dosen->nama }}</h3>
            
            <div class="profile-header-sub">
                <span class="font-monospace fw-bold text-secondary">{{ $dosen->nik }}</span>
                <span class="text-muted">•</span>
                @php
                    $badgeClass = 'badge-default';
                    if ($prodiUpper === 'TRPL') $badgeClass = 'badge-trpl';
                    elseif ($prodiUpper === 'MI') $badgeClass = 'badge-mi';
                    elseif ($prodiUpper === 'TK') $badgeClass = 'badge-tk';
                    elseif ($prodiUpper === 'TEKKOM') $badgeClass = 'badge-tekkom';
                @endphp
                <span class="badge-custom {{ $badgeClass }}">{{ $dosen->prodi }}</span>
            </div>

            <hr class="my-4" style="border-color: var(--border-color);">

            {{-- Detail Fields Grid --}}
            <div class="detail-grid">
                <div class="detail-item">
                    <div class="detail-label">Nomor Induk Karyawan / NIK</div>
                    <div class="detail-value font-monospace">{{ $dosen->nik }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Nama Lengkap & Gelar</div>
                    <div class="detail-value">{{ $dosen->nama }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Program Studi Pengampu</div>
                    <div class="detail-value">
                        @if($prodiUpper === 'TRPL')
                            Teknologi Rekayasa Perangkat Lunak (D4)
                        @elseif($prodiUpper === 'MI')
                            Manajemen Informatika (D3)
                        @elseif($prodiUpper === 'TK')
                            Teknik Komputer (D3)
                        @elseif($prodiUpper === 'TEKKOM')
                            Teknik Komputer (D4)
                        @else
                            {{ $dosen->prodi }}
                        @endif
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Alamat Email</div>
                    <div class="detail-value text-secondary">{{ $dosen->email }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Nomor Telepon</div>
                    <div class="detail-value">{{ $dosen->notelp }}</div>
                </div>

                <div class="detail-item col-md-12">
                    <div class="detail-label">Alamat Rumah / Kantor</div>
                    <div class="detail-value" style="line-height: 1.6;">{{ $dosen->alamat }}</div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="d-flex justify-content-center gap-3 mt-4 pt-3 border-top" style="border-color: #f1f5f9 !important;">
                <a href="{{ route('dosen.index') }}" class="btn btn-secondary px-4">
                    ← Kembali
                </a>
                <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-warning px-4 text-white">
                    ✏️ Edit Data
                </a>
            </div>

        </div>
    </div>

</div>

@endsection
