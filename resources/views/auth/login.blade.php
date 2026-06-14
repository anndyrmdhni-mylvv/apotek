<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login ke Sistem Informasi Apotek NindyaFarma">

    <title>Login — NindyaFarma</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #0f5132 0%, #146c43 30%, #198754 60%, #1a9d5a 100%);
            overflow: hidden;
            position: relative;
        }

        /* ── Animated floating orbs ── */
        .bg-orbs {
            position: fixed;
            inset: 0;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .bg-orbs .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.3;
            animation: float 20s ease-in-out infinite;
        }

        .bg-orbs .orb:nth-child(1) {
            width: 400px; height: 400px;
            background: #25d366;
            top: -100px; left: -100px;
            animation-delay: 0s;
        }

        .bg-orbs .orb:nth-child(2) {
            width: 350px; height: 350px;
            background: #0dcaf0;
            bottom: -80px; right: -80px;
            animation-delay: -5s;
            animation-duration: 25s;
        }

        .bg-orbs .orb:nth-child(3) {
            width: 250px; height: 250px;
            background: #6f42c1;
            top: 50%; left: 60%;
            animation-delay: -10s;
            animation-duration: 18s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25% { transform: translate(30px, -50px) scale(1.05); }
            50% { transform: translate(-20px, 20px) scale(0.95); }
            75% { transform: translate(50px, 30px) scale(1.02); }
        }

        /* ── Login container ── */
        .login-wrapper {
            position: relative;
            z-index: 1;
            display: flex;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            display: flex;
            width: 100%;
            max-width: 900px;
            border-radius: 24px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow:
                0 25px 50px rgba(0, 0, 0, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.05) inset;
            animation: cardSlideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            transform: translateY(40px);
        }

        @keyframes cardSlideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ── Left panel (branding) ── */
        .login-brand {
            flex: 1;
            background: linear-gradient(160deg, rgba(255,255,255,0.12) 0%, rgba(255,255,255,0.02) 100%);
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .login-brand::before {
            content: '';
            position: absolute;
            width: 200px; height: 200px;
            background: rgba(255,255,255,0.06);
            border-radius: 50%;
            top: -60px; right: -60px;
        }

        .login-brand::after {
            content: '';
            position: absolute;
            width: 150px; height: 150px;
            background: rgba(255,255,255,0.04);
            border-radius: 50%;
            bottom: -40px; left: -40px;
        }

        .brand-icon {
            width: 90px;
            height: 90px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            font-size: 2.5rem;
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: iconPulse 3s ease-in-out infinite;
        }

        @keyframes iconPulse {
            0%, 100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(255,255,255,0.2); }
            50% { transform: scale(1.04); box-shadow: 0 0 30px 5px rgba(255,255,255,0.1); }
        }

        .brand-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }

        .brand-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.6;
            max-width: 260px;
        }

        .brand-features {
            margin-top: 36px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .brand-feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.85rem;
            font-weight: 500;
        }

        .brand-feature-item i {
            width: 30px;
            height: 30px;
            background: rgba(255,255,255,0.12);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.85rem;
        }

        /* ── Right panel (form) ── */
        .login-form-panel {
            flex: 1;
            background: #fff;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            margin-bottom: 32px;
        }

        .form-header h2 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 6px;
        }

        .form-header p {
            color: #6b7280;
            font-size: 0.9rem;
            font-weight: 400;
        }

        /* ── Alert error ── */
        .alert-login-error {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            border: 1px solid #fca5a5;
            color: #991b1b;
            border-radius: 12px;
            padding: 14px 18px;
            font-size: 0.85rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 24px;
            animation: shakeX 0.5s ease-in-out;
        }

        .alert-login-error i {
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        @keyframes shakeX {
            0%, 100% { transform: translateX(0); }
            20% { transform: translateX(-8px); }
            40% { transform: translateX(8px); }
            60% { transform: translateX(-4px); }
            80% { transform: translateX(4px); }
        }

        /* ── Input groups ── */
        .input-group-custom {
            margin-bottom: 22px;
        }

        .input-group-custom label {
            font-size: 0.8rem;
            font-weight: 600;
            color: #374151;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 8px;
            display: block;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i.input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 1rem;
            transition: color 0.3s ease;
            pointer-events: none;
        }

        .input-wrapper input {
            width: 100%;
            padding: 14px 16px 14px 46px;
            border: 2px solid #e5e7eb;
            border-radius: 14px;
            font-size: 0.95rem;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 500;
            color: #1a1a2e;
            background: #f9fafb;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            outline: none;
        }

        .input-wrapper input::placeholder {
            color: #9ca3af;
            font-weight: 400;
        }

        .input-wrapper input:focus {
            border-color: #198754;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(25, 135, 84, 0.1);
        }

        .input-wrapper input:focus + i,
        .input-wrapper input:focus ~ i.input-icon {
            color: #198754;
        }

        /* Fix: icon color on focus via sibling */
        .input-wrapper:has(input:focus) i.input-icon {
            color: #198754;
        }

        /* ── Toggle password ── */
        .toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #9ca3af;
            cursor: pointer;
            font-size: 1.1rem;
            padding: 4px;
            transition: color 0.2s ease;
        }

        .toggle-password:hover {
            color: #198754;
        }

        /* ── Submit button ── */
        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #198754 0%, #146c43 100%);
            color: #fff;
            border: none;
            border-radius: 14px;
            font-size: 1rem;
            font-weight: 700;
            font-family: 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            position: relative;
            overflow: hidden;
            margin-top: 8px;
        }

        .btn-login::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(25, 135, 84, 0.4);
        }

        .btn-login:hover::before {
            opacity: 1;
        }

        .btn-login:active {
            transform: translateY(0);
            box-shadow: 0 4px 12px rgba(25, 135, 84, 0.3);
        }

        /* ── Footer ── */
        .login-footer {
            margin-top: 32px;
            text-align: center;
            color: #9ca3af;
            font-size: 0.78rem;
        }

        .login-footer span {
            color: #198754;
            font-weight: 600;
        }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .login-brand {
                display: none;
            }

            .login-card {
                max-width: 440px;
            }

            .login-form-panel {
                padding: 40px 28px;
            }
        }
    </style>
