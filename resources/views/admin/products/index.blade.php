@extends('layouts.admin')

@section('title', 'Katalog Produk')
@section('header_title', 'Kelola Produk Katalog')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-900">Daftar Produk Katalog</h2>
            <p class="text-xs text-slate-500">Kelola informasi spesifikasi, foto galeri, dan harga konsultasi</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="px-4 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs transition-colors shadow-xs self-start sm:self-auto">
            + Tambah Produk Baru
        </a>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="bg-white rounded-2xl border border-slate-200 p-4 shadow-xs">
        <form action="{{ route('admin.products.index') }}" method="GET" class="flex flex-col sm:flex-row gap-3">
            <div class="flex-grow relative">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama produk..." class="w-full pl-9 pr-4 py-2 rounded-xl border border-slate-300 text-xs focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>

            <div class="sm:w-56">
                <select name="kategori" onchange="this.form.submit()" class="w-full py-2 px-3 rounded-xl border border-slate-300 text-xs bg-white focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('kategori') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="px-4 py-2 rounded-xl bg-slate-900 text-white text-xs font-bold hover:bg-slate-800 transition-colors">
                Cari
            </button>
            @if(request()->hasAny(['q', 'kategori']))
                <a href="{{ route('admin.products.index') }}" class="px-3 py-2 rounded-xl border border-slate-300 text-xs font-semibold text-slate-700 hover:bg-slate-50 flex items-center justify-center">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <!-- Product Table -->
    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 border-b border-slate-200 text-xs font-bold uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="py-3.5 px-4 w-16">Foto</th>
                        <th class="py-3.5 px-4">Nama Produk</th>
                        <th class="py-3.5 px-4">Kategori</th>
                        <th class="py-3.5 px-4">Material</th>
                        <th class="py-3.5 px-4">Estimasi Harga</th>
                        <th class="py-3.5 px-4">Unggulan</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($products as $prod)
                        <tr class="hover:bg-slate-50/60 transition-colors">
                            <td class="py-3 px-4">
                                <div class="w-12 h-12 rounded-lg bg-slate-100 overflow-hidden border border-slate-200">
                                    @if($prod->primaryImage)
                                        <img src="{{ $prod->primaryImage->url }}" alt="{{ $prod->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-[10px] text-slate-400">No Img</div>
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 px-4">
                                <span class="font-bold text-slate-900 block">{{ $prod->name }}</span>
                                <span class="font-mono text-[11px] text-slate-400">/katalog/{{ $prod->slug }}</span>
                            </td>
                            <td class="py-3 px-4 text-slate-600 text-xs">
                                {{ $prod->category->name ?? '-' }}
                            </td>
                            <td class="py-3 px-4 text-slate-600 text-xs">
                                {{ $prod->material ?: '-' }}
                            </td>
                            <td class="py-3 px-4 font-mono font-bold text-slate-900 text-xs">
                                {{ $prod->display_price }}
                            </td>
                            <td class="py-3 px-4">
                                @if($prod->featured)
                                    <span class="px-2 py-0.5 rounded text-[11px] font-bold bg-amber-50 text-amber-700 border border-amber-200">Unggulan</span>
                                @else
                                    <span class="text-slate-400 text-xs">-</span>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                @if($prod->status)
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">Aktif</span>
                                @else
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-600">Draft</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a href="{{ route('products.show', $prod->slug) }}" target="_blank" class="px-2.5 py-1.5 rounded-lg bg-slate-50 hover:bg-slate-100 text-slate-600 text-xs font-bold transition-colors" title="Lihat Tampilan">
                                    Lihat
                                </a>
                                <a href="{{ route('admin.products.edit', $prod->id) }}" class="px-2.5 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition-colors">
                                    Edit
                                </a>
                                <form action="{{ route('admin.products.destroy', $prod->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus produk katalog ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2.5 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-700 text-xs font-bold transition-colors">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-8 text-center text-xs text-slate-400">
                                Tidak ada data produk katalog.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
