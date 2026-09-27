@extends('layouts.app')

@section('title', ($siteSettings['site_name'] ?? 'Toko ACC') . ' | ' . ($siteSettings['tagline'] ?? 'Spesialis Custom Rubber, Medali & Gantungan Kunci'))

@section('content')

@php
    $rawPhone = $siteSettings['whatsapp'] ?? '6281234567890';
    $cleanPhone = preg_replace('/[^0-9]/', '', $rawPhone);
    if (str_starts_with($cleanPhone, '0')) {
        $cleanPhone = '62' . substr($cleanPhone, 1);
    }
    $heroWaUrl = 'https://wa.me/' . $cleanPhone . '?text=' . rawurlencode("Halo Toko ACC, saya ingin konsultasi mengenai pembuatan produk custom (Rubber/Medali/Gantungan Kunci).");
@endphp

<!-- Section 1: Hero -->
<section class="relative bg-white border-b border-slate-200 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left Text Content -->
            <div class="lg:col-span-7 space-y-6 text-left">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-slate-100 border border-slate-200 text-xs font-bold text-slate-700 uppercase tracking-wider">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>Digital Showroom & Workshop Spesialis</span>
                </div>
                
                <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-tight">
                    Custom Rubber, Medali & Gantungan Kunci
                </h1>

                <p class="text-base sm:text-lg text-slate-600 max-w-2xl leading-relaxed">
                    Wujudkan produk suvenir dan cinderamata berkualitas langsung dari workshop produksi. Cocok untuk kebutuhan event, kejuaraan, komunitas, sekolah, dan promosi perusahaan.
                </p>

                <!-- CTA Action Buttons -->
                <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
                    <a href="{{ route('products.index') }}" class="inline-flex justify-center items-center gap-2 px-6 py-3.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-base shadow-sm transition-all duration-150 focus:ring-2 focus:ring-slate-900 focus:ring-offset-2">
                        <span>Lihat Katalog Produk</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>

                    <a href="{{ $heroWaUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex justify-center items-center gap-2.5 px-6 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-base shadow-sm transition-all duration-150 focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <span>Diskusi via WhatsApp</span>
                    </a>
                </div>

                <!-- Workshop Key Points -->
                <div class="pt-6 grid grid-cols-3 gap-4 border-t border-slate-100 text-xs text-slate-500">
                    <div>
                        <span class="block font-bold text-slate-900 text-sm">Custom Desain</span>
                        <span>Bebas bentuk 2D/3D</span>
                    </div>
                    <div>
                        <span class="block font-bold text-slate-900 text-sm">Kualitas Presisi</span>
                        <span>Bahan tahan lama</span>
                    </div>
                    <div>
                        <span class="block font-bold text-slate-900 text-sm">Pabrik Langsung</span>
                        <span>Harga kompetitif</span>
                    </div>
                </div>
            </div>

            <!-- Right Visual Stage -->
            <div class="lg:col-span-5 relative">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    <div class="relative rounded-2xl overflow-hidden border border-slate-200 shadow-xl bg-slate-100">
                        <img src="{{ asset('images/products/rubber-keychain-1.jpg') }}" alt="Produk Rubber dan Medali Toko ACC" class="w-full h-[380px] sm:h-[440px] object-cover" loading="eager">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent flex items-end p-6">
                            <div class="text-white">
                                <span class="text-xs uppercase tracking-wider font-semibold text-emerald-400 block mb-1">Hasil Produksi Workshop</span>
                                <h2 class="text-lg font-bold">Presisi Relief 3D & Finishing Rapi</h2>
                                <p class="text-xs text-slate-200 mt-1">Dicetak khusus sesuai file vektor / sketsa logo pemesan.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Badge -->
                    <div class="absolute -bottom-5 -left-5 bg-white rounded-xl shadow-lg border border-slate-200 p-3.5 hidden sm:flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-lg">
                            ✓
                        </div>
                        <div>
                            <span class="text-xs font-bold text-slate-900 block">Proses Mudah</span>
                            <span class="text-[11px] text-slate-500">Kirim desain -> Estimasi -> Produksi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: Kategori Produk -->
