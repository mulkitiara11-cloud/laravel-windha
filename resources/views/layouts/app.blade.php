<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Inter:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        :root {
            --colors-primary: #9fe870;         /* Wise Lime Green */
            --colors-primary-hover: #cdffad;   /* Wise Green Hover */
            --colors-primary-neutral: #c5edab; /* Mid active fill */
            --colors-primary-pale: #e2f6d5;    /* Light green surface tint */
            --colors-canvas: #ffffff;          /* Card interiors (pure white) */
            --colors-canvas-soft: #e8ebe6;     /* Page background (sage-tinted) */
            --colors-ink: #0e0f0c;             /* Text & headings (near-black) */
            --colors-ink-deep: #163300;        /* Forest green ink */
            --colors-body: #454745;            /* Secondary body copy */
            --colors-mute: #868685;            /* Muted captions/borders */
            
            --colors-success: #2ead4b;
            --colors-warning: #ffd11a;
            --colors-danger: #d03238;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--colors-canvas-soft); /* Sage page background */
            margin: 0;
            padding: 0;
            color: var(--colors-ink);
            -webkit-font-smoothing: antialiased;
        }
        
        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 280px;
            background: var(--colors-canvas); /* Pure White Sidebar */
            padding: 0;
            z-index: 1000;
            border-right: 1px solid rgba(14, 15, 12, 0.08);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .sidebar-brand {
            padding: 2.5rem 1.5rem;
            border-bottom: 1px solid rgba(14, 15, 12, 0.08);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .brand-logo-orb {
            width: 44px;
            height: 44px;
            background-color: var(--colors-primary);
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--colors-ink);
            flex-shrink: 0;
        }
        .sidebar-brand h3 {
            font-weight: 900;
            font-size: 1.15rem;
            color: var(--colors-ink);
            margin: 0;
            letter-spacing: -0.5px;
            text-transform: uppercase;
            line-height: 1.1;
        }
        .sidebar-brand h3 span {
            color: var(--colors-primary-neutral);
        }
        .sidebar-brand small {
            font-size: 0.72rem;
            color: var(--colors-body);
            display: block;
            margin-top: 2px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }
        .sidebar-menu {
            list-style: none;
            padding: 1.5rem 1rem;
            margin: 0;
        }
        .sidebar-menu li {
            margin-bottom: 0.5rem;
            position: relative;
        }
        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 0.875rem 1.25rem;
            color: var(--colors-body);
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 12px;
        }
        .sidebar-menu a:hover {
            background: var(--colors-canvas-soft);
            color: var(--colors-ink);
        }
        .sidebar-menu a.active {
            background: var(--colors-primary-pale); /* Pale green badge bg */
            color: var(--colors-ink-deep); /* Forest green active text */
        }
        .sidebar-menu a i {
            margin-right: 1rem;
            font-size: 1.15rem;
            width: 20px;
            text-align: center;
            color: var(--colors-body);
            transition: color 0.2s ease;
        }
        .sidebar-menu a.active i, .sidebar-menu a:hover i {
            color: var(--colors-ink-deep);
        }
        .logout-btn {
            color: var(--colors-danger) !important;
        }
        .logout-btn:hover {
            background: rgba(208, 50, 56, 0.05) !important;
            color: var(--colors-danger) !important;
        }
        
        /* MAIN CONTENT */
        .main-content {
            margin-left: 280px;
            padding: 0;
            min-height: 100vh;
            background: var(--colors-canvas-soft);
        }
        .content-container {
            padding: 2.5rem 3rem;
        }
        
        /* TOP BAR SAGE (Wise Hero Band) */
        .top-bar-sage {
            background: var(--colors-canvas-soft);
            color: var(--colors-ink);
            padding: 4rem 3rem 2rem 3rem;
            position: relative;
            overflow: hidden;
        }
        .top-bar-sage h1, .top-bar-sage h4 {
            font-weight: 900;
            font-size: 3rem;
            letter-spacing: -1.5px;
            margin: 0;
            color: var(--colors-ink);
            line-height: 1.1;
        }
        .top-bar-sage p, .top-bar-sage small {
            color: var(--colors-body);
            font-weight: 500;
            font-size: 1.1rem;
            margin-top: 0.5rem;
            display: block;
        }
        .top-bar-sage small strong {
            color: var(--colors-ink);
        }
        
        /* CARDS */
        .card {
            border: none !important;
            border-radius: 24px !important; /* Wise 24px radius */
            box-shadow: none !important;
            background: var(--colors-canvas) !important;
            overflow: hidden;
            margin-bottom: 2.5rem;
        }
        .card-header {
            background: var(--colors-canvas) !important;
            color: var(--colors-ink) !important;
            border-bottom: 1px solid rgba(14,15,12,0.06) !important;
            padding: 1.5rem 2rem !important;
            font-weight: 900 !important;
            font-size: 1.1rem !important;
            letter-spacing: -0.2px !important;
        }
        .card-body {
            padding: 2rem !important;
        }
        
        /* STATS CARD WISE STYLE */
        .stat-card {
            background: var(--colors-canvas);
            border-radius: 24px;
            padding: 2.5rem 2.25rem;
            height: 100%;
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
            border: none;
        }
        .stat-card.blue {
            background: var(--colors-canvas);
            border: 1px solid rgba(14, 15, 12, 0.05);
        }
        .stat-card.green {
            background: var(--colors-primary-pale);
            border: none;
        }
        .stat-card h6 {
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 1rem;
            color: var(--colors-body);
        }
        .stat-card.green h6 {
            color: var(--colors-ink-deep);
        }
        .stat-card h2 {
            font-size: 4.5rem;
            font-weight: 900;
            margin: 0;
            line-height: 1;
            letter-spacing: -2px;
            color: var(--colors-ink);
        }
        .stat-card.green h2 {
            color: var(--colors-ink-deep);
        }
        .stat-card::after {
            content: '';
            position: absolute;
            right: 20px;
            bottom: 20px;
            width: 100px;
            height: 100px;
            opacity: 0.05;
            background-size: contain;
            background-repeat: no-repeat;
            pointer-events: none;
        }
        .stat-card.blue::after {
            opacity: 0.03;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='black' viewBox='0 0 24 24'%3E%3Cpath d='M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z'/%3E%3C/svg%3E");
        }
        .stat-card.green::after {
            opacity: 0.1;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23163300' viewBox='0 0 24 24'%3E%3Cpath d='M12 3L1 9l11 6 9-4.91V17h2V9L12 3z'/%3E%3C/svg%3E");
        }
        
        /* STATS BREAKDOWN */
        .stats-breakdown {
            background: var(--colors-canvas-soft);
            border-radius: 16px;
            padding: 1.5rem 1.75rem;
            transition: all 0.2s ease;
        }
        .stats-breakdown:hover {
            background: var(--colors-primary-pale);
        }
        
        /* TABLE */
        .table {
            margin-bottom: 0;
            width: 100%;
        }
        .table thead th {
            background: var(--colors-canvas-soft) !important;
            color: var(--colors-ink) !important;
            font-weight: 700 !important;
            border-bottom: 2px solid var(--colors-mute) !important;
            padding: 1.25rem 1.5rem !important;
            font-size: 0.8rem !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
        }
        .table tbody td {
            padding: 1.25rem 1.5rem !important;
            vertical-align: middle;
            border-bottom: 1px solid rgba(14,15,12,0.06) !important;
            color: var(--colors-body);
            font-size: 0.95rem;
        }
        .table tbody tr:hover {
            background: var(--colors-canvas-soft) !important;
        }
        
        /* BUTTONS */
        .btn {
            padding: 0.875rem 2rem;
            font-weight: 600;
            border-radius: 24px !important; /* Wise 24px radius pill */
            font-size: 0.95rem;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: none;
        }
        .btn-primary {
            background: var(--colors-primary) !important;
            color: var(--colors-ink) !important;
        }
        .btn-primary:hover {
            background: var(--colors-primary-hover) !important;
            transform: scale(1.02);
        }
        .btn-secondary {
            background: var(--colors-primary-pale) !important;
            color: var(--colors-ink-deep) !important;
        }
        .btn-secondary:hover {
            background: var(--colors-primary-neutral) !important;
            transform: scale(1.02);
        }
        .btn-warning {
            background: var(--colors-canvas-soft) !important;
            color: var(--colors-ink) !important;
        }
        .btn-warning:hover {
            background: var(--colors-mute) !important;
            transform: scale(1.02);
        }
        .btn-danger {
            background: var(--colors-danger) !important;
            color: var(--colors-canvas) !important;
        }
        .btn-danger:hover {
            opacity: 0.9;
            transform: scale(1.02);
        }
        .btn-sm {
            padding: 0.5rem 1.25rem !important;
            font-size: 0.8rem !important;
            font-weight: 600;
            border-radius: 24px !important;
        }
        
        /* FORM */
        .form-label {
            font-weight: 600;
            color: var(--colors-ink);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
        .form-control, .form-select {
            border: 1px solid var(--colors-mute) !important;
            border-radius: 12px !important; /* Wise 12px radius */
            padding: 0.875rem 1.15rem !important;
            font-size: 0.95rem !important;
            background-color: var(--colors-canvas) !important;
            color: var(--colors-ink) !important;
            transition: all 0.2s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--colors-ink) !important;
            box-shadow: 0 0 0 3px rgba(14, 15, 12, 0.08) !important;
            outline: none !important;
        }
        
        /* BADGE */
        .badge {
            padding: 0.5rem 1rem;
            font-weight: 700;
            border-radius: 9999px !important;
            font-size: 0.8rem;
        }
        .bg-light.text-dark {
            background-color: var(--colors-primary-pale) !important;
            color: var(--colors-ink-deep) !important;
        }
        
        /* ALERT */
        .alert {
            border: none;
            border-radius: 12px;
            padding: 1.25rem 1.5rem;
            font-size: 0.95rem;
            font-weight: 600;
        }
        .alert-success {
            background: var(--colors-primary-pale);
            color: var(--colors-ink-deep);
        }
        
        /* AUTH CONTAINER (Wise Clean Scandinavian Style) */
        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--colors-canvas-soft); /* Sage background */
            padding: 2rem;
            position: relative;
        }
        .auth-card {
            width: 100%;
            max-width: 500px;
            background: var(--colors-canvas);
            border-radius: 24px;
            padding: 3.5rem 3rem;
            box-shadow: none !important;
            border: 1px solid rgba(14, 15, 12, 0.05) !important;
        }
        .auth-card h2 {
            font-weight: 900;
            font-size: 2.25rem;
            letter-spacing: -1px;
            color: var(--colors-ink);
            margin-bottom: 0.5rem;
            text-align: center;
        }
        .auth-card p {
            color: var(--colors-body);
            text-align: center;
            margin-bottom: 2.5rem;
            font-size: 1rem;
            font-weight: 500;
        }
        
        /* RESPONSIVE */
        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .content-container {
                padding: 1.5rem;
            }
            .top-bar-sage {
                padding: 3rem 1.5rem 1.5rem 1.5rem;
            }
            .top-bar-sage h1, .top-bar-sage h4 {
                font-size: 2.25rem;
            }
        }
    </style>
