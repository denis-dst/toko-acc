@extends('layouts.admin')

@section('title', 'Edit Testimoni: ' . $testimonial->name)
@section('header_title', 'Edit Testimoni: ' . $testimonial->name)

@section('content')
<div class="max-w-2xl bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-xs">
    <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Nama Pelanggan *</label>
                <input type="text" name="name" id="name" value="{{ old('name', $testimonial->name) }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
                @error('name') <span class="text-xs text-rose-600 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="organization" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Organisasi / Instansi</label>
                <input type="text" name="organization" id="organization" value="{{ old('organization', $testimonial->organization) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
            </div>
        </div>

        <div>
            <label for="rating" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Rating Bintang</label>
            <select name="rating" id="rating" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm bg-white focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
                <option value="5" {{ old('rating', $testimonial->rating) == 5 ? 'selected' : '' }}>★★★★★ (5 Bintang)</option>
                <option value="4" {{ old('rating', $testimonial->rating) == 4 ? 'selected' : '' }}>★★★★☆ (4 Bintang)</option>
                <option value="3" {{ old('rating', $testimonial->rating) == 3 ? 'selected' : '' }}>★★★☆☆ (3 Bintang)</option>
            </select>
        </div>

        <div>
            <label for="content" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Isi Ulasan *</label>
            <textarea name="content" id="content" rows="4" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">{{ old('content', $testimonial->content) }}</textarea>
            @error('content') <span class="text-xs text-rose-600 mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-2 gap-4 border-t border-slate-100 pt-5">
            <div>
                <label for="sort_order" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Urutan Tampil</label>
                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $testimonial->sort_order) }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm">
            </div>

            <div class="flex items-center pt-6">
                <label class="flex items-center gap-2 cursor-pointer text-sm font-semibold text-slate-800">
                    <input type="checkbox" name="status" value="1" {{ old('status', $testimonial->status) ? 'checked' : '' }} class="rounded border-slate-300 text-slate-900 focus:ring-slate-900">
                    <span>Publikasikan (Aktif)</span>
                </label>
            </div>
        </div>

        <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
            <a href="{{ route('admin.testimonials.index') }}" class="px-4 py-2.5 rounded-xl border border-slate-300 text-slate-700 text-xs font-bold hover:bg-slate-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="px-6 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold shadow-xs transition-colors">
                Perbarui Testimoni
            </button>
        </div>
    </form>
</div>
@endsection
