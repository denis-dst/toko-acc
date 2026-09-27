@extends('layouts.admin')

@section('title', 'Edit Produk: ' . $product->name)
@section('header_title', 'Edit Produk: ' . $product->name)

@section('content')
<div class="max-w-4xl bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-xs space-y-8">
    
    <!-- Gallery Management Section -->
    <div class="border-b border-slate-200 pb-8 space-y-4">
        <h3 class="text-sm font-bold uppercase tracking-wider text-slate-800">
            Foto Galeri Produk Saat Ini ({{ $product->images->count() }})
        </h3>

        @if($product->images->count() > 0)
            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 gap-4">
                @foreach($product->images as $img)
                    <div class="relative group rounded-xl overflow-hidden border {{ $img->is_primary ? 'border-emerald-500 ring-2 ring-emerald-500/20' : 'border-slate-200' }} bg-slate-50 flex flex-col justify-between">
                        <div class="aspect-square w-full overflow-hidden bg-slate-100">
                            <img src="{{ $img->url }}" alt="{{ $img->caption ?: $product->name }}" class="w-full h-full object-cover">
                        </div>

                        <div class="p-2 bg-white flex items-center justify-between gap-1 border-t border-slate-100 text-[11px]">
                            @if($img->is_primary)
                                <span class="font-bold text-emerald-700 bg-emerald-50 px-1.5 py-0.5 rounded">Utama</span>
                            @else
                                <form action="{{ route('admin.products.images.primary', $img->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-slate-500 hover:text-slate-900 font-medium">Set Utama</button>
                                </form>
                            @endif

                            <form action="{{ route('admin.products.images.delete', $img->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus foto ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-rose-600 hover:text-rose-800 font-bold px-1">✕</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-xs text-slate-400 italic">Belum ada foto yang diupload untuk produk ini.</p>
        @endif
    </div>

    <!-- Main Edit Form -->
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama Produk -->
            <div>
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Nama Produk *</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
                @error('name') <span class="text-xs text-rose-600 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Kategori -->
            <div>
                <label for="category_id" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Kategori Produk</label>
                <select name="category_id" id="category_id" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm bg-white focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
                    <option value="">Pilih Kategori...</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Material -->
            <div>
                <label for="material" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Bahan / Material</label>
                <input type="text" name="material" id="material" value="{{ old('material', $product->material) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
            </div>

            <!-- Minimum Order -->
            <div>
                <label for="minimum_order" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Minimal Order (Opsional)</label>
                <input type="text" name="minimum_order" id="minimum_order" value="{{ old('minimum_order', $product->minimum_order) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
            </div>

            <!-- Opsi Custom -->
            <div>
                <label for="custom_info" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Opsi Custom</label>
                <input type="text" name="custom_info" id="custom_info" value="{{ old('custom_info', $product->custom_info) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-slate-50 p-4 rounded-xl border border-slate-200">
            <!-- Harga Angka (Opsional) -->
            <div>
                <label for="price" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Harga Dasar (Rp) - Opsional</label>
                <input type="number" step="100" name="price" id="price" value="{{ old('price', $product->price) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm bg-white focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
            </div>

            <!-- Price Label -->
            <div>
                <label for="price_label" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Label Keterangan Harga</label>
                <input type="text" name="price_label" id="price_label" value="{{ old('price_label', $product->price_label) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm bg-white focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
            </div>
        </div>

        <!-- Short Description -->
        <div>
            <label for="short_description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Ringkasan Singkat</label>
            <textarea name="short_description" id="short_description" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">{{ old('short_description', $product->short_description) }}</textarea>
        </div>

        <!-- Full Description -->
        <div>
            <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Deskripsi Lengkap & Spesifikasi Produksi</label>
            <textarea name="description" id="description" rows="5" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">{{ old('description', $product->description) }}</textarea>
        </div>

        <!-- Tambah Foto Baru -->
        <div>
            <label for="images" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Tambah Foto Galeri Baru</label>
            <input type="file" name="images[]" id="images" multiple accept="image/*" class="w-full px-3 py-2.5 rounded-xl border border-slate-300 text-sm text-slate-600 file:mr-4 file:py-1.5 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-900 file:text-white hover:file:bg-slate-800">
            <span class="text-[11px] text-slate-400 mt-1 block">Pilih foto jika ingin menambahkan gambar baru ke galeri produk ini.</span>
        </div>

        <!-- SEO Metadata -->
        <div class="border-t border-slate-100 pt-5 space-y-4">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">SEO & Visibilitas (Opsional)</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="meta_title" class="block text-xs font-medium text-slate-700 mb-1">Meta Title</label>
                    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $product->meta_title) }}" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs">
                </div>
                <div>
                    <label for="meta_description" class="block text-xs font-medium text-slate-700 mb-1">Meta Description</label>
                    <input type="text" name="meta_description" id="meta_description" value="{{ old('meta_description', $product->meta_description) }}" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs">
                </div>
            </div>
        </div>

        <!-- Status & Urutan -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 border-t border-slate-100 pt-5">
            <div>
                <label for="sort_order" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Urutan Tampil</label>
                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $product->sort_order) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm">
            </div>

            <div class="flex items-center pt-5">
                <label class="flex items-center gap-2 cursor-pointer text-sm font-semibold text-slate-800">
                    <input type="checkbox" name="featured" value="1" {{ old('featured', $product->featured) ? 'checked' : '' }} class="rounded border-slate-300 text-slate-900 focus:ring-slate-900">
                    <span>Produk Unggulan (Hero)</span>
                </label>
            </div>

            <div class="flex items-center pt-5">
                <label class="flex items-center gap-2 cursor-pointer text-sm font-semibold text-slate-800">
                    <input type="checkbox" name="status" value="1" {{ old('status', $product->status) ? 'checked' : '' }} class="rounded border-slate-300 text-slate-900 focus:ring-slate-900">
                    <span>Publikasikan (Aktif)</span>
                </label>
            </div>
        </div>

        <!-- Buttons -->
        <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2.5 rounded-xl border border-slate-300 text-slate-700 text-xs font-bold hover:bg-slate-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold shadow-xs transition-colors">
                Perbarui Produk
            </button>
        </div>
    </form>
</div>
@endsection
