<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') | {{ $siteSettings['site_name'] ?? 'Toko Jaya Promosi Lestari' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-100 text-slate-900 antialiased flex min-h-screen">

    <!-- Sidebar Desktop -->
    <aside class="w-64 bg-slate-900 text-slate-300 hidden md:flex flex-col shrink-0 border-r border-slate-800">
        <!-- Brand -->
        <div class="h-20 flex items-center px-6 border-b border-slate-800">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <div
                    class="w-9 h-9 rounded-lg bg-emerald-600 text-white flex items-center justify-center font-bold text-sm">
                    ACC
                </div>
                <div>
                    <span class="block text-base font-bold text-white leading-tight">Admin Toko Jaya Promosi
                        Lestari</span>
                    <span class="block text-[11px] text-slate-400">Digital Showroom</span>
                </div>
            </a>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-grow p-4 space-y-1.5 overflow-y-auto text-sm" aria-label="Menu Admin">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-slate-800 text-emerald-400' : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span>Dashboard</span>
            </a>

            <div class="pt-4 pb-1 text-[11px] font-bold uppercase tracking-wider text-slate-500 px-3">
                Katalog Produk
            </div>

            <a href="{{ route('admin.categories.index') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold transition-colors {{ request()->routeIs('admin.categories.*') ? 'bg-slate-800 text-emerald-400' : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
                <span>Kategori Produk</span>
            </a>

            <a href="{{ route('admin.products.index') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold transition-colors {{ request()->routeIs('admin.products.*') ? 'bg-slate-800 text-emerald-400' : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <span>Daftar Produk</span>
            </a>

            <div class="pt-4 pb-1 text-[11px] font-bold uppercase tracking-wider text-slate-500 px-3">
                Branding & Trust
            </div>

            <a href="{{ route('admin.portfolios.index') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold transition-colors {{ request()->routeIs('admin.portfolios.*') ? 'bg-slate-800 text-emerald-400' : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
                <span>Portofolio</span>
            </a>

            <a href="{{ route('admin.testimonials.index') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold transition-colors {{ request()->routeIs('admin.testimonials.*') ? 'bg-slate-800 text-emerald-400' : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                    </path>
                </svg>
                <span>Testimoni</span>
            </a>

            <div class="pt-4 pb-1 text-[11px] font-bold uppercase tracking-wider text-slate-500 px-3">
                Konfigurasi
            </div>

            <a href="{{ route('admin.settings.index') }}"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl font-semibold transition-colors {{ request()->routeIs('admin.settings.*') ? 'bg-slate-800 text-emerald-400' : 'text-slate-400 hover:text-white hover:bg-slate-800/60' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span>Pengaturan Web & Kontak</span>
            </a>
        </nav>

        <!-- View Website Link -->
        <div class="p-4 border-t border-slate-800">
            <a href="{{ route('home') }}" target="_blank"
                class="flex items-center justify-between px-3 py-2 rounded-lg bg-slate-800 hover:bg-slate-700 text-xs font-semibold text-white transition-colors">
                <span>Buka Website</span>
                <span>&nearr;</span>
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-grow flex flex-col min-w-0">

        <!-- Top Navbar -->
        <header
            class="h-20 bg-white border-b border-slate-200 px-4 sm:px-8 flex items-center justify-between sticky top-0 z-30 shadow-xs">
            <div class="flex items-center gap-3">
                <!-- Mobile toggle -->
                <button type="button" id="adminMobileBtn"
                    class="md:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100" aria-label="Buka menu admin">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <h1 class="text-base sm:text-lg font-bold text-slate-800">
                    @yield('header_title', 'Dashboard')
                </h1>
            </div>

            <!-- User Menu -->
            <div class="flex items-center gap-4">
                <span class="text-xs text-slate-500 hidden sm:inline-block">
                    Login sebagai: <strong class="text-slate-800">{{ auth()->user()->name ?? 'Admin' }}</strong>
                </span>

                <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="px-3.5 py-1.5 rounded-lg text-xs font-bold text-rose-600 hover:bg-rose-50 border border-rose-200 transition-colors">
                        Keluar
                    </button>
                </form>
            </div>
        </header>

        <!-- Flash Notifications -->
        @if(session('success'))
            <div
                class="mx-4 sm:mx-8 mt-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center justify-between shadow-xs">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()"
                    class="text-emerald-600 hover:text-emerald-900 text-xs font-bold px-2 py-1">✕</button>
            </div>
        @endif

        @if(session('error'))
            <div
                class="mx-4 sm:mx-8 mt-6 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-sm flex items-center justify-between shadow-xs">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-rose-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()"
                    class="text-rose-600 hover:text-rose-900 text-xs font-bold px-2 py-1">✕</button>
            </div>
        @endif

        <!-- Main Body -->
        <main class="flex-grow p-4 sm:p-8">
            @yield('content')
        </main>
    </div>

    <!-- Mobile Drawer Modal -->
    <div id="adminMobileDrawer" class="fixed inset-0 z-50 bg-slate-900/60 hidden md:hidden">
        <div class="w-64 bg-slate-900 h-full p-6 text-slate-300 flex flex-col justify-between">
            <div class="space-y-4">
                <div class="flex items-center justify-between pb-4 border-b border-slate-800">
                    <span class="font-bold text-white text-base">Menu Admin</span>
                    <button type="button" id="closeAdminMobileBtn"
                        class="text-slate-400 hover:text-white text-lg">✕</button>
                </div>
                <nav class="space-y-1.5 text-sm">
                    <a href="{{ route('admin.dashboard') }}"
                        class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-slate-800">Dashboard</a>
                    <a href="{{ route('admin.categories.index') }}"
                        class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-slate-800">Kategori</a>
                    <a href="{{ route('admin.products.index') }}"
                        class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-slate-800">Produk</a>
                    <a href="{{ route('admin.portfolios.index') }}"
                        class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-slate-800">Portofolio</a>
                    <a href="{{ route('admin.testimonials.index') }}"
                        class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-slate-800">Testimoni</a>
                    <a href="{{ route('admin.settings.index') }}"
                        class="block px-3 py-2 rounded-lg text-slate-300 hover:bg-slate-800">Pengaturan Web</a>
                </nav>
            </div>
            <div class="pt-4 border-t border-slate-800">
                <a href="{{ route('home') }}" target="_blank"
                    class="block text-center py-2 rounded-lg bg-slate-800 text-xs text-white">Lihat Website</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.getElementById('adminMobileBtn');
            const drawer = document.getElementById('adminMobileDrawer');
            const closeBtn = document.getElementById('closeAdminMobileBtn');

            if (btn && drawer) {
                btn.addEventListener('click', () => drawer.classList.remove('hidden'));
                if (closeBtn) closeBtn.addEventListener('click', () => drawer.classList.add('hidden'));
                drawer.addEventListener('click', (e) => {
                    if (e.target === drawer) drawer.classList.add('hidden');
                });
            }
        });
    </script>
    @stack('scripts')
</body>

</html>