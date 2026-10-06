@extends('layouts.app')

@section('title', 'Portofolio Produksi Rubber & Medali | ' . ($siteSettings['site_name'] ?? 'Aksesorisku.store') . ' - Jaya Promosi Lestari')

@section('meta_description', 'Dokumentasi hasil pengerjaan produk custom rubber PVC, cetak medali kejuaraan, dan gantungan kunci suvenir oleh workshop Jaya Promosi Lestari di Aksesorisku.store.')

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
      "name": "Portofolio",
      "item": "{{ url()->current() }}"
    }
  ]
}
</script>
@endsection

@section('content')
    <div class="bg-slate-50 min-h-screen py-10 sm:py-14 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mb-10 text-center max-w-3xl mx-auto">
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-600 block mb-1">Galeri Workshop</span>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Portofolio Hasil Produksi
                </h1>
                <p class="text-sm sm:text-base text-slate-600 mt-2 leading-relaxed">
                    Dokumentasi pengerjaan pesanan medali turnamen, emblem rubber, dan gantungan kunci oleh workshop Jaya Promosi Lestari di Aksesorisku.store.
                </p>
            </div>

            <!-- Filter Categories (if any) -->
            @if($categories->count() > 0)
                <div class="flex flex-wrap justify-center gap-2 mb-10">
                    <a href="{{ route('portfolios.index') }}"
                        class="px-4 py-2 rounded-xl text-xs font-semibold transition-colors {{ empty(request('kategori')) ? 'bg-slate-900 text-white' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200' }}">
                        Semua Kategori
                    </a>
                    @foreach($categories as $categoryName)
                        <a href="{{ route('portfolios.index', ['kategori' => $categoryName]) }}"
                            class="px-4 py-2 rounded-xl text-xs font-semibold transition-colors {{ request('kategori') == $categoryName ? 'bg-slate-900 text-white' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200' }}">
                            {{ $categoryName }}
                        </a>
                    @endforeach
                </div>
            @endif

            <!-- Grid Portfolios (R-27: includes Empty State) -->
            @if($portfolios->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($portfolios as $portfolio)
                        <div
                            class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-xs hover:shadow-md transition-all duration-200 flex flex-col group">
                            <a href="{{ route('portfolios.show', $portfolio->slug) }}"
                                class="block relative aspect-4/3 bg-slate-100 overflow-hidden">
                                <img src="{{ $portfolio->cover_url ?: asset('images/portfolio/medali-kejuaraan.jpg') }}"
                                    alt="{{ $portfolio->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                @if($portfolio->category)
                                    <span
                                        class="absolute top-3 left-3 px-2.5 py-1 rounded-md bg-white/95 text-[11px] font-bold text-slate-800 shadow-xs">
                                        {{ $portfolio->category }}
                                    </span>
                                @endif
                                @if($portfolio->project_year)
                                    <span
                                        class="absolute bottom-3 right-3 px-2 py-0.5 rounded bg-slate-900/80 text-white text-[10px] font-mono">
                                        {{ $portfolio->project_year }}
                                    </span>
                                @endif
                            </a>

                            <div class="p-6 flex-grow flex flex-col justify-between">
                                <div>
                                    <h2
                                        class="font-bold text-lg text-slate-900 group-hover:text-emerald-700 transition-colors line-clamp-1">
                                        <a href="{{ route('portfolios.show', $portfolio->slug) }}">
                                            {{ $portfolio->title }}
                                        </a>
                                    </h2>

                                    @if($portfolio->client_name)
                                        <span class="text-xs text-emerald-700 font-semibold mt-1 block">
                                            Klien: {{ $portfolio->client_name }}
                                        </span>
                                    @endif

                                    <p class="text-xs text-slate-600 mt-2 line-clamp-2 leading-relaxed">
                                        {{ $portfolio->description }}
                                    </p>
                                </div>

                                <div class="mt-4 pt-3 border-t border-slate-100">
                                    <a href="{{ route('portfolios.show', $portfolio->slug) }}"
                                        class="text-xs font-bold text-slate-900 hover:text-emerald-600 inline-flex items-center gap-1 transition-colors">
                                        <span>Lihat Detail Pengerjaan</span>
                                        <span>&rarr;</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $portfolios->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center max-w-lg mx-auto">
                    <div
                        class="w-16 h-16 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">Belum Ada Portofolio</h3>
                    <p class="text-sm text-slate-500 mt-2">
                        Dokumentasi hasil pengerjaan untuk kategori ini belum tersedia.
                    </p>
                    <div class="mt-6">
                        <a href="{{ route('portfolios.index') }}"
                            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-sm transition-colors">
                            <span>Lihat Semua Portofolio</span>
                        </a>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection