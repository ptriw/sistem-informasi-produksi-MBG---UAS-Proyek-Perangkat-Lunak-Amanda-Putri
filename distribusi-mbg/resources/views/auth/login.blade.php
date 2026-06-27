<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login Admin - Sistem Informasi Pengelolaan Data Produksi MBG">
    <title>Login Admin | Sistem Produksi MBG</title>

    {{-- Bootstrap 5 CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            background: #0f172a;
            overflow: hidden;
        }

        /* ── LEFT PANEL (Branding) ── */
        .left-panel {
            flex: 1;
            background: linear-gradient(135deg, #1e3a8a 0%, #1d4ed8 50%, #3b82f6 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 60px 48px;
            position: relative;
            overflow: hidden;
        }
        .left-panel::before {
            content: '';
            position: absolute;
            top: -80px; right: -80px;
            width: 320px; height: 320px;
            border-radius: 50%;
            background: rgba(255,255,255,.06);
        }
        .left-panel::after {
            content: '';
            position: absolute;
            bottom: -60px; left: -60px;
            width: 240px; height: 240px;
            border-radius: 50%;
            background: rgba(255,255,255,.04);
        }
        .brand-icon {
            width: 80px; height: 80px;
            background: rgba(255,255,255,.15);
            border-radius: 22px;
            display: flex; align-items: center; justify-content: center;
            font-size: 2.2rem;
            color: #fff;
            margin-bottom: 28px;
            backdrop-filter: blur(10px);
            border: 1.5px solid rgba(255,255,255,.2);
        }
        .left-panel h1 {
            color: #fff;
            font-size: 1.9rem;
            font-weight: 800;
            text-align: center;
            line-height: 1.3;
            margin-bottom: 14px;
        }
        .left-panel p {
            color: rgba(255,255,255,.75);
            text-align: center;
            font-size: .95rem;
            line-height: 1.6;
            max-width: 320px;
        }
        .feature-list {
            list-style: none;
            margin-top: 36px;
            width: 100%;
            max-width: 340px;
        }
        .feature-list li {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 0;
            color: rgba(255,255,255,.85);
            font-size: .875rem;
            font-weight: 500;
            border-bottom: 1px solid rgba(255,255,255,.1);
        }
        .feature-list li:last-child { border-bottom: none; }
        .feature-list li i {
            width: 32px; height: 32px;
            background: rgba(255,255,255,.15);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1rem;
            flex-shrink: 0;
        }

        /* ── RIGHT PANEL (Form) ── */
        .right-panel {
            width: 480px;
            background: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px 48px;
            position: relative;
        }
        .login-header {
            margin-bottom: 36px;
        }
        .login-header .badge-admin {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #dbeafe;
            color: #1d4ed8;
            font-size: .78rem;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 20px;
            margin-bottom: 14px;
            letter-spacing: .5px;
            text-transform: uppercase;
        }
        .login-header h2 {
            font-size: 1.75rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 6px;
        }
        .login-header p {
            color: #64748b;
            font-size: .9rem;
        }

        /* ── FORM ELEMENTS ── */
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: 600;
            font-size: .875rem;
            color: #374151;
            margin-bottom: 7px;
            display: block;
        }
        .input-wrapper {
            position: relative;
        }
        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1rem;
            pointer-events: none;
        }
        .form-control {
            width: 100%;
            padding: 11px 14px 11px 42px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-family: 'Inter', sans-serif;
            font-size: .9rem;
            color: #0f172a;
            transition: border .2s, box-shadow .2s;
            background: #f8fafc;
        }
        .form-control:focus {
            outline: none;
            border-color: #1d4ed8;
            box-shadow: 0 0 0 3px rgba(29,78,216,.12);
            background: #fff;
        }
        .form-control.is-invalid {
            border-color: #ef4444;
            background: #fff5f5;
        }
        .form-control.is-invalid:focus {
            box-shadow: 0 0 0 3px rgba(239,68,68,.12);
        }
        .invalid-feedback {
            color: #ef4444;
            font-size: .8rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Toggle password visibility */
        .toggle-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            padding: 0;
            font-size: 1rem;
            transition: color .2s;
        }
        .toggle-password:hover { color: #1d4ed8; }

        /* Remember me */
        .remember-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
        }
        .remember-row input[type="checkbox"] {
            width: 16px; height: 16px;
            accent-color: #1d4ed8;
            cursor: pointer;
        }
        .remember-row label {
            font-size: .875rem;
            color: #64748b;
            cursor: pointer;
            font-weight: 500;
        }

        /* Submit button */
        .btn-login {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #1e3a8a 0%, #1d4ed8 100%);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all .25s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            letter-spacing: .3px;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(29,78,216,.4);
        }
        .btn-login:active { transform: translateY(0); }

        /* Alert */
        .alert-error {
            background: #fef2f2;
            border: 1.5px solid #fecaca;
            border-radius: 10px;
            padding: 12px 16px;
            margin-bottom: 20px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: #b91c1c;
            font-size: .875rem;
            font-weight: 500;
        }
        .alert-success {
            background: #f0fdf4;
            border: 1.5px solid #bbf7d0;
            border-radius: 10px;
            padding: 12px 16px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #166534;
            font-size: .875rem;
            font-weight: 500;
        }

        /* Hint box */
        .hint-box {
            background: #f0f9ff;
            border: 1.5px solid #bae6fd;
            border-radius: 10px;
            padding: 12px 16px;
            margin-top: 24px;
            font-size: .8rem;
            color: #0369a1;
        }
        .hint-box strong { font-weight: 700; }

        /* Footer */
        .login-footer {
            text-align: center;
            margin-top: 28px;
            font-size: .78rem;
            color: #94a3b8;
        }

        /* Responsive */
        @media (max-width: 768px) {
            body { flex-direction: column; overflow: auto; }
            .left-panel { display: none; }
            .right-panel { width: 100%; padding: 40px 24px; }
        }
    </style>
