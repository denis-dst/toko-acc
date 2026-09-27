@extends('layouts.app')

@section('title', ($product->meta_title ?: $product->name) . ' | ' . ($siteSettings['site_name'] ?? 'Toko Jaya Promosi Lestari'))

@section('meta_description', $product->meta_description ?: $product->short_description)

@section('content')

    @php
        $rawPhone = $siteSettings['whatsapp'] ?? '6281234567890';
        $cleanPhone = preg_replace('/[^0-9]/', '', $rawPhone);
        if (str_starts_with($cleanPhone, '0')) {
            $cleanPhone = '62' . substr($cleanPhone, 1);
        }

        // WhatsApp prefilled message as defined in PRD Section 7 & 8
        $waMessage = "Halo Toko Jaya Promosi Lestari, saya tertarik dengan produk:\n\n*{$product->name}*\n\nSaya ingin menanyakan informasi mengenai estimasi harga, minimal order, dan proses produksinya.\n\nTerima kasih.";
        $productWaUrl = 'https://wa.me/' . $cleanPhone . '?text=' . rawurlencode($waMessage);
    @endphp

    <div class="bg-slate-50 min-h-screen py-10 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Breadcrumb -->
            <nav class="flex text-xs text-slate-500 mb-6" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 sm:space-x-2 flex-wrap">
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-slate-900 transition-colors">Home</a>
                    </li>
                    <li><span class="text-slate-400">/</span></li>
                    <li>
                        <a href="{{ route('products.index') }}" class="hover:text-slate-900 transition-colors">Katalog</a>
                    </li>
                    @if($product->category)
                        <li><span class="text-slate-400">/</span></li>
                        <li>
                            <a href="{{ route('products.category', $product->category->slug) }}"
                                class="hover:text-slate-900 transition-colors">
                                {{ $product->category->name }}
                            </a>
                        </li>
                    @endif
                    <li><span class="text-slate-400">/</span></li>
                    <li class="font-semibold text-slate-800 truncate max-w-xs" aria-current="page">
                        {{ $product->name }}
                    </li>
                </ol>
            </nav>

            <!-- Main Product Section -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden p-6 sm:p-8 lg:p-10 mb-12">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

                    <!-- Left: Product Image Gallery -->
                    <div class="lg:col-span-6 space-y-4">
                        <!-- Main Featured Image -->
                        <div class="relative aspect-4/3 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200">
                            @php
                                $primaryImg = $product->primaryImage ? $product->primaryImage->url : asset('images/products/rubber-keychain-1.jpg');
                            @endphp
                            <img id="mainProductImage" src="{{ $primaryImg }}" alt="{{ $product->name }}"
                                class="w-full h-full object-cover transition-opacity duration-200">
                            @if($product->featured)
                                <span
                                    class="absolute top-4 left-4 px-3 py-1 rounded-md bg-slate-900 text-white text-xs font-bold shadow-md">
                                    Produk Unggulan
                                </span>
                            @endif
                        </div>

                        <!-- Thumbnails Row -->
                        @if($product->images->count() > 1)
                            <div class="flex gap-3 overflow-x-auto pb-2" id="thumbnailRow">
                                @foreach($product->images as $img)
                                    <button type="button" onclick="changeImage('{{ $img->url }}', this)"
                                        class="thumbnail-btn relative w-20 h-20 rounded-xl overflow-hidden border-2 transition-all shrink-0 focus:outline-hidden {{ $loop->first ? 'border-slate-900 ring-2 ring-slate-900/20' : 'border-slate-200 hover:border-slate-400' }}"
                                        aria-label="Lihat foto {{ $loop->iteration }}">
                                        <img src="{{ $img->url }}" alt="{{ $img->caption ?: $product->name }}"
                                            class="w-full h-full object-cover">
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Right: Product Specifications & Order CTA -->
                    <div class="lg:col-span-6 flex flex-col justify-between space-y-6">
                        <div class="space-y-4">
                            @if($product->category)
                                <a href="{{ route('products.category', $product->category->slug) }}"
                                    class="inline-block text-xs font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">
                                    {{ $product->category->name }}
                                </a>
                            @endif

                            <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">
                                {{ $product->name }}
                            </h1>

                            <!-- Price Card Box -->
                            <div
                                class="p-4 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-between">
                                <div>
                                    <span class="text-xs text-slate-500 font-medium block">Estimasi Biaya:</span>
                                    <span class="text-2xl font-black text-slate-900 font-mono tracking-tight">
                                        {{ $product->display_price }}
                                    </span>
                                </div>
                                <span
                                    class="text-[11px] text-slate-500 bg-white px-2.5 py-1 rounded border border-slate-200 text-right">
                                    Harga final sesuai jumlah & spesifikasi
                                </span>
                            </div>

                            <!-- Specifications Key-Value List -->
                            <div class="rounded-xl border border-slate-200 divide-y divide-slate-100 text-sm">
                                <div class="p-3.5 flex justify-between bg-white">
                                    <span class="text-slate-500 font-medium">Material Produk:</span>
                                    <span
                                        class="font-bold text-slate-900 text-right">{{ $product->material ?: 'Custom Sesuai Permintaan' }}</span>
                                </div>
                                <div class="p-3.5 flex justify-between bg-slate-50/50">
                                    <span class="text-slate-500 font-medium">Minimal Pemesanan:</span>
                                    <span
                                        class="font-bold text-slate-900 text-right">{{ $product->minimum_order ?: 'Bisa Konsultasi' }}</span>
                                </div>
                                <div class="p-3.5 flex justify-between bg-white">
                                    <span class="text-slate-500 font-medium">Opsi Desain Custom:</span>
                                    <span
                                        class="font-bold text-slate-900 text-right">{{ $product->custom_info ?: '2D / 3D Relief Bebas Warna' }}</span>
                                </div>
                                <div class="p-3.5 flex justify-between bg-slate-50/50">
                                    <span class="text-slate-500 font-medium">Model Transaksi:</span>
                                    <span class="font-semibold text-emerald-700 text-right">Diskusi & Order via
                                        WhatsApp</span>
                                </div>
                            </div>
                        </div>

                        <!-- Direct WhatsApp Order CTA Box (PRD Section 7) -->
                        <div class="space-y-4 pt-4 border-t border-slate-100">
                            <div class="bg-emerald-50/70 border border-emerald-200 rounded-2xl p-5 space-y-3">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-900">Tertarik
                                        dengan produk ini?</span>
                                </div>
                                <p class="text-xs text-slate-600 leading-relaxed">
                                    Diskusikan spesifikasi ukuran, jumlah pemesanan, atau kirimkan file desain Anda langsung
                                    ke tim workshop kami.
                                </p>

                                <a href="{{ $productWaUrl }}" target="_blank" rel="noopener noreferrer"
                                    class="w-full inline-flex items-center justify-center gap-2.5 px-6 py-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-base shadow-md hover:shadow-lg transition-all duration-150 focus:ring-4 focus:ring-emerald-400">
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                        <path
                                            d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                    </svg>
                                    <span>Tanya & Order via WhatsApp</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Product Description Section -->
                <div class="mt-12 pt-8 border-t border-slate-200">
                    <h2 class="text-xl font-bold text-slate-900 mb-4">
                        Deskripsi & Informasi Pembuatan
                    </h2>
                    <div class="prose prose-slate max-w-none text-sm text-slate-600 leading-relaxed whitespace-pre-line">
                        {{ $product->description ?: $product->short_description }}
                    </div>
                </div>
            </div>

            <!-- Related Products Section -->
            @if($relatedProducts->count() > 0)
                <div class="mt-12">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900">
                            Produk Terkait Lainnya
                        </h2>
                        <a href="{{ route('products.index') }}"
                            class="text-xs font-bold text-slate-700 hover:text-emerald-600 transition-colors">
                            Lihat Semua &rarr;
                        </a>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($relatedProducts as $rel)
                            <div
                                class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-xs hover:shadow-md transition-all flex flex-col group">
                                <a href="{{ route('products.show', $rel->slug) }}"
                                    class="block relative aspect-4/3 bg-slate-100 overflow-hidden">
                                    @if($rel->primaryImage)
                                        <img src="{{ $rel->primaryImage->url }}" alt="{{ $rel->name }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-400 text-xs">Foto</div>
                                    @endif
                                </a>
                                <div class="p-4 flex-grow flex flex-col justify-between">
                                    <div>
                                        <h3 class="font-bold text-sm text-slate-900 group-hover:text-emerald-600 line-clamp-1">
                                            <a href="{{ route('products.show', $rel->slug) }}">{{ $rel->name }}</a>
                                        </h3>
                                        <span class="text-xs text-slate-500 font-mono mt-1 block">{{ $rel->display_price }}</span>
                                    </div>
                                    <div class="mt-3 pt-2 border-t border-slate-100">
                                        <a href="{{ route('products.show', $rel->slug) }}"
                                            class="text-xs font-semibold text-slate-900 hover:text-emerald-600 inline-flex items-center gap-1">
                                            <span>Detail</span> &rarr;
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>

    @push('scripts')
        <script>
            function changeImage(url, button) {
                const mainImage = document.getElementById('mainProductImage');
                if (mainImage) {
                    mainImage.style.opacity = '0.5';
                    setTimeout(() => {
                        mainImage.src = url;
                        mainImage.style.opacity = '1';
                    }, 100);
                }

                const buttons = document.querySelectorAll('.thumbnail-btn');
                buttons.forEach(btn => {
                    btn.classList.remove('border-slate-900', 'ring-2', 'ring-slate-900/20');
                    btn.classList.add('border-slate-200');
                });

                button.classList.remove('border-slate-200');
                button.classList.add('border-slate-900', 'ring-2', 'ring-slate-900/20');
            }
        </script>
    @endpush
@endsection