</head>
<body>
    @auth
    <!-- Mobile Header -->
    <div class="d-flex d-lg-none align-items-center justify-content-between px-3 py-3" style="background-color: var(--colors-canvas); border-bottom: 1px solid rgba(14,15,12,0.08); position: sticky; top: 0; z-index: 999;">
        <div class="d-flex align-items-center gap-2">
            <div class="brand-logo-orb" style="width: 32px; height: 32px; border-radius: 16px;">
                <i class="bi bi-mortarboard-fill" style="color: var(--colors-ink); font-size: 1rem;"></i>
            </div>
            <h4 class="mb-0 fw-bold" style="font-size: 1rem; letter-spacing: -0.5px; color: var(--colors-ink);">SISTEM MAHASISWA</h4>
        </div>
        <button class="btn btn-sm btn-primary border-0 px-2 py-1" id="sidebarToggle">
            <i class="bi bi-list fs-4" style="color: var(--colors-ink);"></i>
        </button>
    </div>

    <div class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-logo-orb">
                <i class="bi bi-mortarboard-fill" style="color: var(--colors-ink); font-size: 1.25rem;"></i>
            </div>
            <div>
                <h3 class="mb-0">ACADEMIC</h3>
                <small>Sistem Mahasiswa</small>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') || request()->routeIs('home') ? 'active' : '' }}">
                    <i class="bi bi-grid-fill"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('mahasiswa.index') }}" class="{{ request()->routeIs('mahasiswa.index') || request()->routeIs('mahasiswa.edit') || request()->routeIs('mahasiswa.show') ? 'active' : '' }}">
                    <i class="bi bi-people-fill"></i> Data Mahasiswa
                </a>
            </li>
            <li>
                <a href="{{ route('mahasiswa.create') }}" class="{{ request()->routeIs('mahasiswa.create') ? 'active' : '' }}">
                    <i class="bi bi-plus-circle-fill"></i> Tambah Data
                </a>
            </li>

            <li class="mt-4 pt-3" style="border-top: 1px solid rgba(14,15,12,0.06);">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout-btn">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

    <div class="main-content">
        @yield('content')
    </div>
    @else
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
    @endauth

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarToggle')?.addEventListener('click', function(e) {
            e.stopPropagation();
            document.querySelector('.sidebar').classList.toggle('show');
        });
        document.addEventListener('click', function(e) {
            const sidebar = document.querySelector('.sidebar');
            if (sidebar && sidebar.classList.contains('show') && !sidebar.contains(e.target) && e.target.id !== 'sidebarToggle' && !e.target.closest('#sidebarToggle')) {
                sidebar.classList.remove('show');
            }
        });
    </script>
</body>
</html>
