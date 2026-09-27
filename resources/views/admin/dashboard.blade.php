@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header_title', 'Dashboard Ringkasan')

@section('content')
<div class="space-y-8">
    
    <!-- Stats Cards Row (PRD Section 15) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Produk -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block">Total Produk</span>
                <span class="text-3xl font-black text-slate-900 mt-1 block font-mono">{{ $stats['total_products'] }}</span>
                <span class="text-xs text-emerald-600 font-semibold mt-1 block">{{ $stats['active_products'] }} Aktif Tampil</span>
            </div>
            <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-800 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
        </div>

        <!-- Total Kategori -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block">Kategori</span>
                <span class="text-3xl font-black text-slate-900 mt-1 block font-mono">{{ $stats['total_categories'] }}</span>
                <a href="{{ route('admin.categories.index') }}" class="text-xs text-slate-500 hover:text-slate-900 mt-1 block">Kelola Kategori &rarr;</a>
            </div>
            <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-800 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
            </div>
        </div>

        <!-- Total Portofolio -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block">Portofolio</span>
                <span class="text-3xl font-black text-slate-900 mt-1 block font-mono">{{ $stats['total_portfolios'] }}</span>
                <a href="{{ route('admin.portfolios.index') }}" class="text-xs text-slate-500 hover:text-slate-900 mt-1 block">Lihat Riwayat &rarr;</a>
            </div>
            <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-800 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
        </div>

        <!-- Total Testimoni -->
        <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block">Testimoni</span>
                <span class="text-3xl font-black text-slate-900 mt-1 block font-mono">{{ $stats['total_testimonials'] }}</span>
                <a href="{{ route('admin.testimonials.index') }}" class="text-xs text-slate-500 hover:text-slate-900 mt-1 block">Kelola Ulasan &rarr;</a>
            </div>
            <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-800 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
            </div>
        </div>
    </div>

    <!-- Quick Action Bar -->
    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs flex flex-wrap items-center justify-between gap-4">
        <div>
            <h2 class="text-base font-bold text-slate-900">Aksi Cepat Manajemen</h2>
            <p class="text-xs text-slate-500">Tambahkan konten produk atau perbarui nomor WhatsApp resmi</p>
        </div>
        <div class="flex flex-wrap items-center gap-3">
            <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs transition-colors">
                <span>+ Tambah Produk Baru</span>
            </a>
            <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs transition-colors">
                <span>+ Kategori</span>
            </a>
            <a href="{{ route('admin.portfolios.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 font-bold text-xs transition-colors">
                <span>+ Portofolio</span>
            </a>
            <a href="{{ route('admin.settings.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-slate-300 hover:bg-slate-50 text-slate-700 font-bold text-xs transition-colors">
                <span>Pengaturan Web</span>
            </a>
        </div>
    </div>

    <!-- Latest Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Latest Products -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-bold text-sm text-slate-900">Produk Katalog Terbaru</h3>
                <a href="{{ route('admin.products.index') }}" class="text-xs text-slate-500 hover:text-slate-900">Lihat Semua &rarr;</a>
            </div>

            <div class="divide-y divide-slate-100">
                @forelse($latestProducts as $prod)
                    <div class="p-4 flex items-center justify-between hover:bg-slate-50 transition-colors">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-lg bg-slate-100 overflow-hidden shrink-0">
                                @if($prod->primaryImage)
                                    <img src="{{ $prod->primaryImage->url }}" alt="{{ $prod->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-[10px] text-slate-400">No Img</div>
                                @endif
                            </div>
                            <div>
                                <h4 class="font-bold text-sm text-slate-900 line-clamp-1">{{ $prod->name }}</h4>
                                <span class="text-xs text-slate-500">{{ $prod->category->name ?? 'Tanpa Kategori' }}</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-xs font-mono font-bold text-slate-900 block">{{ $prod->display_price }}</span>
                            <a href="{{ route('admin.products.edit', $prod->id) }}" class="text-[11px] text-emerald-600 hover:underline">Edit</a>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center text-xs text-slate-400">Belum ada produk katalog.</div>
                @endforelse
            </div>
        </div>

        <!-- Latest Portfolios -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-bold text-sm text-slate-900">Portofolio Pekerjaan Terbaru</h3>
                <a href="{{ route('admin.portfolios.index') }}" class="text-xs text-slate-500 hover:text-slate-900">Lihat Semua &rarr;</a>
            </div>

            <div class="divide-y divide-slate-100">
                @forelse($latestPortfolios as $port)
                    <div class="p-4 flex items-center justify-between hover:bg-slate-50 transition-colors">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-lg bg-slate-100 overflow-hidden shrink-0">
                                <img src="{{ $port->cover_url ?: asset('images/portfolio/medali-kejuaraan.jpg') }}" alt="{{ $port->title }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold text-sm text-slate-900 line-clamp-1">{{ $port->title }}</h4>
                                <span class="text-xs text-slate-500">Tahun: {{ $port->project_year ?: '-' }}</span>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-xs text-slate-600 block">{{ $port->client_name ?: 'Umum' }}</span>
                            <a href="{{ route('admin.portfolios.edit', $port->id) }}" class="text-[11px] text-emerald-600 hover:underline">Edit</a>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center text-xs text-slate-400">Belum ada data portofolio.</div>
                @endforelse
            </div>
        </div>

    </div>

</div>
@endsection
