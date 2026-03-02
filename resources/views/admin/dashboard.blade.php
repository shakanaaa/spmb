<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin SPMB - Tema Hijau Terang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'display': ['Space Grotesk', 'sans-serif'],
                        'body': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        // Tema Hijau Terang
                        bg: '#f0fdf4', // Green-50
                        surface: '#ffffff', 
                        card: '#ffffff',
                        border: '#bbf7d0', // Green-200
                        muted: '#15803d', // Green-700 (untuk teks sekunder)
                        accent: '#16a34a', // Green-600
                        'accent-light': '#22c55e', // Green-500
                        'accent-dark': '#15803d', // Green-700
                        warning: '#f59e0b',
                        danger: '#ef4444',
                        'text-main': '#14532d', // Green-900 (untuk teks utama)
                        'text-secondary': '#166534', // Green-800
                    }
                }
            }
        }
    </script>
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Space Grotesk', sans-serif;
        }

        body {
            background: #f0fdf4;
            color: #14532d;
        }

        /* Custom scrollbar for light theme */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #dcfce7;
        }
        ::-webkit-scrollbar-thumb {
            background: #86efac;
            border-radius: 3px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #4ade80;
        }

        /* Gradient backgrounds for light theme */
        .gradient-mesh {
            background: 
                radial-gradient(ellipse at 20% 0%, rgba(134, 239, 172, 0.4) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 100%, rgba(74, 222, 128, 0.2) 0%, transparent 50%),
                radial-gradient(ellipse at 50% 50%, rgba(167, 243, 208, 0.3) 0%, transparent 70%);
        }

        /* Card styling */
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
            border-color: #4ade80;
        }

        /* Menu item for light theme */
        .menu-item {
            position: relative;
            transition: all 0.2s ease;
        }
        .menu-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 0;
            background: #16a34a;
            border-radius: 0 2px 2px 0;
            transition: height 0.2s ease;
        }
        .menu-item:hover::before,
        .menu-item.active::before {
            height: 60%;
        }
        .menu-item.active {
            background: rgba(167, 243, 208, 0.5);
            color: #14532d;
            font-weight: 600;
        }
        
        .menu-item:hover {
            background: rgba(167, 243, 208, 0.3);
        }

        /* Table row hover */
        .table-row {
            transition: background 0.15s ease;
        }
        .table-row:hover {
            background: rgba(167, 243, 208, 0.3);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.5s ease forwards;
        }

        .animate-slide-in-left {
            animation: slideInLeft 0.4s ease forwards;
        }

        /* Stagger delays */
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }

        /* Button effects */
        .btn-primary {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            transition: all 0.2s ease;
            color: white;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(34, 197, 94, 0.3);
        }
        .btn-primary:active {
            transform: translateY(0);
        }

        /* Status badge */
        .badge {
            font-size: 0.75rem;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-weight: 600;
        }

        /* Chart bars */
        .chart-bar {
            transition: height 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Mobile sidebar */
        .sidebar-overlay {
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(4px);
        }

        /* Input Styling */
        input, select, textarea {
            background-color: #f0fdf4 !important;
            border-color: #bbf7d0 !important;
            color: #14532d !important;
        }
        input::placeholder {
            color: #166534 !important;
            opacity: 0.7;
        }
        input:focus, select:focus, textarea:focus {
            border-color: #22c55e !important;
            box-shadow: 0 0 0 2px rgba(34, 197, 94, 0.2) !important;
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body class="min-h-screen text-text-main">
    <!-- Mobile Sidebar Overlay -->
    <div id="sidebarOverlay" class="sidebar-overlay fixed inset-0 z-40 hidden lg:hidden" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-surface border-r border-border z-50 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 shadow-lg">
        <div class="flex flex-col h-full">
            <!-- Logo -->
            <div class="p-6 border-b border-border">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-accent-light to-accent flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-text-main">SPMB</h1>
                        <p class="text-xs text-muted">Admin Panel</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
                <a href="#" class="menu-item active flex items-center gap-3 px-4 py-3 rounded-lg" data-page="dashboard">
                    <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                    </svg>
                    <span class="font-medium text-text-main">Dashboard</span>
                </a>
                <a href="#" class="menu-item flex items-center gap-3 px-4 py-3 rounded-lg text-text-secondary hover:text-text-main" data-page="user">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span class="font-medium">User</span>
                </a>
                <a href="#" class="menu-item flex items-center gap-3 px-4 py-3 rounded-lg text-text-secondary hover:text-text-main" data-page="gelombang">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    <span class="font-medium">Gelombang</span>
                </a>
                <a href="#" class="menu-item flex items-center gap-3 px-4 py-3 rounded-lg text-text-secondary hover:text-text-main" data-page="pendaftar">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="font-medium">Pendaftar</span>
                </a>
                <a href="#" class="menu-item flex items-center gap-3 px-4 py-3 rounded-lg text-text-secondary hover:text-text-main" data-page="jalur">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                    <span class="font-medium">Jalur</span>
                </a>

                <div class="pt-4 mt-4 border-t border-border">
                    <p class="px-4 text-xs text-muted uppercase tracking-wider mb-2">Pengaturan</p>
                    <a href="#" class="menu-item flex items-center gap-3 px-4 py-3 rounded-lg text-text-secondary hover:text-text-main">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="font-medium">Pengaturan</span>
                    </a>
                </div>
            </nav>

            <!-- User Profile -->
            <div class="p-4 border-t border-border">
                <div class="flex items-center gap-3 p-3 rounded-lg bg-green-50">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-accent to-accent-dark flex items-center justify-center text-white font-bold shadow-inner">
                        A
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-text-main truncate">Administrator</p>
                        <p class="text-xs text-muted truncate">admin@spmb.ac.id</p>
                    </div>
                    <button class="p-2 rounded-lg hover:bg-green-100 transition-colors" title="Logout">
                        <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="lg:ml-64 min-h-screen gradient-mesh">
        <!-- Header -->
        <header class="sticky top-0 z-30 bg-white/80 backdrop-blur-xl border-b border-border shadow-sm">
            <div class="flex items-center justify-between px-4 lg:px-8 py-4">
                <div class="flex items-center gap-4">
                    <button id="menuToggle" class="lg:hidden p-2 rounded-lg bg-green-50 hover:bg-green-100 transition-colors" onclick="toggleSidebar()">
                        <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <div class="hidden sm:block">
                        <h2 class="text-xl font-bold text-text-main" id="pageTitle">Dashboard</h2>
                        <p class="text-sm text-muted">Selamat datang kembali, Admin</p>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <!-- Search -->
                    <div class="relative hidden md:block">
                        <input type="text" placeholder="Cari..." class="w-64 pl-10 pr-4 py-2.5 bg-green-50 border border-border rounded-xl text-sm text-text-main placeholder-muted focus:outline-none focus:border-accent focus:ring-1 focus:ring-accent transition-all">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>

                    <!-- Notifications -->
                    <button class="relative p-2.5 rounded-xl bg-green-50 border border-border hover:border-accent transition-colors">
                        <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        <span class="absolute -top-1 -right-1 w-4 h-4 bg-danger rounded-full text-xs flex items-center justify-center text-white">3</span>
                    </button>

                    <!-- Date -->
                    <div class="hidden lg:flex items-center gap-2 px-4 py-2.5 bg-green-50 border border-border rounded-xl">
                        <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-sm text-text-main font-medium" id="currentDate"></span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div id="pageContent" class="p-4 lg:p-8">
            <!-- Dashboard Page (Default) -->
            <div id="dashboardPage">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 mb-8">
                    <!-- Total Pendaftar -->
                    <div class="card-hover bg-white border border-border rounded-2xl p-6 opacity-0 animate-fade-in-up delay-100" style="animation-fill-mode: forwards;">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-sm text-muted mb-1">Total Pendaftar</p>
                                <h3 class="text-3xl font-bold text-text-main mb-2" id="totalPendaftar">0</h3>
                                <div class="flex items-center gap-1 text-accent text-sm font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                    </svg>
                                    <span>+12.5% dari bulan lalu</span>
                                </div>
                            </div>
                            <div class="p-3 rounded-xl bg-green-100">
                                <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Gelombang Aktif -->
                    <div class="card-hover bg-white border border-border rounded-2xl p-6 opacity-0 animate-fade-in-up delay-200" style="animation-fill-mode: forwards;">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-sm text-muted mb-1">Gelombang Aktif</p>
                                <h3 class="text-3xl font-bold text-text-main mb-2">3</h3>
                                <div class="flex items-center gap-1 text-warning text-sm font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>2 minggu tersisa</span>
                                </div>
                            </div>
                            <div class="p-3 rounded-xl bg-amber-100">
                                <svg class="w-6 h-6 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Jalur Tersedia -->
                    <div class="card-hover bg-white border border-border rounded-2xl p-6 opacity-0 animate-fade-in-up delay-300" style="animation-fill-mode: forwards;">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-sm text-muted mb-1">Jalur Tersedia</p>
                                <h3 class="text-3xl font-bold text-text-main mb-2">5</h3>
                                <div class="flex items-center gap-1 text-muted text-sm font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                                    </svg>
                                    <span>Semua jalur aktif</span>
                                </div>
                            </div>
                            <div class="p-3 rounded-xl bg-sky-100">
                                <svg class="w-6 h-6 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Total User -->
                    <div class="card-hover bg-white border border-border rounded-2xl p-6 opacity-0 animate-fade-in-up delay-400" style="animation-fill-mode: forwards;">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-sm text-muted mb-1">Total User</p>
                                <h3 class="text-3xl font-bold text-text-main mb-2">24</h3>
                                <div class="flex items-center gap-1 text-accent text-sm font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>5 admin aktif</span>
                                </div>
                            </div>
                            <div class="p-3 rounded-xl bg-purple-100">
                                <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts and Tables Row -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                    <!-- Chart -->
                    <div class="lg:col-span-2 bg-white border border-border rounded-2xl p-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.5s; animation-fill-mode: forwards;">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-bold text-text-main">Statistik Pendaftaran</h3>
                            <select class="bg-green-50 border border-border rounded-lg px-3 py-2 text-sm text-text-main focus:outline-none focus:border-accent">
                                <option>7 Hari Terakhir</option>
                                <option>30 Hari Terakhir</option>
                                <option>3 Bulan Terakhir</option>
                            </select>
                        </div>
                        <div class="flex items-end gap-4 h-48" id="chartContainer">
                            <!-- Chart bars will be rendered here -->
                        </div>
                        <div class="flex justify-between mt-4 text-xs text-muted font-medium">
                            <span>Sen</span>
                            <span>Sel</span>
                            <span>Rab</span>
                            <span>Kam</span>
                            <span>Jum</span>
                            <span>Sab</span>
                            <span>Min</span>
                        </div>
                    </div>

                    <!-- Jalur Distribution -->
                    <div class="bg-white border border-border rounded-2xl p-6 opacity-0 animate-fade-in-up" style="animation-delay: 0.6s; animation-fill-mode: forwards;">
                        <h3 class="text-lg font-bold text-text-main mb-6">Distribusi Jalur</h3>
                        <div class="space-y-4" id="jalurDistribution">
                            <!-- Will be rendered by JS -->
                        </div>
                    </div>
                </div>

                <!-- Recent Pendaftar Table -->
                <div class="bg-white border border-border rounded-2xl overflow-hidden opacity-0 animate-fade-in-up" style="animation-delay: 0.7s; animation-fill-mode: forwards;">
                    <div class="flex items-center justify-between p-6 border-b border-border">
                        <h3 class="text-lg font-bold text-text-main">Pendaftar Terbaru</h3>
                        <button class="btn-primary px-4 py-2 rounded-xl text-sm font-medium text-white">
                            Lihat Semua
                        </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-green-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">No. Pendaftaran</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">Jalur</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">Gelombang</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="pendaftarTable" class="divide-y divide-border">
                                <!-- Will be rendered by JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- User Page -->
            <div id="userPage" class="hidden">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-text-main">Manajemen User</h3>
                    <button onclick="openModal('userModal')" class="btn-primary px-4 py-2.5 rounded-xl text-sm font-medium text-white flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah User
                    </button>
                </div>
                <div class="bg-white border border-border rounded-2xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-green-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">Role</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="userTable" class="divide-y divide-border"></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Gelombang Page -->
            <div id="gelombangPage" class="hidden">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-text-main">Manajemen Gelombang</h3>
                    <button onclick="openModal('gelombangModal')" class="btn-primary px-4 py-2.5 rounded-xl text-sm font-medium text-white flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Gelombang
                    </button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="gelombangGrid"></div>
            </div>

            <!-- Pendaftar Page -->
            <div id="pendaftarPage" class="hidden">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
                    <h3 class="text-xl font-bold text-text-main">Data Pendaftar</h3>
                    <div class="flex items-center gap-3">
                        <select class="bg-white border border-border rounded-xl px-4 py-2.5 text-sm text-text-main focus:outline-none focus:border-accent">
                            <option>Semua Jalur</option>
                            <option>Jalur Prestasi</option>
                            <option>Jalur Reguler</option>
                            <option>Jalur Afirmasi</option>
                        </select>
                        <button class="btn-primary px-4 py-2.5 rounded-xl text-sm font-medium text-white flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Export
                        </button>
                    </div>
                </div>
                <div class="bg-white border border-border rounded-2xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-green-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">No. Pendaftaran</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">Nama Lengkap</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">Asal Sekolah</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">Jalur</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">Gelombang</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-muted uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="pendaftarFullTable" class="divide-y divide-border"></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Jalur Page -->
            <div id="jalurPage" class="hidden">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-text-main">Manajemen Jalur Pendaftaran</h3>
                    <button onclick="openModal('jalurModal')" class="btn-primary px-4 py-2.5 rounded-xl text-sm font-medium text-white flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Jalur
                    </button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="jalurGrid"></div>
            </div>
        </div>
    </main>

    <!-- Modals -->
    <!-- User Modal -->
    <div id="userModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/30 backdrop-blur-sm" onclick="closeModal('userModal')"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-md bg-white border border-border rounded-2xl p-6 shadow-2xl">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-text-main">Tambah User Baru</h3>
                <button onclick="closeModal('userModal')" class="p-2 rounded-lg hover:bg-green-50 transition-colors">
                    <svg class="w-5 h-5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-text-main mb-2">Nama Lengkap</label>
                    <input type="text" class="w-full px-4 py-2.5 bg-green-50 border border-border rounded-xl text-text-main focus:outline-none focus:border-accent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-main mb-2">Email</label>
                    <input type="email" class="w-full px-4 py-2.5 bg-green-50 border border-border rounded-xl text-text-main focus:outline-none focus:border-accent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-main mb-2">Role</label>
                    <select class="w-full px-4 py-2.5 bg-green-50 border border-border rounded-xl text-text-main focus:outline-none focus:border-accent">
                        <option>Admin</option>
                        <option>Panitia</option>
                        <option>Viewer</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-main mb-2">Password</label>
                    <input type="password" class="w-full px-4 py-2.5 bg-green-50 border border-border rounded-xl text-text-main focus:outline-none focus:border-accent">
                </div>
                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeModal('userModal')" class="flex-1 px-4 py-2.5 bg-green-50 border border-border rounded-xl text-text-main hover:bg-green-100 transition-colors font-medium">Batal</button>
                    <button type="submit" class="flex-1 btn-primary px-4 py-2.5 rounded-xl text-white font-medium">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Gelombang Modal -->
    <div id="gelombangModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/30 backdrop-blur-sm" onclick="closeModal('gelombangModal')"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-md bg-white border border-border rounded-2xl p-6 shadow-2xl">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-text-main">Tambah Gelombang Baru</h3>
                <button onclick="closeModal('gelombangModal')" class="p-2 rounded-lg hover:bg-green-50 transition-colors">
                    <svg class="w-5 h-5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-text-main mb-2">Nama Gelombang</label>
                    <input type="text" placeholder="contoh: Gelombang 1" class="w-full px-4 py-2.5 bg-green-50 border border-border rounded-xl text-text-main focus:outline-none focus:border-accent">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-text-main mb-2">Tanggal Mulai</label>
                        <input type="date" class="w-full px-4 py-2.5 bg-green-50 border border-border rounded-xl text-text-main focus:outline-none focus:border-accent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-text-main mb-2">Tanggal Selesai</label>
                        <input type="date" class="w-full px-4 py-2.5 bg-green-50 border border-border rounded-xl text-text-main focus:outline-none focus:border-accent">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-main mb-2">Kuota</label>
                    <input type="number" placeholder="Jumlah kuota" class="w-full px-4 py-2.5 bg-green-50 border border-border rounded-xl text-text-main focus:outline-none focus:border-accent">
                </div>
                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeModal('gelombangModal')" class="flex-1 px-4 py-2.5 bg-green-50 border border-border rounded-xl text-text-main hover:bg-green-100 transition-colors font-medium">Batal</button>
                    <button type="submit" class="flex-1 btn-primary px-4 py-2.5 rounded-xl text-white font-medium">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Jalur Modal -->
    <div id="jalurModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/30 backdrop-blur-sm" onclick="closeModal('jalurModal')"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-md bg-white border border-border rounded-2xl p-6 shadow-2xl">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-text-main">Tambah Jalur Baru</h3>
                <button onclick="closeModal('jalurModal')" class="p-2 rounded-lg hover:bg-green-50 transition-colors">
                    <svg class="w-5 h-5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-text-main mb-2">Nama Jalur</label>
                    <input type="text" placeholder="contoh: Jalur Prestasi Akademik" class="w-full px-4 py-2.5 bg-green-50 border border-border rounded-xl text-text-main focus:outline-none focus:border-accent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-main mb-2">Kode Jalur</label>
                    <input type="text" placeholder="contoh: JPA" class="w-full px-4 py-2.5 bg-green-50 border border-border rounded-xl text-text-main focus:outline-none focus:border-accent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-text-main mb-2">Deskripsi</label>
                    <textarea rows="3" class="w-full px-4 py-2.5 bg-green-50 border border-border rounded-xl text-text-main focus:outline-none focus:border-accent resize-none"></textarea>
                </div>
                <div class="flex items-center gap-3">
                    <input type="checkbox" id="activeStatus" class="w-4 h-4 rounded border-border bg-green-50 text-accent focus:ring-accent">
                    <label for="activeStatus" class="text-sm text-text-main">Aktif</label>
                </div>
                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeModal('jalurModal')" class="flex-1 px-4 py-2.5 bg-green-50 border border-border rounded-xl text-text-main hover:bg-green-100 transition-colors font-medium">Batal</button>
                    <button type="submit" class="flex-1 btn-primary px-4 py-2.5 rounded-xl text-white font-medium">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Data
        const users = [
            { id: 1, nama: 'Ahmad Fauzi', email: 'ahmad@spmb.ac.id', role: 'Admin', status: 'Aktif' },
            { id: 2, nama: 'Siti Nurhaliza', email: 'siti@spmb.ac.id', role: 'Panitia', status: 'Aktif' },
            { id: 3, nama: 'Budi Santoso', email: 'budi@spmb.ac.id', role: 'Panitia', status: 'Aktif' },
            { id: 4, nama: 'Dewi Lestari', email: 'dewi@spmb.ac.id', role: 'Viewer', status: 'Nonaktif' },
            { id: 5, nama: 'Rizky Pratama', email: 'rizky@spmb.ac.id', role: 'Admin', status: 'Aktif' },
        ];

        const gelombangs = [
            { id: 1, nama: 'Gelombang 1', mulai: '2024-01-15', selesai: '2024-02-28', kuota: 500, terisi: 342, status: 'Aktif' },
            { id: 2, nama: 'Gelombang 2', mulai: '2024-03-01', selesai: '2024-04-15', kuota: 400, terisi: 0, status: 'Akan Datang' },
            { id: 3, nama: 'Gelombang 3', mulai: '2024-04-20', selesai: '2024-05-30', kuota: 300, terisi: 0, status: 'Akan Datang' },
        ];

        const pendaftars = [
            { noPendaftaran: 'SPMB-2024-001', nama: 'Muhammad Rizki', sekolah: 'SMAN 1 Jakarta', jalur: 'Prestasi', gelombang: 'Gelombang 1', status: 'Diterima' },
            { noPendaftaran: 'SPMB-2024-002', nama: 'Putri Ayu Lestari', sekolah: 'SMAN 3 Bandung', jalur: 'Reguler', gelombang: 'Gelombang 1', status: 'Proses' },
            { noPendaftaran: 'SPMB-2024-003', nama: 'Ahmad Fadillah', sekolah: 'SMAN 5 Surabaya', jalur: 'Afirmasi', gelombang: 'Gelombang 1', status: 'Diterima' },
            { noPendaftaran: 'SPMB-2024-004', nama: 'Siti Aisyah', sekolah: 'SMAN 2 Medan', jalur: 'Prestasi', gelombang: 'Gelombang 1', status: 'Ditolak' },
            { noPendaftaran: 'SPMB-2024-005', nama: 'Budi Hartono', sekolah: 'SMAN 1 Semarang', jalur: 'Reguler', gelombang: 'Gelombang 1', status: 'Proses' },
            { noPendaftaran: 'SPMB-2024-006', nama: 'Dewi Sartika', sekolah: 'SMAN 4 Makassar', jalur: 'Afirmasi', gelombang: 'Gelombang 1', status: 'Diterima' },
            { noPendaftaran: 'SPMB-2024-007', nama: 'Rina Marlina', sekolah: 'SMAN 2 Palembang', jalur: 'Prestasi', gelombang: 'Gelombang 1', status: 'Proses' },
            { noPendaftaran: 'SPMB-2024-008', nama: 'Fajar Nugraha', sekolah: 'SMAN 1 Denpasar', jalur: 'Reguler', gelombang: 'Gelombang 1', status: 'Diterima' },
        ];

        const jalurs = [
            { id: 1, nama: 'Jalur Prestasi Akademik', kode: 'JPA', deskripsi: 'Untuk siswa dengan prestasi akademik tinggi', pendaftar: 156, aktif: true },
            { id: 2, nama: 'Jalur Prestasi Non-Akademik', kode: 'JPNA', deskripsi: 'Untuk siswa dengan prestasi olahraga/seni', pendaftar: 89, aktif: true },
            { id: 3, nama: 'Jalur Reguler', kode: 'JR', deskripsi: 'Jalur umum berdasarkan nilai ujian', pendaftar: 234, aktif: true },
            { id: 4, nama: 'Jalur Afirmasi', kode: 'JA', deskripsi: 'Untuk siswa dari daerah terpencil/kurang mampu', pendaftar: 67, aktif: true },
            { id: 5, nama: 'Jalur Transfer', kode: 'JT', deskripsi: 'Untuk mahasiswa pindahan dari PT lain', pendaftar: 23, aktif: false },
        ];

        const chartData = [45, 72, 58, 89, 63, 34, 95];

        // Functions
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
            document.body.style.overflow = '';
        }

        function getStatusBadge(status) {
            const styles = {
                'Aktif': 'bg-green-100 text-green-700',
                'Nonaktif': 'bg-red-100 text-red-700',
                'Diterima': 'bg-green-100 text-green-700',
                'Ditolak': 'bg-red-100 text-red-700',
                'Proses': 'bg-amber-100 text-amber-700',
                'Akan Datang': 'bg-sky-100 text-sky-700',
            };
            return `<span class="badge ${styles[status] || 'bg-gray-100 text-gray-700'}">${status}</span>`;
        }

        function renderChart() {
            const container = document.getElementById('chartContainer');
            const maxVal = Math.max(...chartData);
            container.innerHTML = chartData.map((val, i) => {
                const height = Math.max(10, (val / maxVal) * 100);
                return `
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <span class="text-sm text-muted font-medium">${val}</span>
                        <div class="w-full bg-green-50 rounded-t-lg overflow-hidden flex-1 flex items-end">
                            <div class="chart-bar w-full bg-gradient-to-t from-accent to-accent-light rounded-t-lg" style="height: 0%" data-height="${height}"></div>
                        </div>
                    </div>
                `;
            }).join('');

            // Animate bars
            setTimeout(() => {
                document.querySelectorAll('.chart-bar').forEach(bar => {
                    bar.style.height = bar.dataset.height + '%';
                });
            }, 100);
        }

        function renderJalurDistribution() {
            const container = document.getElementById('jalurDistribution');
            const total = jalurs.reduce((sum, j) => sum + j.pendaftar, 0);
            const colors = ['bg-accent', 'bg-sky-500', 'bg-amber-500', 'bg-purple-500', 'bg-pink-500'];
            
            container.innerHTML = jalurs.slice(0, 4).map((jalur, i) => {
                const percent = Math.round((jalur.pendaftar / total) * 100);
                return `
                    <div>
                        <div class="flex items-center justify-between text-sm mb-2">
                            <span class="text-text-main font-medium">${jalur.kode}</span>
                            <span class="text-muted font-semibold">${percent}%</span>
                        </div>
                        <div class="h-2 bg-green-50 rounded-full overflow-hidden">
                            <div class="h-full ${colors[i]} rounded-full transition-all duration-1000" style="width: ${percent}%"></div>
                        </div>
                    </div>
                `;
            }).join('');
        }

        function renderPendaftarTable() {
            const tbody = document.getElementById('pendaftarTable');
            tbody.innerHTML = pendaftars.slice(0, 5).map(p => `
                <tr class="table-row">
                    <td class="px-6 py-4 text-sm text-text-main font-mono font-medium">${p.noPendaftaran}</td>
                    <td class="px-6 py-4 text-sm text-text-main">${p.nama}</td>
                    <td class="px-6 py-4 text-sm text-muted">${p.jalur}</td>
                    <td class="px-6 py-4 text-sm text-muted">${p.gelombang}</td>
                    <td class="px-6 py-4">${getStatusBadge(p.status)}</td>
                    <td class="px-6 py-4">
                        <button class="p-2 rounded-lg hover:bg-green-50 transition-colors" title="Detail">
                            <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </td>
                </tr>
            `).join('');
        }

        function renderUserTable() {
            const tbody = document.getElementById('userTable');
            tbody.innerHTML = users.map(u => `
                <tr class="table-row">
                    <td class="px-6 py-4 text-sm text-muted">#${u.id}</td>
                    <td class="px-6 py-4 text-sm text-text-main font-medium">${u.nama}</td>
                    <td class="px-6 py-4 text-sm text-muted">${u.email}</td>
                    <td class="px-6 py-4 text-sm text-text-main">${u.role}</td>
                    <td class="px-6 py-4">${getStatusBadge(u.status)}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-1">
                            <button class="p-2 rounded-lg hover:bg-green-50 transition-colors" title="Edit">
                                <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            <button class="p-2 rounded-lg hover:bg-red-50 transition-colors" title="Hapus">
                                <svg class="w-4 h-4 text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        function renderGelombangGrid() {
            const grid = document.getElementById('gelombangGrid');
            grid.innerHTML = gelombangs.map(g => {
                const percent = Math.round((g.terisi / g.kuota) * 100);
                return `
                    <div class="card-hover bg-white border border-border rounded-2xl p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <h4 class="text-lg font-bold text-text-main">${g.nama}</h4>
                                <p class="text-sm text-muted">${g.mulai} - ${g.selesai}</p>
                            </div>
                            ${getStatusBadge(g.status)}
                        </div>
                        <div class="mb-4">
                            <div class="flex items-center justify-between text-sm mb-2">
                                <span class="text-muted">Kuota Terisi</span>
                                <span class="text-text-main font-bold">${g.terisi}/${g.kuota}</span>
                            </div>
                            <div class="h-2 bg-green-50 rounded-full overflow-hidden">
                                <div class="h-full bg-accent rounded-full" style="width: ${percent}%"></div>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button class="flex-1 px-3 py-2 bg-green-50 border border-border rounded-lg text-sm text-text-main hover:bg-green-100 transition-colors font-medium">Edit</button>
                            <button class="flex-1 px-3 py-2 bg-green-50 border border-border rounded-lg text-sm text-text-main hover:bg-green-100 transition-colors font-medium">Detail</button>
                        </div>
                    </div>
                `;
            }).join('');
        }

        function renderPendaftarFullTable() {
            const tbody = document.getElementById('pendaftarFullTable');
            tbody.innerHTML = pendaftars.map(p => `
                <tr class="table-row">
                    <td class="px-6 py-4 text-sm text-text-main font-mono font-medium">${p.noPendaftaran}</td>
                    <td class="px-6 py-4 text-sm text-text-main">${p.nama}</td>
                    <td class="px-6 py-4 text-sm text-muted">${p.sekolah}</td>
                    <td class="px-6 py-4 text-sm text-muted">${p.jalur}</td>
                    <td class="px-6 py-4 text-sm text-muted">${p.gelombang}</td>
                    <td class="px-6 py-4">${getStatusBadge(p.status)}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-1">
                            <button class="p-2 rounded-lg hover:bg-green-50 transition-colors" title="Detail">
                                <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                            <button class="p-2 rounded-lg hover:bg-green-50 transition-colors" title="Edit">
                                <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        function renderJalurGrid() {
            const grid = document.getElementById('jalurGrid');
            grid.innerHTML = jalurs.map(j => `
                <div class="card-hover bg-white border border-border rounded-2xl p-6">
                    <div class="flex items-start justify-between mb-4">
                        <div class="p-3 rounded-xl ${j.aktif ? 'bg-green-100' : 'bg-gray-100'}">
                            <svg class="w-6 h-6 ${j.aktif ? 'text-accent' : 'text-gray-400'}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                            </svg>
                        </div>
                        <span class="badge ${j.aktif ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700'}">${j.aktif ? 'Aktif' : 'Nonaktif'}</span>
                    </div>
                    <h4 class="text-lg font-bold text-text-main mb-1">${j.nama}</h4>
                    <p class="text-xs text-accent font-mono mb-3">${j.kode}</p>
                    <p class="text-sm text-muted mb-4">${j.deskripsi}</p>
                    <div class="flex items-center justify-between pt-4 border-t border-border">
                        <div>
                            <p class="text-xs text-muted">Pendaftar</p>
                            <p class="text-xl font-bold text-text-main">${j.pendaftar}</p>
                        </div>
                        <div class="flex gap-2">
                            <button class="p-2 rounded-lg hover:bg-green-50 transition-colors" title="Edit">
                                <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            <button class="p-2 rounded-lg hover:bg-red-50 transition-colors" title="Hapus">
                                <svg class="w-4 h-4 text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Navigation
        document.querySelectorAll('.menu-item[data-page]').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const page = this.dataset.page;
                
                // Update active state
                document.querySelectorAll('.menu-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');
                
                // Update title
                const titles = {
                    dashboard: 'Dashboard',
                    user: 'Manajemen User',
                    gelombang: 'Manajemen Gelombang',
                    pendaftar: 'Data Pendaftar',
                    jalur: 'Manajemen Jalur'
                };
                document.getElementById('pageTitle').textContent = titles[page];
                
                // Show/hide pages
                const pages = ['dashboard', 'user', 'gelombang', 'pendaftar', 'jalur'];
                pages.forEach(p => {
                    const el = document.getElementById(p + 'Page');
                    if (el) {
                        el.classList.toggle('hidden', p !== page);
                    }
                });
                
                // Close mobile sidebar
                if (window.innerWidth < 1024) {
                    toggleSidebar();
                }
            });
        });

        // Animate counter
        function animateCounter(element, target, duration = 1500) {
            let start = 0;
            const increment = target / (duration / 16);
            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    element.textContent = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(start).toLocaleString();
                }
            }, 16);
        }

        // Set current date
        function setCurrentDate() {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('currentDate').textContent = new Date().toLocaleDateString('id-ID', options);
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            setCurrentDate();
            renderChart();
            renderJalurDistribution();
            renderPendaftarTable();
            renderUserTable();
            renderGelombangGrid();
            renderPendaftarFullTable();
            renderJalurGrid();
            
            // Animate total pendaftar counter
            setTimeout(() => {
                animateCounter(document.getElementById('totalPendaftar'), 1247);
            }, 500);
        });
    </script>
</body>
</html>