</head>
<body>

<!-- Animated background orbs -->
<div class="bg-orbs">
    <div class="orb"></div>
    <div class="orb"></div>
    <div class="orb"></div>
</div>

<div class="login-wrapper">

    <div class="login-card">

        <!-- Left: Branding panel -->
        <div class="login-brand">

            <div class="brand-icon">
                <i class="bi bi-capsule-pill"></i>
            </div>

            <h1 class="brand-title">NindyaFarma</h1>

            <p class="brand-subtitle">
                Sistem Informasi Apotek modern untuk mengelola data obat, transaksi, dan pelanggan Anda.
            </p>

            <div class="brand-features">
                <div class="brand-feature-item">
                    <i class="bi bi-shield-check"></i>
                    Keamanan data terjamin
                </div>
                <div class="brand-feature-item">
                    <i class="bi bi-speedometer2"></i>
                    Proses cepat & efisien
                </div>
                <div class="brand-feature-item">
                    <i class="bi bi-graph-up-arrow"></i>
                    Laporan akurat
                </div>
            </div>

        </div>

        <!-- Right: Login form -->
        <div class="login-form-panel">

            <div class="form-header">
                <h2>Selamat Datang! 👋</h2>
                <p>Masukkan kredensial untuk mengakses dashboard.</p>
            </div>

            @if(session('error'))
                <div class="alert-login-error">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    {{ session('error') }}
                </div>
            @endif

            <form action="/login" method="POST" id="loginForm">

                @csrf

                <div class="input-group-custom">
                    <label for="username">Username</label>
                    <div class="input-wrapper">
                        <input type="text"
                               id="username"
                               name="username"
                               placeholder="Masukkan username"
                               autocomplete="username"
                               required>
                        <i class="bi bi-person input-icon"></i>
                    </div>
                </div>

                <div class="input-group-custom">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <input type="password"
                               id="password"
                               name="password"
                               placeholder="Masukkan password"
                               autocomplete="current-password"
                               required>
                        <i class="bi bi-lock input-icon"></i>
                        <button type="button" class="toggle-password" aria-label="Toggle password visibility">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-login" id="btnLogin">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Masuk ke Dashboard
                </button>

            </form>

            <div class="login-footer">
                &copy; {{ date('Y') }} <span>NindyaFarma</span> — All rights reserved.
            </div>

        </div>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Toggle password visibility
    const toggleBtn = document.querySelector('.toggle-password');
    const passwordInput = document.getElementById('password');

    if (toggleBtn && passwordInput) {
        toggleBtn.addEventListener('click', function () {
            const icon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
    }

    // Auto-focus on username field
    const usernameInput = document.getElementById('username');
    if (usernameInput) {
        usernameInput.focus();
    }
});
</script>

</body>
</html>