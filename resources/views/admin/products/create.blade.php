@extends('layouts.admin')

@section('title', 'Tambah Produk Katalog')
@section('header_title', 'Tambah Produk Baru')

@section('content')
    <div class="max-w-4xl bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-xs">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Produk -->
                <div>
                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Nama
                        Produk *</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        placeholder="Contoh: Rubber Keychain 3D Custom"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
                    @error('name') <span class="text-xs text-rose-600 mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Kategori -->
                <div>
                    <label for="category_id"
                        class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Kategori
                        Produk</label>
                    <select name="category_id" id="category_id"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm bg-white focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
                        <option value="">Pilih Kategori...</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="text-xs text-rose-600 mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Material -->
                <div>
                    <label for="material"
                        class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Bahan /
                        Material</label>
                    <input type="text" name="material" id="material" value="{{ old('material') }}"
                        placeholder="Contoh: PVC Rubber Soft / Zinc Alloy"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
                </div>

                <!-- Minimum Order -->
                <div>
                    <label for="minimum_order"
                        class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Minimal Order
                        (Opsional)</label>
                    <input type="text" name="minimum_order" id="minimum_order" value="{{ old('minimum_order') }}"
                        placeholder="Contoh: 50 pcs / 100 pcs"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
                </div>

                <!-- Opsi Custom -->
                <div>
                    <label for="custom_info"
                        class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Opsi Custom</label>
                    <input type="text" name="custom_info" id="custom_info" value="{{ old('custom_info') }}"
                        placeholder="Contoh: 2D/3D timbul bebas warna"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-slate-50 p-4 rounded-xl border border-slate-200">
                <!-- Harga Angka (Opsional) -->
                <div>
                    <label for="price" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Harga
                        Dasar (Rp) - Opsional</label>
                    <input type="number" step="100" name="price" id="price" value="{{ old('price') }}"
                        placeholder="Kosongkan jika murni konsultasi"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm bg-white focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
                    <span class="text-[11px] text-slate-400 mt-1 block">Bila kosong, label harga otomatis
                        "Konsultasi".</span>
                </div>

                <!-- Price Label -->
                <div>
                    <label for="price_label"
                        class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Label Keterangan
                        Harga</label>
                    <input type="text" name="price_label" id="price_label" value="{{ old('price_label', 'Mulai dari') }}"
                        placeholder="Contoh: Mulai dari / Konsultasi"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm bg-white focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
                </div>
            </div>

            <!-- Short Description -->
            <div>
                <label for="short_description"
                    class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Ringkasan Singkat</label>
                <textarea name="short_description" id="short_description" rows="2"
                    placeholder="1-2 kalimat deskripsi yang tampil di kartu katalog..."
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">{{ old('short_description') }}</textarea>
            </div>

            <!-- Full Description -->
            <div>
                <label for="description"
                    class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Deskripsi Lengkap &
                    Spesifikasi Produksi</label>
                <textarea name="description" id="description" rows="5"
                    placeholder="Penjelasan lengkap mengenai pilihan finishing, keunggulan bahan, dan proses order..."
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">{{ old('description') }}</textarea>
            </div>

            <!-- Upload Foto Produk Multi -->
            <div>
                <label for="images" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Upload
                    Foto Produk (Bisa Pilih Banyak)</label>
                <input type="file" name="images[]" id="images" multiple accept="image/*"
                    class="w-full px-3 py-2.5 rounded-xl border border-slate-300 text-sm text-slate-600 file:mr-4 file:py-1.5 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-900 file:text-white hover:file:bg-slate-800">
                <span class="text-[11px] text-slate-400 mt-1 block">Format: JPG, PNG, WebP. Maks 3MB per file. Foto pertama
                    otomatis dijadikan foto utama.</span>
                @error('images.*') <span class="text-xs text-rose-600 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- SEO Metadata -->
            <div class="border-t border-slate-100 pt-5 space-y-4">
                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">SEO & Visibilitas (Opsional)</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="meta_title" class="block text-xs font-medium text-slate-700 mb-1">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}"
                            placeholder="Contoh: Rubber Keychain Custom | Toko Jaya Promosi Lestari"
                            class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs">
                    </div>
                    <div>
                        <label for="meta_description" class="block text-xs font-medium text-slate-700 mb-1">Meta
                            Description</label>
                        <input type="text" name="meta_description" id="meta_description"
                            value="{{ old('meta_description') }}"
                            placeholder="Pesan rubber keychain custom untuk suvenir event..."
                            class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs">
                    </div>
                </div>
            </div>

            <!-- Status & Urutan -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 border-t border-slate-100 pt-5">
                <div>
                    <label for="sort_order"
                        class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Urutan Tampil</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm">
                </div>

                <div class="flex items-center pt-5">
                    <label class="flex items-center gap-2 cursor-pointer text-sm font-semibold text-slate-800">
                        <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}
                            class="rounded border-slate-300 text-slate-900 focus:ring-slate-900">
                        <span>Produk Unggulan (Hero)</span>
                    </label>
                </div>

                <div class="flex items-center pt-5">
                    <label class="flex items-center gap-2 cursor-pointer text-sm font-semibold text-slate-800">
                        <input type="checkbox" name="status" value="1" {{ old('status', 1) ? 'checked' : '' }}
                            class="rounded border-slate-300 text-slate-900 focus:ring-slate-900">
                        <span>Publikasikan (Aktif)</span>
                    </label>
                </div>
            </div>

            <!-- Buttons -->
            <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.products.index') }}"
                    class="px-4 py-2.5 rounded-xl border border-slate-300 text-slate-700 text-xs font-bold hover:bg-slate-50 transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold shadow-xs transition-colors">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
@endsection