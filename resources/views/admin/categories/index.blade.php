@extends('layouts.admin')

@section('title', 'Kategori Produk')
@section('header_title', 'Kelola Kategori Produk')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-slate-900">Daftar Kategori</h2>
            <p class="text-xs text-slate-500">Kelompok produk utama yang tampil di etalase dan navigasi</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="px-4 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs transition-colors shadow-xs">
            + Tambah Kategori
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 border-b border-slate-200 text-xs font-bold uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="py-3.5 px-4 w-16">Foto</th>
                        <th class="py-3.5 px-4">Nama Kategori</th>
                        <th class="py-3.5 px-4">Slug</th>
                        <th class="py-3.5 px-4">Jml Produk</th>
                        <th class="py-3.5 px-4">Urutan</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($categories as $category)
                        <tr class="hover:bg-slate-50/60 transition-colors">
                            <td class="py-3 px-4">
                                <div class="w-12 h-12 rounded-lg bg-slate-100 overflow-hidden border border-slate-200">
                                    <img src="{{ $category->image_url ?: asset('images/categories/rubber.jpg') }}" alt="{{ $category->name }}" class="w-full h-full object-cover">
                                </div>
                            </td>
                            <td class="py-3 px-4 font-bold text-slate-900">
                                {{ $category->name }}
                            </td>
                            <td class="py-3 px-4 font-mono text-xs text-slate-500">
                                {{ $category->slug }}
                            </td>
                            <td class="py-3 px-4 text-slate-600 font-mono">
                                {{ $category->products_count }}
                            </td>
                            <td class="py-3 px-4 text-slate-600 font-mono">
                                {{ $category->sort_order }}
                            </td>
                            <td class="py-3 px-4">
                                @if($category->status)
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">Aktif</span>
                                @else
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-600">Draft</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="px-2.5 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition-colors">
                                    Edit
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
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
                            <td colspan="7" class="py-8 text-center text-xs text-slate-400">
                                Belum ada kategori produk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
