@extends('layouts.app')

@section('title', $portfolio->title . ' | Portofolio ' . ($siteSettings['site_name'] ?? 'Toko Jaya Promosi Lestari'))

@section('meta_description', Str::limit($portfolio->description, 160))

@section('content')

    @php
        $rawPhone = $siteSettings['whatsapp'] ?? '6281234567890';
        $cleanPhone = preg_replace('/[^0-9]/', '', $rawPhone);
        if (str_starts_with($cleanPhone, '0')) {
            $cleanPhone = '62' . substr($cleanPhone, 1);
        }

        $portWaMessage = "Halo Toko Jaya Promosi Lestari, saya melihat hasil portofolio:\n\n*{$portfolio->title}*\n\nSaya tertarik untuk membuat produk sejenis dengan desain custom. Mohon info estimasi biaya dan minimal ordernya.\n\nTerima kasih.";
        $portWaUrl = 'https://wa.me/' . $cleanPhone . '?text=' . rawurlencode($portWaMessage);
    @endphp

    <div class="bg-slate-50 min-h-screen py-10 border-b border-slate-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Breadcrumb -->
            <nav class="flex text-xs text-slate-500 mb-6" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 sm:space-x-2">
                    <li><a href="{{ route('home') }}" class="hover:text-slate-900">Home</a></li>
                    <li><span class="text-slate-400">/</span></li>
                    <li><a href="{{ route('portfolios.index') }}" class="hover:text-slate-900">Portofolio</a></li>
                    <li><span class="text-slate-400">/</span></li>
                    <li class="font-semibold text-slate-800 truncate max-w-xs" aria-current="page">{{ $portfolio->title }}
                    </li>
                </ol>
            </nav>

            <div class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-10 shadow-xs space-y-8">
                <!-- Header Info -->
                <div class="space-y-3">
                    <div class="flex flex-wrap items-center gap-2">
                        @if($portfolio->category)
                            <span
                                class="text-xs font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">
                                {{ $portfolio->category }}
                            </span>
                        @endif
                        @if($portfolio->project_year)
                            <span class="text-xs font-mono text-slate-500 bg-slate-100 px-2.5 py-1 rounded-full">
                                Tahun Pengerjaan: {{ $portfolio->project_year }}
                            </span>
                        @endif
                    </div>

                    <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">
                        {{ $portfolio->title }}
                    </h1>

                    @if($portfolio->client_name)
                        <p class="text-sm font-semibold text-slate-600">
                            Klien / Pemesan: <span class="text-slate-900">{{ $portfolio->client_name }}</span>
                        </p>
                    @endif
                </div>

                <!-- Cover Image -->
                <div class="rounded-2xl overflow-hidden border border-slate-200 bg-slate-100 max-h-[500px]">
                    <img src="{{ $portfolio->cover_url ?: asset('images/portfolio/medali-kejuaraan.jpg') }}"
                        alt="{{ $portfolio->title }}" class="w-full h-full object-cover">
                </div>

                <!-- Description -->
                <div
                    class="prose prose-slate max-w-none text-sm sm:text-base text-slate-700 leading-relaxed whitespace-pre-line border-t border-slate-100 pt-6">
                    {{ $portfolio->description }}
                </div>

                <!-- Additional Gallery Images -->
                @if($portfolio->images->count() > 0)
                    <div class="border-t border-slate-100 pt-8 space-y-4">
                        <h2 class="text-lg font-bold text-slate-900">
                            Dokumentasi Foto Detail
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($portfolio->images as $img)
                                <div class="rounded-xl overflow-hidden border border-slate-200 bg-slate-100 aspect-4/3">
                                    <img src="{{ $img->url }}" alt="{{ $img->caption ?: $portfolio->title }}"
                                        class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Bottom CTA Banner -->
                <div
                    class="rounded-2xl bg-slate-900 text-white p-6 sm:p-8 flex flex-col sm:flex-row items-center justify-between gap-6">
                    <div class="space-y-1 text-center sm:text-left">
                        <h3 class="text-lg font-bold">Tertarik Membuat Produk Sejenis?</h3>
                        <p class="text-xs sm:text-sm text-slate-300">Konsultasikan kebutuhan merchandise atau medali custom
                            Anda langsung ke workshop.</p>
                    </div>
                    <a href="{{ $portWaUrl }}" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md transition-colors shrink-0">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                        </svg>
                        <span>Konsultasi Produk Ini</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection