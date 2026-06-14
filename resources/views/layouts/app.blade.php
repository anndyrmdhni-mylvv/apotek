<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Apotek NindyaFarma">

    <title>NindyaFarma — @yield('page-title', 'Dashboard')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-body: #eef2f7;
            --sidebar-top: #146c43;
            --sidebar-bottom: #0a3d25;
            --accent: #198754;
            --accent-light: #d1fae5;
            --card-bg: #ffffff;
            --text-primary: #1a1a2e;
            --text-secondary: #6b7280;
            --border-color: #e5e7eb;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg-body);
            color: var(--text-primary);
            margin: 0;
        }

        /* ── Perbaikan Layout Utama ── */
        .wrapper {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        /* ── Sidebar (Fixed/Sticky) ── */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, var(--sidebar-top) 0%, var(--sidebar-bottom) 100%);
            display: flex;
            flex-direction: column;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.08);
            overflow-y: auto;
            z-index: 1000;
        }

        /* decorative circles */
        .sidebar::before {
            content: '';
            position: absolute;
            width: 180px; height: 180px;
            background: rgba(255,255,255,0.04);
            border-radius: 50%;
            top: -60px; right: -60px;
        }

        .sidebar::after {
            content: '';
            position: absolute;
            width: 120px; height: 120px;
            background: rgba(255,255,255,0.03);
            border-radius: 50%;
            bottom: 60px; left: -40px;
        }

        .sidebar a {
            position: relative;
            z-index: 1;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 4px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar a:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.12);
            transform: translateX(4px);
        }

        .sidebar a.active {
            background: #ffffff;
            color: var(--accent) !important;
            font-weight: 700;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
        }

        .sidebar a.active i {
            color: var(--accent);
        }

        .sidebar a i {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        /* ── Main Content Container ── */
        .content {
            flex-grow: 1;
            margin-left: 260px; /* Menghindari konten tertutup sidebar */
            padding: 24px 28px;
            min-height: 100vh;
        }

        /* ── Navbar Top Bar ── */
        .top-navbar {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 16px 24px;
            margin-bottom: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
        }

        .top-navbar h4 {
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
            font-size: 1.15rem;
        }

        .top-navbar .user-badge {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--accent-light);
            padding: 8px 16px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--accent);
        }

        .top-navbar .user-badge i {
            font-size: 1rem;
        }

        /* ── Cards ── */
        .card {
            border: 1px solid var(--border-color) !important;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.03) !important;
            background: var(--card-bg);
            transition: box-shadow 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 4px 20px rgba(0,0,0,0.06) !important;
        }

        /* ── Tables ── */
        .table {
            vertical-align: middle;
            font-size: 0.9rem;
        }

        .table thead th {
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid var(--accent) !important;
            background: var(--accent-light) !important;
            color: var(--accent);
            padding: 12px 16px;
        }

        .table tbody td {
            padding: 12px 16px;
            border-color: #f0f0f0;
        }

        .table-hover tbody tr:hover {
            background-color: #f8fdf9 !important;
        }

        /* ── Buttons ── */
        .btn {
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.85rem;
            padding: 8px 16px;
            transition: all 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-success {
            background: linear-gradient(135deg, #198754, #146c43);
            border: none;
            box-shadow: 0 2px 8px rgba(25, 135, 84, 0.3);
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #146c43, #0a3d25);
            box-shadow: 0 4px 12px rgba(25, 135, 84, 0.4);
        }

        .btn-warning {
            background: linear-gradient(135deg, #ffc107, #e0a800);
            border: none;
            color: #1a1a2e;
        }

        .btn-danger {
            background: linear-gradient(135deg, #dc3545, #b02a37);
            border: none;
            box-shadow: 0 2px 8px rgba(220, 53, 69, 0.3);
        }

        .btn-info {
            background: linear-gradient(135deg, #0dcaf0, #0aa2c0);
            border: none;
            color: #fff;
        }

        .btn-info:hover {
            color: #fff;
        }

        .btn-light {
            background: #f3f4f6;
            border: 1px solid var(--border-color);
            color: var(--text-secondary);
        }

        .btn-sm {
            padding: 5px 12px;
            font-size: 0.8rem;
            border-radius: 8px;
        }

        /* ── Alerts ── */
        .alert {
            border-radius: 12px;
            border: none;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .alert-success {
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            color: #065f46;
            border-left: 4px solid #198754;
        }

        .alert-danger {
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #991b1b;
            border-left: 4px solid #dc3545;
        }

        /* ── Form Controls ── */
        .form-control, .form-select {
            border-radius: 10px;
            border: 2px solid var(--border-color);
            padding: 10px 14px;
            font-size: 0.9rem;
            transition: all 0.2s ease;
            background-color: #f9fafb;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.1);
            background-color: #fff;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--text-primary);
            margin-bottom: 6px;
        }

        /* ── Pagination ── */
        .pagination {
            --bs-pagination-color: var(--accent);
            --bs-pagination-bg: #fff;
            --bs-pagination-border-color: var(--border-color);
            --bs-pagination-hover-color: #146c43;
            --bs-pagination-hover-bg: #e9ecef;
            --bs-pagination-hover-border-color: #dee2e6;
            --bs-pagination-focus-color: #146c43;
            --bs-pagination-focus-bg: #e9ecef;
            --bs-pagination-focus-box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
            --bs-pagination-active-color: #fff;
            --bs-pagination-active-bg: var(--accent);
            --bs-pagination-active-border-color: var(--accent);
            --bs-pagination-disabled-color: #6c757d;
            --bs-pagination-disabled-bg: #fff;
            --bs-pagination-disabled-border-color: var(--border-color);
        }

        /* ── Modal ── */
        .modal-content {
            border-radius: 20px;
        }

        /* ── Animation ── */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .content .card {
            animation: fadeInUp 0.4s ease forwards;
        }
    </style>
</head>
<body>

<div class="wrapper">

    @include('layouts.sidebar')

    <div class="content">

        @include('layouts.navbar')

        @yield('content')

    </div>

</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg p-2">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-danger" id="deleteModalLabel">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>Konfirmasi Hapus
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-3">
                Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger rounded-pill px-4" id="confirmDeleteBtn">Ya, Hapus</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg p-2">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-success" id="logoutModalLabel">
                    <i class="bi bi-box-arrow-right me-2"></i>Konfirmasi Keluar
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-3">
                Apakah Anda yakin ingin keluar dari sistem NindyaFarma?
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                <form action="/logout" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger rounded-pill px-4">Ya, Keluar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    let formToSubmit = null;
    const deleteModalElement = document.getElementById('deleteModal');
    if (deleteModalElement) {
        const deleteModal = new bootstrap.Modal(deleteModalElement);
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

        document.body.addEventListener('click', function (e) {
            const deleteBtn = e.target.closest('.btn-delete-trigger');
            if (deleteBtn) {
                e.preventDefault();
                formToSubmit = deleteBtn.closest('form');
                deleteModal.show();
            }
        });

        confirmDeleteBtn.addEventListener('click', function () {
            if (formToSubmit) {
                formToSubmit.submit();
            }
        });
    }
});
</script>

</body>
</html>