<section class="py-16 md:py-20 bg-slate-50 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                Kategori Produk Utama
            </h2>
            <p class="text-sm sm:text-base text-slate-600 mt-2">
                Pilih kategori produk custom yang sesuai dengan kebutuhan acara atau merchandise Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($categories as $category)
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-xs hover:shadow-md transition-all duration-200 flex flex-col group">
                    <div class="h-56 bg-slate-100 overflow-hidden relative">
                        <img src="{{ $category->image_url ?: asset('images/categories/rubber.jpg') }}" alt="{{ $category->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-700 transition-colors">
                                {{ $category->name }}
                            </h3>
                            <p class="text-sm text-slate-600 mt-2 line-clamp-3 leading-relaxed">
                                {{ $category->description }}
                            </p>
                        </div>
                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-medium text-slate-500">
                                {{ $category->products_count ?? $category->products()->where('status', true)->count() }} Produk
                            </span>
                            <a href="{{ route('products.category', $category->slug) }}" class="inline-flex items-center gap-1 text-sm font-bold text-slate-900 hover:text-emerald-600 transition-colors">
                                <span>Lihat Produk</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 bg-white rounded-xl border border-slate-200 text-slate-500 text-sm">
                    Kategori produk belum ditambahkan.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Section 3: Produk Unggulan -->
<section class="py-16 md:py-24 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-600 block mb-1">Pilihan Terbaik</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                    Produk Unggulan Workshop
                </h2>
                <p class="text-sm sm:text-base text-slate-600 mt-1">
                    Contoh produk paling sering dipesan oleh komunitas, sekolah, dan perusahaan.
                </p>
            </div>
            <a href="{{ route('products.index') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-slate-900 hover:text-emerald-600 transition-colors self-start md:self-auto">
                <span>Buka Seluruh Katalog</span>
                <span>&rarr;</span>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($featuredProducts as $product)
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-xs hover:shadow-md transition-all duration-200 flex flex-col group">
                    <a href="{{ route('products.show', $product->slug) }}" class="block relative aspect-4/3 bg-slate-100 overflow-hidden">
                        @if($product->primaryImage)
                            <img src="{{ $product->primaryImage->url }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-400 text-xs">
                                Foto Produk
                            </div>
                        @endif
                        @if($product->category)
                            <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md bg-white/95 backdrop-blur-xs text-[11px] font-bold text-slate-800 shadow-xs">
                                {{ $product->category->name }}
                            </span>
                        @endif
                    </a>

                    <div class="p-5 flex-grow flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-base text-slate-900 group-hover:text-emerald-700 transition-colors line-clamp-1">
                                <a href="{{ route('products.show', $product->slug) }}">
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <p class="text-xs text-slate-500 mt-1 line-clamp-2">
                                {{ $product->short_description }}
                            </p>
                        </div>

                        <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                            <div>
                                <span class="text-[11px] text-slate-400 block leading-none">Estimasi Harga</span>
                                <span class="text-sm font-extrabold text-slate-900 mt-0.5 block font-mono">
                                    {{ $product->display_price }}
                                </span>
                            </div>
                            <a href="{{ route('products.show', $product->slug) }}" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-900 hover:text-white text-slate-900 text-xs font-semibold transition-colors">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center py-12 bg-slate-50 rounded-xl border border-slate-200 text-slate-500 text-sm">
                    Belum ada produk unggulan yang ditampilkan.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Section 4: Mengapa Memilih Kami -->
