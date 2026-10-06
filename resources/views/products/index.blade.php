@extends('layouts.app')

@section('title', ($selectedCategory ? $selectedCategory->name . ' Custom - ' : '') . 'Katalog Aksesoris Karet, Print Rubber & Cetak Medali | Aksesorisku.store')

@section('meta_description', $selectedCategory ? $selectedCategory->description : 'Katalog lengkap produk custom print rubber PVC, aksesoris karet, cetak medali kejuaraan logam cor, dan gantungan kunci suvenir dari workshop Jaya Promosi Lestari di Aksesorisku.store.')

@section('schema_breadcrumb')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "{{ url('/') }}"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "{{ $selectedCategory ? $selectedCategory->name : 'Katalog Produk' }}",
      "item": "{{ url()->current() }}"
    }
  ]
}
</script>
@endsection

@section('content')
    <div class="bg-slate-50 min-h-screen py-10 sm:py-14 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header Banner & Breadcrumb -->
            <div class="mb-8">
                <nav class="flex text-xs text-slate-500 mb-3" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 sm:space-x-2">
                        <li>
                            <a href="{{ route('home') }}" class="hover:text-slate-900 transition-colors">Home</a>
                        </li>
                        <li><span class="text-slate-400">/</span></li>
                        <li class="font-semibold text-slate-800" aria-current="page">
                            {{ $selectedCategory ? $selectedCategory->name : 'Katalog Produk' }}
                        </li>
                    </ol>
                </nav>

                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div>
                        <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                            {{ $selectedCategory ? $selectedCategory->name . ' Custom' : 'Katalog Aksesoris Karet & Cetak Medali' }}
                        </h1>
                        <p class="text-sm sm:text-base text-slate-600 mt-2 max-w-2xl leading-relaxed">
                            {{ $selectedCategory ? $selectedCategory->description : 'Pilihan spesifikasi print rubber PVC timbul 2D/3D, cetak medali kejuaraan cor zinc alloy, dan gantungan kunci suvenir siap diproduksi di workshop Jaya Promosi Lestari.' }}
                        </p>
                    </div>

                    <div
                        class="text-xs text-slate-500 font-mono bg-white px-3 py-1.5 rounded-lg border border-slate-200 self-start md:self-auto">
                        Menampilkan {{ $products->total() }} Produk
                    </div>
                </div>
            </div>

            <!-- Filter & Search Controls Bar -->
            <div class="bg-white rounded-2xl border border-slate-200 p-4 sm:p-5 shadow-xs mb-8">
                <form action="{{ route('products.index') }}" method="GET"
                    class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                    <!-- Hidden input if category is selected -->
                    @if(request('kategori'))
                        <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                    @endif

                    <!-- Search Input -->
                    <div class="md:col-span-6 relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" name="q" value="{{ request('q') }}"
                            placeholder="Cari nama produk, material (contoh: rubber, logam, patch)..."
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-hidden focus:ring-2 focus:ring-slate-900 focus:border-slate-900 transition-colors">
                    </div>

                    <!-- Sorting Select -->
                    <div class="md:col-span-4">
                        <select name="sort" onchange="this.form.submit()"
                            class="w-full py-2.5 px-3 rounded-xl border border-slate-300 text-sm bg-white focus:outline-hidden focus:ring-2 focus:ring-slate-900 focus:border-slate-900">
                            <option value="sort_order" {{ request('sort') == 'sort_order' ? 'selected' : '' }}>Urutan
                                Rekomendasi</option>
                            <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Produk Terbaru
                            </option>
                            <option value="nama_asc" {{ request('sort') == 'nama_asc' ? 'selected' : '' }}>Nama Produk (A-Z)
                            </option>
                            <option value="nama_desc" {{ request('sort') == 'nama_desc' ? 'selected' : '' }}>Nama Produk (Z-A)
                            </option>
                            <option value="harga_rendah" {{ request('sort') == 'harga_rendah' ? 'selected' : '' }}>Harga
                                Terendah</option>
                            <option value="harga_tinggi" {{ request('sort') == 'harga_tinggi' ? 'selected' : '' }}>Harga
                                Tertinggi</option>
                        </select>
                    </div>

                    <!-- Action Button -->
                    <div class="md:col-span-2 flex gap-2">
                        <button type="submit"
                            class="w-full py-2.5 px-4 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-sm transition-colors">
                            Filter
                        </button>
                        @if(request()->hasAny(['q', 'kategori', 'sort']))
                            <a href="{{ route('products.index') }}"
                                class="py-2.5 px-3 rounded-xl border border-slate-300 hover:bg-slate-100 text-slate-700 text-xs font-semibold flex items-center justify-center transition-colors"
                                title="Reset Filter">
                                Reset
                            </a>
                        @endif
                    </div>
                </form>

                <!-- Category Filter Pills -->
                <div class="mt-4 pt-4 border-t border-slate-100 flex flex-wrap gap-2 items-center">
                    <span class="text-xs font-semibold text-slate-500 mr-2">Pilih Kategori:</span>
                    <a href="{{ route('products.index', array_filter(['q' => request('q'), 'sort' => request('sort')])) }}"
                        class="px-3.5 py-1.5 rounded-lg text-xs font-semibold transition-colors {{ empty(request('kategori')) ? 'bg-slate-900 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                        Semua Kategori
                    </a>
                    @foreach($categories as $cat)
                        <a href="{{ route('products.index', array_filter(['kategori' => $cat->slug, 'q' => request('q'), 'sort' => request('sort')])) }}"
                            class="px-3.5 py-1.5 rounded-lg text-xs font-semibold transition-colors {{ request('kategori') == $cat->slug ? 'bg-slate-900 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Products Grid (R-27: includes Empty State) -->
            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($products as $product)
                        <div
                            class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-xs hover:shadow-md transition-all duration-200 flex flex-col group">
                            <a href="{{ route('products.show', $product->slug) }}"
                                class="block relative aspect-4/3 bg-slate-100 overflow-hidden">
                                @if($product->primaryImage)
                                    <img src="{{ $product->primaryImage->url }}" alt="{{ $product->name }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-400 text-xs">
                                        Foto Produk
                                    </div>
                                @endif
                                @if($product->category)
                                    <span
                                        class="absolute top-3 left-3 px-2.5 py-1 rounded-md bg-white/95 text-[11px] font-bold text-slate-800 shadow-xs">
                                        {{ $product->category->name }}
                                    </span>
                                @endif
                                @if($product->minimum_order)
                                    <span
                                        class="absolute bottom-3 right-3 px-2 py-0.5 rounded bg-slate-900/80 text-white text-[10px] font-mono">
                                        Min. {{ $product->minimum_order }}
                                    </span>
                                @endif
                            </a>

                            <div class="p-5 flex-grow flex flex-col justify-between">
                                <div>
                                    <h2
                                        class="font-bold text-base text-slate-900 group-hover:text-emerald-700 transition-colors line-clamp-1">
                                        <a href="{{ route('products.show', $product->slug) }}">
                                            {{ $product->name }}
                                        </a>
                                    </h2>

                                    @if($product->material)
                                        <span
                                            class="inline-block text-[11px] font-medium text-amber-700 bg-amber-50 border border-amber-200/60 px-2 py-0.5 rounded-sm mt-1.5">
                                            {{ $product->material }}
                                        </span>
                                    @endif

                                    <p class="text-xs text-slate-500 mt-2 line-clamp-2 leading-relaxed">
                                        {{ $product->short_description }}
                                    </p>
                                </div>

                                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                                    <div>
                                        <span class="text-[11px] text-slate-400 block leading-none">Estimasi</span>
                                        <span class="text-sm font-extrabold text-slate-900 mt-0.5 block font-mono">
                                            {{ $product->display_price }}
                                        </span>
                                    </div>
                                    <a href="{{ route('products.show', $product->slug) }}"
                                        class="px-3 py-1.5 rounded-lg bg-slate-900 hover:bg-emerald-600 text-white text-xs font-semibold transition-colors">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination Links -->
                <div class="mt-12">
                    {{ $products->links() }}
                </div>
            @else
                <!-- Empty State (R-27 Requirement) -->
                <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center max-w-lg mx-auto my-8">
                    <div
                        class="w-16 h-16 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">Produk Tidak Ditemukan</h3>
                    <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                        Tidak ada produk yang cocok dengan kata kunci atau filter yang Anda pilih. Coba gunakan istilah
                        pencarian lain atau reset filter.
                    </p>
                    <div class="mt-6">
                        <a href="{{ route('products.index') }}"
                            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-sm transition-colors">
                            <span>Lihat Semua Produk</span>
                        </a>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection