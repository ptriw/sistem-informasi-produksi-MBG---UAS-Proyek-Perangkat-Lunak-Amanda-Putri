@extends('produksi.layout')

@section('title', 'Edit Data Produksi')

@section('content')

    {{-- ── PAGE HEADER ── --}}
    <div class="page-header d-flex align-items-center justify-content-between flex-wrap gap-3">
        <div>
            <h1><i class="bi bi-pencil-square me-2"></i>Edit Data Produksi</h1>
            <p>Perbarui informasi data produksi <strong style="color:#93c5fd;">{{ $produksi->kode_produksi }}</strong>.</p>
        </div>
        <a href="{{ route('produksi.index') }}" class="btn btn-light fw-600" style="border-radius:8px;font-size:.875rem;">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    {{-- ── FORM CARD ── --}}
    <div class="card-custom" style="max-width: 720px;">

        <form action="{{ route('produksi.update', $produksi->id) }}" method="POST" novalidate>
            @csrf
            @method('PUT')

            <div class="row g-4">

                {{-- Kode Produksi --}}
                <div class="col-md-6">
                    <label for="kode_produksi" class="form-label">
                        <i class="bi bi-tag-fill me-1 text-primary"></i>Kode Produksi
                        <span class="text-danger">*</span>
                    </label>
                    <input
                        type="text"
                        id="kode_produksi"
                        name="kode_produksi"
                        class="form-control @error('kode_produksi') is-invalid @enderror"
                        value="{{ old('kode_produksi', $produksi->kode_produksi) }}"
                        placeholder="Contoh: PRD-001"
                        required
                    >
                    @error('kode_produksi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Kode unik untuk identifikasi produksi.</small>
                </div>

                {{-- Nama Barang --}}
                <div class="col-md-6">
                    <label for="nama_barang" class="form-label">
                        <i class="bi bi-box-seam-fill me-1 text-primary"></i>Nama Barang
                        <span class="text-danger">*</span>
                    </label>
                    <input
                        type="text"
                        id="nama_barang"
                        name="nama_barang"
                        class="form-control @error('nama_barang') is-invalid @enderror"
                        value="{{ old('nama_barang', $produksi->nama_barang) }}"
                        placeholder="Masukkan nama barang..."
                        required
                    >
                    @error('nama_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Jumlah Produksi --}}
                <div class="col-md-6">
                    <label for="jumlah_produksi" class="form-label">
                        <i class="bi bi-123 me-1 text-primary"></i>Jumlah Produksi
                        <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <input
                            type="number"
                            id="jumlah_produksi"
                            name="jumlah_produksi"
                            class="form-control @error('jumlah_produksi') is-invalid @enderror"
                            value="{{ old('jumlah_produksi', $produksi->jumlah_produksi) }}"
                            placeholder="0"
                            min="1"
                            required
                        >
                        <span class="input-group-text" style="border-radius:0 8px 8px 0;border:1.5px solid #e2e8f0;">unit</span>
                        @error('jumlah_produksi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Tanggal Produksi --}}
                <div class="col-md-6">
                    <label for="tanggal_produksi" class="form-label">
                        <i class="bi bi-calendar-event-fill me-1 text-primary"></i>Tanggal Produksi
                        <span class="text-danger">*</span>
                    </label>
                    <input
                        type="date"
                        id="tanggal_produksi"
                        name="tanggal_produksi"
                        class="form-control @error('tanggal_produksi') is-invalid @enderror"
                        value="{{ old('tanggal_produksi', $produksi->tanggal_produksi->format('Y-m-d')) }}"
                        required
                    >
                    @error('tanggal_produksi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="col-md-12">
                    <label class="form-label">
                        <i class="bi bi-activity me-1 text-primary"></i>Status Produksi
                        <span class="text-danger">*</span>
                    </label>
                    <div class="d-flex gap-3 flex-wrap mt-1">
                        @foreach(['Planning', 'On Progress', 'Done'] as $statusOption)
                            @php
                                $colors = [
                                    'Planning'    => ['border:#6366f1','bg:#e0e7ff','text:#3730a3'],
                                    'On Progress' => ['border:#f59e0b','bg:#fef9c3','text:#854d0e'],
                                    'Done'        => ['border:#22c55e','bg:#dcfce7','text:#166534'],
                                ];
                                $c = $colors[$statusOption];
                                $isSelected = old('status', $produksi->status) === $statusOption;
                            @endphp
                            <label class="status-radio-label" for="status_{{ Str::slug($statusOption) }}"
                                   style="cursor:pointer;">
                                <input
                                    type="radio"
                                    id="status_{{ Str::slug($statusOption) }}"
                                    name="status"
                                    value="{{ $statusOption }}"
                                    class="d-none status-radio"
                                    {{ $isSelected ? 'checked' : '' }}
                                >
                                <span class="status-option {{ $isSelected ? 'selected' : '' }}"
                                      data-border="{{ $c[0] }}"
                                      data-bg="{{ $c[1] }}"
                                      data-text="{{ $c[2] }}"
                                      style="
                                        display:inline-flex;align-items:center;gap:6px;
                                        padding:8px 18px;border-radius:30px;font-size:.875rem;font-weight:600;
                                        border:2px solid {{ $isSelected ? str_replace('border:','',$c[0]) : '#e2e8f0' }};
                                        background:{{ $isSelected ? str_replace('bg:','',$c[1]) : '#f8fafc' }};
                                        color:{{ $isSelected ? str_replace('text:','',$c[2]) : '#64748b' }};
                                        transition:all .2s;
                                      ">
                                    <i class="bi bi-circle-fill" style="font-size:.5rem;"></i>
                                    {{ $statusOption }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                    @error('status')
                        <div class="text-danger mt-1" style="font-size:.875rem;">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            {{-- Info terakhir diubah --}}
            <div class="mt-4 p-3" style="background:#f8fafc;border-radius:10px;font-size:.8rem;color:#64748b;">
                <i class="bi bi-clock-history me-1"></i>
                Dibuat: <strong>{{ $produksi->created_at->format('d M Y, H:i') }}</strong>
                &nbsp;&middot;&nbsp;
                Diperbarui: <strong>{{ $produksi->updated_at->format('d M Y, H:i') }}</strong>
            </div>

            {{-- Divider --}}
            <hr class="my-4" style="border-color:#f1f5f9;">

            {{-- Action Buttons --}}
            <div class="d-flex align-items-center gap-3">
                <button type="submit" class="btn-primary-custom">
                    <i class="bi bi-floppy-fill"></i> Simpan Perubahan
                </button>
                <a href="{{ route('produksi.index') }}"
                   class="btn btn-outline-secondary fw-600"
                   style="border-radius:8px;font-size:.875rem;padding:8px 18px;">
                    Batal
                </a>
            </div>

        </form>
    </div>

@endsection

@push('scripts')
<script>
    // Interaktif pilihan status
    document.querySelectorAll('.status-radio').forEach(function(radio) {
        radio.addEventListener('change', function() {
            document.querySelectorAll('.status-option').forEach(function(span) {
                span.style.border     = '2px solid #e2e8f0';
                span.style.background = '#f8fafc';
                span.style.color      = '#64748b';
            });
            var span = this.nextElementSibling;
            span.style.border     = '2px solid ' + span.dataset.border.replace('border:','');
            span.style.background = span.dataset.bg.replace('bg:','');
            span.style.color      = span.dataset.text.replace('text:','');
        });
    });
</script>
@endpush