<section class="py-16 md:py-20 bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mb-12">
            <span class="text-xs font-bold uppercase tracking-wider text-emerald-400 block mb-1">Kualitas & Kepercayaan</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                Mengapa Memesan di Workshop Toko ACC?
            </h2>
            <p class="text-sm sm:text-base text-slate-300 mt-2">
                Kami berfokus pada ketepatan spesifikasi fisik, kerapian cetakan, dan kenyamanan komunikasi langsung.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-6">
                <div class="w-12 h-12 rounded-xl bg-emerald-950 border border-emerald-700/60 text-emerald-400 flex items-center justify-center font-bold text-lg mb-4">
                    01
                </div>
                <h3 class="text-lg font-bold text-white mb-2">Langsung Workshop</h3>
                <p class="text-sm text-slate-300 leading-relaxed">
                    Diproduksi di bengkel workshop sendiri tanpa perantara ketiga, menjamin kontrol kualitas dan harga langsung produsen.
                </p>
            </div>

            <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-6">
                <div class="w-12 h-12 rounded-xl bg-emerald-950 border border-emerald-700/60 text-emerald-400 flex items-center justify-center font-bold text-lg mb-4">
                    02
                </div>
                <h3 class="text-lg font-bold text-white mb-2">Bebas Custom Desain</h3>
                <p class="text-sm text-slate-300 leading-relaxed">
                    Mulai dari bentuk, warna, ketebalan, hingga jenis gantungan atau tali kalung medali dapat disesuaikan dengan file logo Anda.
                </p>
            </div>

            <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-6">
                <div class="w-12 h-12 rounded-xl bg-emerald-950 border border-emerald-700/60 text-emerald-400 flex items-center justify-center font-bold text-lg mb-4">
                    03
                </div>
                <h3 class="text-lg font-bold text-white mb-2">Sampel Sebelum Massal</h3>
                <p class="text-sm text-slate-300 leading-relaxed">
                    Kami memverifikasi cetakan atau foto sampel awal melalui WhatsApp sebelum melanjutkan proses produksi massal.
                </p>
            </div>

            <div class="bg-slate-800/80 border border-slate-700/80 rounded-2xl p-6">
                <div class="w-12 h-12 rounded-xl bg-emerald-950 border border-emerald-700/60 text-emerald-400 flex items-center justify-center font-bold text-lg mb-4">
                    04
                </div>
                <h3 class="text-lg font-bold text-white mb-2">Pengiriman Seluruh Indonesia</h3>
                <p class="text-sm text-slate-300 leading-relaxed">
                    Packing aman dengan bubble wrap dan dus tebal, bekerja sama dengan ekspedisi kargo terpercaya ke seluruh kota.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Section 5: Portofolio Produksi -->
<section class="py-16 md:py-24 bg-slate-50 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-600 block mb-1">Bukti Pengerjaan</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                    Portofolio Pekerjaan Selesai
                </h2>
                <p class="text-sm sm:text-base text-slate-600 mt-1">
                    Dokumentasi hasil pengerjaan pesanan medali, rubber, dan gantungan kunci nyata.
                </p>
            </div>
            <a href="{{ route('portfolios.index') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-slate-900 hover:text-emerald-600 transition-colors self-start md:self-auto">
                <span>Lihat Semua Portofolio</span>
                <span>&rarr;</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($portfolios as $portfolio)
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-xs hover:shadow-md transition-all duration-200 flex flex-col group">
                    <a href="{{ route('portfolios.show', $portfolio->slug) }}" class="block relative aspect-4/3 bg-slate-100 overflow-hidden">
                        <img src="{{ $portfolio->cover_url ?: asset('images/portfolio/medali-kejuaraan.jpg') }}" alt="{{ $portfolio->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @if($portfolio->category)
                            <span class="absolute top-3 left-3 px-2.5 py-1 rounded-md bg-white/95 text-[11px] font-bold text-slate-800 shadow-xs">
                                {{ $portfolio->category }}
                            </span>
                        @endif
                        @if($portfolio->project_year)
                            <span class="absolute bottom-3 right-3 px-2 py-0.5 rounded bg-slate-900/80 text-white text-[10px] font-mono">
                                Tahun {{ $portfolio->project_year }}
                            </span>
                        @endif
                    </a>

                    <div class="p-6 flex-grow flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-lg text-slate-900 group-hover:text-emerald-700 transition-colors line-clamp-1">
                                <a href="{{ route('portfolios.show', $portfolio->slug) }}">
                                    {{ $portfolio->title }}
                                </a>
                            </h3>
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
                            <a href="{{ route('portfolios.show', $portfolio->slug) }}" class="text-xs font-bold text-slate-900 hover:text-emerald-600 inline-flex items-center gap-1">
                                <span>Lihat Dokumentasi Lengkap</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 bg-white rounded-xl border border-slate-200 text-slate-500 text-sm">
                    Dokumentasi portofolio belum tersedia.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Section 6: Testimoni Pelanggan (Anti-Slop R-18 Compliant) -->
@if($testimonials->count() > 0)
<section class="py-16 md:py-20 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-bold uppercase tracking-wider text-emerald-600 block mb-1">Ulasan Nyata</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                Pengalaman Pemesan di Toko ACC
            </h2>
            <p class="text-sm text-slate-600 mt-1">
                Ulasan langsung dari para koordinator event, panitia lomba, dan perwakilan komunitas.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonials as $testi)
                <div class="bg-slate-50 rounded-2xl border border-slate-200 p-6 flex flex-col justify-between">
                    <div>
                        <!-- Star Rating -->
                        <div class="flex items-center space-x-1 text-amber-500 mb-3" aria-label="Rating {{ $testi->rating }} dari 5">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= $testi->rating ? 'fill-current' : 'text-slate-300' }}" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>

                        <p class="text-sm text-slate-700 leading-relaxed italic">
                            "{{ $testi->content }}"
                        </p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-slate-200/80 flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-slate-900 text-white font-bold flex items-center justify-center text-sm shrink-0">
                            {{ substr($testi->name, 0, 1) }}
                        </div>
                        <div>
                            <span class="block text-sm font-bold text-slate-900">{{ $testi->name }}</span>
                            @if($testi->organization)
                                <span class="block text-xs text-slate-500">{{ $testi->organization }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Section 7: Tentang Kami Singkat & Workshop -->
<section class="py-16 md:py-20 bg-slate-50 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="rounded-2xl overflow-hidden border border-slate-200 shadow-md">
                <img src="{{ asset('images/workshop/workshop-1.jpg') }}" alt="Workshop Produksi Toko ACC" class="w-full h-80 sm:h-96 object-cover">
            </div>

            <div class="space-y-5">
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-600 block">Fasilitas Produksi</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                    Bengkel Workshop Berpengalaman & Mesin Presisi
                </h2>
                <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                    Toko ACC bergerak dalam industri manufaktur kreatif suvenir dan merchandise custom. Dengan dukungan mesin cetak cor presisi dan formula karet PVC berkualitas, kami memastikan setiap produk memiliki ketahanan warna dan bentuk yang optimal.
                </p>

                <div class="space-y-3 pt-2">
                    <div class="flex items-start gap-3">
                        <div class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">✓</div>
                        <p class="text-sm text-slate-700"><strong>Material Terpilih:</strong> Karet PVC elastis tanpa retak, logam zinc alloy anti-karat, dan akrilik bening kualitas tinggi.</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-5 h-5 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">✓</div>
                        <p class="text-sm text-slate-700"><strong>Kapasitas Produksi:</strong> Siap menangani pesanan mulai dari minimum order puluhan unit hingga ribuan unit untuk skala nasional.</p>
                    </div>
                </div>

                <div class="pt-4">
                    <a href="{{ route('about') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-900 hover:text-emerald-600 transition-colors">
                        <span>Baca Profil Lengkap Workshop Kami</span>
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 8: CTA WhatsApp Utama (Conversion Engine) -->
<section class="py-16 md:py-20 bg-slate-900 text-white relative overflow-hidden">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        <span class="inline-block px-3 py-1 rounded-full bg-emerald-950 border border-emerald-700 text-emerald-400 text-xs font-bold uppercase tracking-wider">
            Konsultasi Langsung Gratis
        </span>

        <h2 class="text-2xl sm:text-4xl font-extrabold tracking-tight">
            Punya Desain Sendiri atau Butuh Bantuan Format?
        </h2>

        <p class="text-base text-slate-300 max-w-2xl mx-auto leading-relaxed">
            Kirimkan sketsa, file vektor, atau deskripsi produk yang ingin Anda buat. Tim workshop kami siap memberikan perhitungan estimasi harga, saran material, dan waktu pengerjaan.
        </p>

        <div class="pt-4">
            <a href="{{ $heroWaUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-3 px-8 py-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-base sm:text-lg shadow-lg hover:shadow-xl transition-all duration-150 focus:ring-4 focus:ring-emerald-400">
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                <span>Tanya Harga & Diskusi via WhatsApp</span>
            </a>
        </div>
        <p class="text-xs text-slate-400">Respon cepat pada jam kerja operasional workshop.</p>
    </div>
</section>

@endsection
