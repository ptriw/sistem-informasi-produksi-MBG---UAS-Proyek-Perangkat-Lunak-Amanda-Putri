<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Pengelolaan Data Produksi MBG - Kelola data produksi secara efisien dan terstruktur.">
    <title>@yield('title', 'Dashboard') | Sistem Produksi MBG</title>

    {{-- Bootstrap 5 CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    {{-- Bootstrap Icons CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary:   #1d4ed8;
            --primary-dark: #1e3a8a;
            --sidebar-w: 260px;
            --header-h:  60px;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: #f1f5f9;
            color: #1e293b;
            min-height: 100vh;
        }

        /* ── NAVBAR ── */
        .navbar-brand-custom {
            font-weight: 700;
            font-size: 1.15rem;
            letter-spacing: .3px;
            color: #fff !important;
        }
        .navbar-brand-custom span {
            color: #93c5fd;
        }
        .top-navbar {
            background: linear-gradient(135deg, #1e3a8a 0%, #1d4ed8 100%);
            height: var(--header-h);
            box-shadow: 0 2px 8px rgba(0,0,0,.25);
        }
        .top-navbar .nav-link {
            color: rgba(255,255,255,.85) !important;
            font-size: .875rem;
            font-weight: 500;
            padding: .4rem .9rem !important;
            border-radius: 6px;
            transition: background .2s;
        }
        .top-navbar .nav-link:hover,
        .top-navbar .nav-link.active {
            background: rgba(255,255,255,.15);
            color: #fff !important;
        }
        .top-navbar .nav-link i { margin-right: 4px; }

        /* ── MAIN CONTENT ── */
        .main-content {
            padding: 28px 24px;
            max-width: 1280px;
            margin: 0 auto;
        }

        /* ── PAGE HEADER ── */
        .page-header {
            background: linear-gradient(135deg, #1e3a8a 0%, #1d4ed8 100%);
            color: #fff;
            border-radius: 14px;
            padding: 24px 28px;
            margin-bottom: 24px;
            box-shadow: 0 4px 15px rgba(29,78,216,.3);
        }
        .page-header h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
        }
        .page-header p {
            margin: 4px 0 0;
            opacity: .8;
            font-size: .875rem;
        }

        /* ── CARDS ── */
        .card-custom {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 1px 6px rgba(0,0,0,.08);
            border: none;
            padding: 24px;
        }

        /* ── TABLE ── */
        .table-custom thead th {
            background: #f8fafc;
            color: #475569;
            font-size: .8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .5px;
            border-bottom: 2px solid #e2e8f0;
            padding: 12px 16px;
            white-space: nowrap;
        }
        .table-custom tbody td {
            padding: 12px 16px;
            vertical-align: middle;
            font-size: .9rem;
            border-bottom: 1px solid #f1f5f9;
        }
        .table-custom tbody tr:hover {
            background: #f8fafc;
        }
        .table-custom tbody tr:last-child td {
            border-bottom: none;
        }

        /* ── STATUS BADGES ── */
        .badge-planning    { background:#e0e7ff; color:#3730a3; }
        .badge-onprogress  { background:#fef9c3; color:#854d0e; }
        .badge-done        { background:#dcfce7; color:#166534; }
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: .78rem;
            font-weight: 600;
        }

        /* ── BUTTONS ── */
        .btn-primary-custom {
            background: linear-gradient(135deg, #1d4ed8, #3b82f6);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: .875rem;
            padding: 8px 18px;
            transition: all .2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #1e3a8a, #1d4ed8);
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(29,78,216,.35);
        }
        .btn-action {
            padding: 5px 10px;
            border-radius: 7px;
            font-size: .78rem;
            font-weight: 600;
            border: none;
            transition: all .18s;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        .btn-edit  { background:#dbeafe; color:#1d4ed8; }
        .btn-edit:hover  { background:#1d4ed8; color:#fff; }
        .btn-delete { background:#fee2e2; color:#dc2626; }
        .btn-delete:hover { background:#dc2626; color:#fff; }

        /* ── FORM ── */
        .form-label { font-weight: 600; font-size: .875rem; color: #374151; margin-bottom: 5px; }
        .form-control, .form-select {
            border-radius: 8px;
            border: 1.5px solid #e2e8f0;
            padding: 10px 14px;
            font-size: .9rem;
            transition: border .2s, box-shadow .2s;
        }
        .form-control:focus, .form-select:focus {
            border-color: #1d4ed8;
            box-shadow: 0 0 0 3px rgba(29,78,216,.12);
        }

        /* ── PAGINATION ── */
        .pagination .page-link {
            border-radius: 7px !important;
            margin: 0 2px;
            font-size: .875rem;
            color: #1d4ed8;
            border: 1.5px solid #e2e8f0;
        }
        .pagination .page-item.active .page-link {
            background: #1d4ed8;
            border-color: #1d4ed8;
            color: #fff;
        }

        /* ── ALERTS ── */
        .alert-success-custom {
            background: #dcfce7;
            color: #166534;
            border: 1.5px solid #86efac;
            border-radius: 10px;
            padding: 12px 18px;
            font-size: .9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* ── SEARCH BOX ── */
        .search-box {
            position: relative;
        }
        .search-box i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }
        .search-box input {
            padding-left: 36px;
        }

        /* ── EMPTY STATE ── */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #94a3b8;
        }
        .empty-state i { font-size: 3.5rem; display: block; margin-bottom: 12px; }

        /* ── FOOTER ── */
        .footer {
            text-align: center;
            padding: 18px;
            font-size: .8rem;
            color: #94a3b8;
            margin-top: 24px;
            border-top: 1px solid #e2e8f0;
        }
    </style>

    @stack('styles')
</head>
<body>

    {{-- ── TOP NAVIGATION BAR ── --}}
    <nav class="navbar top-navbar px-3">
        <a class="navbar-brand-custom" href="{{ route('produksi.index') }}">
            <i class="bi bi-boxes me-2"></i>Sistem Produksi <span>MBG</span>
        </a>
        <ul class="navbar-nav flex-row gap-1 ms-auto align-items-center">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('produksi.index') ? 'active' : '' }}"
                   href="{{ route('produksi.index') }}">
                    <i class="bi bi-list-ul"></i> Data Produksi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('produksi.create') ? 'active' : '' }}"
                   href="{{ route('produksi.create') }}">
                    <i class="bi bi-plus-circle"></i> Tambah Data
                </a>
            </li>

            {{-- Divider --}}
            <li class="nav-item">
                <span style="width:1px;height:20px;background:rgba(255,255,255,.2);display:inline-block;margin:0 6px;"></span>
            </li>

            {{-- User Info + Logout Dropdown --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center gap-2"
                   href="#"
                   id="userDropdown"
                   data-bs-toggle="dropdown"
                   aria-expanded="false"
                   style="padding: .4rem .9rem !important;">
                    <span style="
                        width:30px;height:30px;border-radius:50%;
                        background:rgba(255,255,255,.2);
                        display:inline-flex;align-items:center;justify-content:center;
                        font-size:.8rem;font-weight:700;color:#fff;
                        border:1.5px solid rgba(255,255,255,.3);
                        flex-shrink:0;
                    ">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </span>
                    <span style="font-size:.85rem;font-weight:600;max-width:120px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                        {{ Auth::user()->name }}
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="userDropdown"
                    style="border:none;border-radius:12px;min-width:220px;padding:8px;margin-top:6px;">
                    <li>
                        <div style="padding:10px 14px 12px;border-bottom:1px solid #f1f5f9;margin-bottom:4px;">
                            <div style="font-size:.85rem;font-weight:700;color:#0f172a;">{{ Auth::user()->name }}</div>
                            <div style="font-size:.78rem;color:#64748b;margin-top:2px;">{{ Auth::user()->email }}</div>
                            <span style="display:inline-flex;align-items:center;gap:4px;background:#dbeafe;color:#1d4ed8;font-size:.72rem;font-weight:700;padding:2px 8px;border-radius:10px;margin-top:6px;">
                                <i class="bi bi-shield-fill-check"></i> Administrator
                            </span>
                        </div>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" id="logoutForm">
                            @csrf
                            <button type="button"
                                    onclick="document.getElementById('logoutForm').submit()"
                                    class="dropdown-item d-flex align-items-center gap-2"
                                    style="border-radius:8px;color:#dc2626;font-weight:600;font-size:.875rem;padding:9px 14px;">
                                <i class="bi bi-box-arrow-right"></i> Keluar
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    {{-- ── MAIN CONTENT ── --}}
    <main class="main-content">
        @yield('content')
    </main>

    {{-- ── FOOTER ── --}}
    <footer class="footer">
        &copy; {{ date('Y') }} Sistem Informasi Pengelolaan Data Produksi &mdash; MBG. All rights reserved.
    </footer>

    {{-- Bootstrap 5 JS Bundle CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
