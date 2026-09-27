<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Panel | {{ $siteSettings['site_name'] ?? 'Toko Jaya Promosi Lestari' }}</title>

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

<body class="bg-slate-900 min-h-screen flex items-center justify-center p-4">

    <div class="max-w-md w-full bg-white rounded-3xl p-8 sm:p-10 shadow-2xl border border-slate-800 space-y-6">
        <div class="text-center space-y-2">
            <div
                class="w-12 h-12 rounded-2xl bg-slate-900 text-white font-extrabold text-xl flex items-center justify-center mx-auto shadow-md">
                ACC
            </div>
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Login Admin Panel</h1>
            <p class="text-xs text-slate-500">Kelola katalog produk, portofolio, dan testimoni</p>
        </div>

        @if($errors->any())
            <div class="p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs">
                @foreach($errors->all() as $err)
                    <p>{{ $err }}</p>
                @endforeach
            </div>
        @endif

        @if(session('success'))
            <div class="p-3.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Email
                    Admin</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                    placeholder="nama@email.com"
                    class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-hidden focus:ring-2 focus:ring-slate-900">
            </div>

            <div>
                <label for="password"
                    class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Password</label>
                <input type="password" id="password" name="password" required placeholder="Masukkan password"
                    class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:outline-hidden focus:ring-2 focus:ring-slate-900">
            </div>

            <div class="flex items-center justify-between text-xs pt-1">
                <label class="flex items-center gap-2 cursor-pointer text-slate-600">
                    <input type="checkbox" name="remember"
                        class="rounded border-slate-300 text-slate-900 focus:ring-slate-900">
                    <span>Ingat Saya</span>
                </label>
            </div>

            <div class="pt-2">
                <button type="submit"
                    class="w-full py-3.5 px-4 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-extrabold text-sm transition-colors shadow-md">
                    Masuk ke Dashboard
                </button>
            </div>
        </form>

        <div class="pt-4 border-t border-slate-100 text-center">
            <a href="{{ route('home') }}"
                class="text-xs font-semibold text-slate-500 hover:text-slate-900 inline-flex items-center gap-1">
                <span>&larr;</span>
                <span>Kembali ke Halaman Utama</span>
            </a>
        </div>
    </div>

</body>

</html>