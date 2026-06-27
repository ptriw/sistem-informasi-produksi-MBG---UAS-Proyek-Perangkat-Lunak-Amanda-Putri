@extends('produksi.layout')

@section('title', 'Data Produksi')

@section('content')

    {{-- ── PAGE HEADER ── --}}
    <div class="page-header d-flex align-items-center justify-content-between flex-wrap gap-3">
        <div>
            <h1><i class="bi bi-boxes me-2"></i>Data Produksi</h1>
            <p>Kelola seluruh data produksi MBG secara efisien dan terstruktur.</p>
        </div>
        <a href="{{ route('produksi.create') }}" class="btn-primary-custom">
            <i class="bi bi-plus-lg"></i> Tambah Data
        </a>
    </div>

    {{-- ── ALERT SUKSES ── --}}
    @if(session('success'))
        <div class="alert-success-custom mb-4">
            <i class="bi bi-check-circle-fill"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- ── CARD TABEL ── --}}
    <div class="card-custom">

        {{-- Toolbar: info total + search --}}
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
            <div>
                <span class="fw-600 text-secondary" style="font-size:.875rem;">
                    Total: <strong class="text-dark">{{ $produksis->total() }}</strong> data produksi
                </span>
            </div>
            <form method="GET" action="{{ route('produksi.index') }}" class="d-flex gap-2">
                <div class="search-box">
                    <i class="bi bi-search"></i>
                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari kode, nama barang, status..."
                        value="{{ $search }}"
                        style="min-width:240px;"
                    >
                </div>
                <button type="submit" class="btn-primary-custom">
                    <i class="bi bi-search"></i> Cari
                </button>
                @if($search)
                    <a href="{{ route('produksi.index') }}" class="btn btn-outline-secondary" style="border-radius:8px;font-size:.875rem;">
                        <i class="bi bi-x-lg"></i>
                    </a>
                @endif
            </form>
        </div>

        {{-- TABEL --}}
        @if($produksis->count() > 0)
            <div class="table-responsive">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th style="width:50px;">#</th>
                            <th>Kode Produksi</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Produksi</th>
                            <th>Tanggal Produksi</th>
                            <th>Status</th>
                            <th style="width:130px; text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produksis as $item)
                            <tr>
                                <td class="text-muted" style="font-size:.8rem;">
                                    {{ ($produksis->currentPage() - 1) * $produksis->perPage() + $loop->iteration }}
                                </td>
                                <td>
                                    <span class="fw-600" style="font-family:monospace;font-size:.9rem;color:#1d4ed8;">
                                        {{ $item->kode_produksi }}
                                    </span>
                                </td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>
                                    <span class="fw-600">{{ number_format($item->jumlah_produksi) }}</span>
                                    <small class="text-muted ms-1">unit</small>
                                </td>
                                <td>{{ $item->tanggal_produksi->format('d M Y') }}</td>
                                <td>
                                    @php
                                        $badge = match($item->status) {
                                            'Planning'    => 'badge-planning',
                                            'On Progress' => 'badge-onprogress',
                                            'Done'        => 'badge-done',
                                            default       => 'badge-planning',
                                        };
                                    @endphp
                                    <span class="status-badge {{ $badge }}">{{ $item->status }}</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('produksi.edit', $item->id) }}"
                                       class="btn-action btn-edit me-1"
                                       title="Edit">
                                        <i class="bi bi-pencil-fill"></i> Edit
                                    </a>
                                    <form action="{{ route('produksi.destroy', $item->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus data produksi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete" title="Hapus">
                                            <i class="bi bi-trash-fill"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            @if($produksis->hasPages())
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-3 pt-3" style="border-top:1px solid #f1f5f9;">
                    <small class="text-muted">
                        Menampilkan {{ $produksis->firstItem() }}&ndash;{{ $produksis->lastItem() }}
                        dari {{ $produksis->total() }} data
                    </small>
                    <div>
                        {{ $produksis->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            @endif

        @else
            {{-- EMPTY STATE --}}
            <div class="empty-state">
                <i class="bi bi-inbox"></i>
                @if($search)
                    <h5 style="color:#475569;">Data tidak ditemukan</h5>
                    <p style="font-size:.875rem;">Tidak ada data produksi yang cocok dengan pencarian "<strong>{{ $search }}</strong>".</p>
                    <a href="{{ route('produksi.index') }}" class="btn-primary-custom mt-2">
                        <i class="bi bi-arrow-left"></i> Lihat Semua Data
                    </a>
                @else
                    <h5 style="color:#475569;">Belum ada data produksi</h5>
                    <p style="font-size:.875rem;">Mulai tambahkan data produksi pertama Anda.</p>
                    <a href="{{ route('produksi.create') }}" class="btn-primary-custom mt-2">
                        <i class="bi bi-plus-lg"></i> Tambah Data Produksi
                    </a>
                @endif
            </div>
        @endif

    </div>

@endsection
