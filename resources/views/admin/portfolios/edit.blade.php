@extends('layouts.admin')

@section('title', 'Edit Portofolio: ' . $portfolio->title)
@section('header_title', 'Edit Portofolio: ' . $portfolio->title)

@section('content')
<div class="max-w-3xl bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-xs space-y-8">
    
    <!-- Gallery Images Section -->
    @if($portfolio->images->count() > 0)
        <div class="border-b border-slate-200 pb-6 space-y-3">
            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-700">Foto Dokumentasi Galeri</h3>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                @foreach($portfolio->images as $img)
                    <div class="relative group rounded-xl overflow-hidden border border-slate-200 aspect-square">
                        <img src="{{ $img->url }}" alt="{{ $portfolio->title }}" class="w-full h-full object-cover">
                        <form action="{{ route('admin.portfolios.images.delete', $img->id) }}" method="POST" class="absolute top-2 right-2" onsubmit="return confirm('Hapus foto ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-6 h-6 rounded-full bg-rose-600 text-white flex items-center justify-center text-xs font-bold shadow-md">✕</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <form action="{{ route('admin.portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div>
                <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Judul Proyek *</label>
                <input type="text" name="title" id="title" value="{{ old('title', $portfolio->title) }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
                @error('title') <span class="text-xs text-rose-600 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Kategori -->
            <div>
                <label for="category" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Kategori / Jenis Produk</label>
                <input type="text" name="category" id="category" value="{{ old('category', $portfolio->category) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Client Name -->
            <div>
                <label for="client_name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Nama Klien / Pemesan</label>
                <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $portfolio->client_name) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
            </div>

            <!-- Project Year -->
            <div>
                <label for="project_year" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Tahun Pengerjaan</label>
                <input type="text" name="project_year" id="project_year" value="{{ old('project_year', $portfolio->project_year) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
            </div>
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Deskripsi Singkat Pengerjaan</label>
            <textarea name="description" id="description" rows="4" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">{{ old('description', $portfolio->description) }}</textarea>
        </div>

        <!-- Cover Image -->
        <div>
            <label for="cover_image" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Foto Utama (Cover)</label>
            @if($portfolio->cover_url)
                <div class="mb-3 w-32 h-24 rounded-lg overflow-hidden border border-slate-200">
                    <img src="{{ $portfolio->cover_url }}" alt="{{ $portfolio->title }}" class="w-full h-full object-cover">
                </div>
            @endif
            <input type="file" name="cover_image" id="cover_image" accept="image/*" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-sm text-slate-600 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
            <span class="text-[11px] text-slate-400 mt-1 block">Kosongkan bila tidak ingin mengubah cover.</span>
        </div>

        <!-- Multi Gallery Images -->
        <div>
            <label for="images" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Tambah Foto Dokumentasi Baru</label>
            <input type="file" name="images[]" id="images" multiple accept="image/*" class="w-full px-3 py-2 rounded-xl border border-slate-300 text-sm text-slate-600 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
        </div>

        <div class="grid grid-cols-2 gap-4 border-t border-slate-100 pt-5">
            <div>
                <label for="sort_order" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Urutan</label>
                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $portfolio->sort_order) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm">
            </div>

            <div class="flex items-center pt-6">
                <label class="flex items-center gap-2 cursor-pointer text-sm font-semibold text-slate-800">
                    <input type="checkbox" name="status" value="1" {{ old('status', $portfolio->status) ? 'checked' : '' }} class="rounded border-slate-300 text-slate-900 focus:ring-slate-900">
                    <span>Publikasikan Portofolio</span>
                </label>
            </div>
        </div>

        <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
            <a href="{{ route('admin.portfolios.index') }}" class="px-4 py-2.5 rounded-xl border border-slate-300 text-slate-700 text-xs font-bold hover:bg-slate-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold shadow-xs transition-colors">
                Perbarui Portofolio
            </button>
        </div>
    </form>
</div>
@endsection
