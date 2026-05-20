@extends('layouts.main')

@section('title', 'Daftar Dosen')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1" style="font-family: var(--font-heading);">Daftar Dosen</h2>
            <p class="text-muted mb-0">Kelola informasi tenaga pendidik Jurusan Teknologi Informasi</p>
        </div>

        <a href="{{ route('dosen.create') }}" class="btn btn-primary d-flex align-items-center gap-1">
            <span>✨</span> Tambah Dosen
        </a>
    </div>

    <div class="card">
        <div class="card-body p-0">

            @if (session('success'))
                <div class="p-3 pb-0">
                    <div class="alert alert-success mb-0">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    
                    <thead>
                        <tr>
                            <th class="text-center" width="60">No</th>
                            <th width="140">NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Kontak / Telpon</th>
                            <th>Email</th>
                            <th class="text-center" width="120">Prodi</th>
                            <th>Alamat</th>
                            <th class="text-center" width="240">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($dosen as $item)
                            <tr>
                                <td class="text-center text-muted fw-semibold">
                                    {{ $loop->iteration + ($dosen->currentPage() - 1) * $dosen->perPage() }}
                                </td>
                                <td>
                                    <span class="font-monospace fw-bold text-secondary">{{ $item->nik }}</span>
                                </td>
                                <td>
                                    <div class="fw-semibold text-dark">{{ $item->nama }}</div>
                                </td>
                                <td>
                                    <div class="text-dark">{{ $item->notelp }}</div>
                                </td>
                                <td>
                                    <div class="text-secondary" style="font-size: 0.85rem;">{{ $item->email }}</div>
                                </td>
                                <td class="text-center">
                                    @php
                                        $badgeClass = 'badge-default';
                                        $prodiUpper = strtoupper($item->prodi);
                                        if ($prodiUpper === 'TRPL') $badgeClass = 'badge-trpl';
                                        elseif ($prodiUpper === 'MI') $badgeClass = 'badge-mi';
                                        elseif ($prodiUpper === 'TK') $badgeClass = 'badge-tk';
                                        elseif ($prodiUpper === 'TEKKOM') $badgeClass = 'badge-tekkom';
                                    @endphp
                                    <span class="badge-custom {{ $badgeClass }}">{{ $item->prodi }}</span>
                                </td>
                                <td>
                                    <span class="text-truncate d-inline-block" style="max-width: 150px;" title="{{ $item->alamat }}">
                                        {{ $item->alamat }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="{{ route('dosen.show', $item->id) }}" class="btn btn-secondary btn-sm">
                                            🔍 Detail
                                        </a>

                                        <a href="{{ route('dosen.edit', $item->id) }}" class="btn btn-warning btn-sm text-white">
                                            ✏️ Edit
                                        </a>

                                        <form action="{{ route('dosen.destroy', $item->id) }}" method="post" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data dosen {{ $item->nama }} ini?');">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm">🗑️ Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <div>Belum ada data dosen terdaftar.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            @if ($dosen->hasPages())
                <div class="d-flex justify-content-between align-items-center p-4 border-top">
                    <div class="text-muted" style="font-size: 0.85rem;">
                        Menampilkan {{ $dosen->firstItem() }} - {{ $dosen->lastItem() }} dari {{ $dosen->total() }} data
                    </div>
                    <div>
                        {{ $dosen->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            @endif

        </div>
    </div>

</div>

@endsection