@extends('layouts.main')

@section('title', 'Detail Mahasiswa')

@section('content')

<div class="container mt-4">

    <div class="mb-4 text-center text-md-start">
        <a href="{{ route('mahasiswa.index') }}" class="text-decoration-none text-muted fw-semibold" style="font-size: 0.875rem;">
            ← Kembali ke Daftar Mahasiswa
        </a>
        <h2 class="mt-2" style="font-family: var(--font-heading);">Detail Informasi Mahasiswa</h2>
        <p class="text-muted">Profil lengkap akademik mahasiswa yang terdaftar.</p>
    </div>

    <div class="card profile-card">
        <div class="card-body p-4 p-md-5">
            
            {{-- Profile Avatar & Header --}}
            @php
                $avatarBg = '#e2e8f0';
                $avatarColor = '#475569';
                $avatarBorder = '#cbd5e1';
                $prodiUpper = strtoupper($mahasiswa->prodi);
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
                    $words = explode(' ', $mahasiswa->nama_lengkap);
                    $initials = '';
                    if (count($words) >= 2) {
                        $initials = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
                    } else {
                        $initials = strtoupper(substr($mahasiswa->nama_lengkap, 0, 2));
                    }
                @endphp
                {{ $initials }}
            </div>

            <h3 class="profile-header-name">{{ $mahasiswa->nama_lengkap }}</h3>
            
            <div class="profile-header-sub">
                <span class="font-monospace fw-bold text-secondary">{{ $mahasiswa->nim }}</span>
                <span class="text-muted">•</span>
                @php
                    $badgeClass = 'badge-default';
                    if ($prodiUpper === 'TRPL') $badgeClass = 'badge-trpl';
                    elseif ($prodiUpper === 'MI') $badgeClass = 'badge-mi';
                    elseif ($prodiUpper === 'TK') $badgeClass = 'badge-tk';
                    elseif ($prodiUpper === 'TEKKOM') $badgeClass = 'badge-tekkom';
                @endphp
                <span class="badge-custom {{ $badgeClass }}">{{ $mahasiswa->prodi }}</span>
            </div>

            <hr class="my-4" style="border-color: var(--border-color);">

            {{-- Detail Fields Grid --}}
            <div class="detail-grid">
                <div class="detail-item">
                    <div class="detail-label">Nomor Induk Mahasiswa</div>
                    <div class="detail-value font-monospace">{{ $mahasiswa->nim }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Nama Lengkap</div>
                    <div class="detail-value">{{ $mahasiswa->nama_lengkap }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Program Studi</div>
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
                            {{ $mahasiswa->prodi }}
                        @endif
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Alamat Email</div>
                    <div class="detail-value text-secondary">{{ $mahasiswa->email }}</div>
                </div>

                <div class="detail-item">
                    <div class="detail-label">Tempat & Tanggal Lahir</div>
                    <div class="detail-value">
                        {{ $mahasiswa->tempat_lahir }}, {{ \Carbon\Carbon::parse($mahasiswa->tgl_lahir)->format('d F Y') }}
                    </div>
                </div>

                <div class="detail-item col-md-12">
                    <div class="detail-label">Alamat Rumah</div>
                    <div class="detail-value" style="line-height: 1.6;">{{ $mahasiswa->alamat }}</div>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="d-flex justify-content-center gap-3 mt-4 pt-3 border-top" style="border-color: #f1f5f9 !important;">
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary px-4">
                    ← Kembali
                </a>
                <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning px-4 text-white">
                    ✏️ Edit Data
                </a>
            </div>

        </div>
    </div>

</div>

@endsection