</head>
<body>

    {{-- ── LEFT PANEL ── --}}
    <div class="left-panel">
        <div class="brand-icon">
            <i class="bi bi-boxes"></i>
        </div>
        <h1>Sistem Informasi Produksi MBG</h1>
        <p>Platform pengelolaan data produksi yang efisien, terstruktur, dan mudah digunakan.</p>

        <ul class="feature-list">
            <li>
                <i class="bi bi-clipboard2-data-fill"></i>
                Kelola data produksi secara real-time
            </li>
            <li>
                <i class="bi bi-graph-up-arrow"></i>
                Pantau status produksi dengan mudah
            </li>
            <li>
                <i class="bi bi-shield-lock-fill"></i>
                Akses aman dengan autentikasi admin
            </li>
            <li>
                <i class="bi bi-search"></i>
                Cari dan filter data dengan cepat
            </li>
        </ul>
    </div>

    {{-- ── RIGHT PANEL (FORM LOGIN) ── --}}
    <div class="right-panel">

        <div class="login-header">
            <span class="badge-admin"><i class="bi bi-shield-fill-check"></i> Admin Panel</span>
            <h2>Selamat Datang</h2>
            <p>Masuk ke akun admin untuk mengelola data produksi.</p>
        </div>

        {{-- Alert sukses (misalnya setelah logout) --}}
        @if(session('success'))
            <div class="alert-success">
                <i class="bi bi-check-circle-fill" style="font-size:1.1rem;flex-shrink:0;"></i>
                {{ session('success') }}
            </div>
        @endif

        {{-- Alert error umum --}}
        @if($errors->any())
            <div class="alert-error">
                <i class="bi bi-exclamation-triangle-fill" style="font-size:1.1rem;flex-shrink:0;margin-top:1px;"></i>
                <div>{{ $errors->first() }}</div>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf

            {{-- Email --}}
            <div class="form-group">
                <label for="email" class="form-label">Alamat Email</label>
                <div class="input-wrapper">
                    <i class="bi bi-envelope-fill input-icon"></i>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        value="{{ old('email') }}"
                        placeholder="admin@mbg.com"
                        required
                        autocomplete="email"
                        autofocus
                    >
                </div>
                @error('email')
                    <div class="invalid-feedback">
                        <i class="bi bi-exclamation-circle-fill"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <div class="input-wrapper">
                    <i class="bi bi-lock-fill input-icon"></i>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        placeholder="Masukkan password..."
                        required
                        autocomplete="current-password"
                    >
                    <button type="button" class="toggle-password" onclick="togglePassword()" id="toggleBtn">
                        <i class="bi bi-eye-fill" id="eyeIcon"></i>
                    </button>
                </div>
                @error('password')
                    <div class="invalid-feedback">
                        <i class="bi bi-exclamation-circle-fill"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Remember Me --}}
            <div class="remember-row">
                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Ingat saya selama 30 hari</label>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-login" id="loginBtn">
                <i class="bi bi-box-arrow-in-right"></i>
                Masuk ke Dashboard
            </button>

        </form>

        {{-- Hint kredensial default --}}
        <div class="hint-box">
            <strong><i class="bi bi-info-circle-fill me-1"></i>Kredensial Default Admin:</strong><br>
            Email: <strong>admin@mbg.com</strong> &nbsp;|&nbsp; Password: <strong>admin123</strong>
        </div>

        <div class="login-footer">
            &copy; {{ date('Y') }} Sistem Informasi Produksi MBG &mdash; All rights reserved.
        </div>

    </div>

    <script>
        // Toggle show/hide password
        function togglePassword() {
            var input  = document.getElementById('password');
            var icon   = document.getElementById('eyeIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'bi bi-eye-slash-fill';
            } else {
                input.type = 'password';
                icon.className = 'bi bi-eye-fill';
            }
        }

        // Loading state pada tombol login
        document.querySelector('form').addEventListener('submit', function() {
            var btn = document.getElementById('loginBtn');
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status"></span> Memproses...';
            btn.disabled = true;
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
