<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Primary Title & Meta Tags -->
    <title>
        @yield('title', ($siteSettings['site_name'] ?? 'Aksesorisku.store') . ' | ' . ($siteSettings['tagline'] ?? 'Pusat Custom Rubber, Cetak Medali & Aksesoris Karet - Jaya Promosi Lestari'))
    </title>
    <meta name="description"
        content="@yield('meta_description', $siteSettings['description'] ?? 'Digital showroom dan workshop produsen aksesoris karet custom (print rubber, rubber patch, wristband), cetak medali kejuaraan (logam cor & akrilik), serta gantungan kunci suvenir oleh Jaya Promosi Lestari.')">
    <meta name="keywords"
        content="@yield('meta_keywords', $siteSettings['meta_keywords'] ?? 'aksesorisku.store, aksesorisku, jaya promosi lestari, aksesoris karet, print rubber, cetak medali, gantungan kunci karet, rubber patch velcro, medali kejuaraan custom, souvenir karet bandung, pabrik karet custom')">
    <meta name="robots"
        content="@yield('meta_robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1')">
    <meta name="author" content="Aksesorisku.store - Jaya Promosi Lestari">
    <link rel="canonical" href="{{ url()->current() }}">

    @php
        $rawVerification = $siteSettings['meta_google_verification'] ?? '9Gew-qEbKHJjk-C3SbZRtVwI0nUo4SFLJVGHwOkqd8Y';
        $googleVerificationCode = str_replace('google-site-verification=', '', $rawVerification);
    @endphp
    @if(!empty($googleVerificationCode))
        <meta name="google-site-verification" content="{{ $googleVerificationCode }}">
    @endif

    <!-- Local SEO Geo Tags -->
    <meta name="geo.region" content="ID-JB">
    <meta name="geo.placename" content="Bandung, Jawa Barat, Indonesia">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="Aksesorisku.store - Jaya Promosi Lestari">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title"
        content="@yield('title', ($siteSettings['site_name'] ?? 'Aksesorisku.store') . ' | ' . ($siteSettings['tagline'] ?? 'Pusat Custom Rubber, Cetak Medali & Aksesoris Karet'))">
    <meta property="og:description"
        content="@yield('meta_description', $siteSettings['description'] ?? 'Digital showroom dan workshop produsen aksesoris karet custom, print rubber, cetak medali kejuaraan, dan gantungan kunci oleh Jaya Promosi Lestari.')">
    <meta property="og:image" content="@yield('og_image', asset('images/products/rubber-keychain-1.jpg'))">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title"
        content="@yield('title', ($siteSettings['site_name'] ?? 'Aksesorisku.store') . ' | ' . ($siteSettings['tagline'] ?? 'Pusat Custom Rubber, Cetak Medali & Aksesoris Karet'))">
    <meta name="twitter:description"
        content="@yield('meta_description', $siteSettings['description'] ?? 'Digital showroom dan workshop produsen aksesoris karet custom, print rubber, cetak medali kejuaraan, dan gantungan kunci.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/products/rubber-keychain-1.jpg'))">

    @php
        $sameAsLinks = array_values(array_filter([
            $siteSettings['instagram'] ?? null,
            $siteSettings['facebook'] ?? null,
            $siteSettings['tiktok'] ?? null,
            url('/'),
        ]));

        $schemaOrgGraph = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => ['LocalBusiness', 'Manufacturer'],
                    '@id' => url('/') . '/#organization',
                    'name' => $siteSettings['site_name'] ?? 'Aksesorisku.store',
                    'alternateName' => [
                        'Jaya Promosi Lestari',
                        'Toko Jaya Promosi Lestari',
                        'Aksesorisku',
                        'Aksesoris Karet Jaya Promosi',
                        'Aksesorisku Store'
                    ],
                    'url' => url('/'),
                    'logo' => asset('images/products/rubber-keychain-1.jpg'),
                    'image' => asset('images/products/rubber-keychain-1.jpg'),
                    'description' => $siteSettings['description'] ?? 'Digital showroom dan workshop produsen aksesoris karet custom, print rubber PVC, cetak medali kejuaraan cor logam, dan gantungan kunci oleh Jaya Promosi Lestari.',
                    'telephone' => $siteSettings['phone'] ?? '+62 823-2617-0804',
                    'email' => $siteSettings['email'] ?? 'kontak@aksesorisku.store',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'streetAddress' => $siteSettings['address'] ?? 'Jl. Sayuran Kavling Hiu Macan No. 40 RT 002 RW 008 Desa Cangkuang Kulon, Kec. Dayeuh Kolot',
                        'addressLocality' => 'Kabupaten Bandung',
                        'addressRegion' => 'Jawa Barat',
                        'addressCountry' => 'ID'
                    ],
                    'priceRange' => 'Rp 8.000 - Rp 50.000',
                    'openingHoursSpecification' => [
                        [
                            '@type' => 'OpeningHoursSpecification',
                            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                            'opens' => '08:00',
                            'closes' => '17:00'
                        ],
                        [
                            '@type' => 'OpeningHoursSpecification',
                            'dayOfWeek' => ['Saturday'],
                            'opens' => '08:00',
                            'closes' => '15:00'
                        ]
                    ],
                    'sameAs' => $sameAsLinks,
                    'hasOfferCatalog' => [
                        '@type' => 'OfferCatalog',
                        'name' => 'Layanan Produksi Merchandise & Aksesoris Custom',
                        'itemListElement' => [
                            [
                                '@type' => 'OfferCatalog',
                                'name' => 'Aksesoris Karet / Print Rubber PVC',
                                'itemListElement' => [
                                    ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Gantungan Kunci Karet 3D & 2D Custom']],
                                    ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Rubber Patch Velcro & Emblem Karet Seragam']],
                                    ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Wristband / Gelang Karet Custom']]
                                ]
                            ],
                            [
                                '@type' => 'OfferCatalog',
                                'name' => 'Cetak Medali Kejuaraan & Wisuda',
                                'itemListElement' => [
                                    ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Medali Logam Cor Zinc Alloy Die-Cast']],
                                    ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => 'Medali Akrilik Cetak UV & Grafir']]
                                ]
                            ]
                        ]
                    ]
                ],
                [
                    '@type' => 'WebSite',
                    '@id' => url('/') . '/#website',
                    'url' => url('/'),
                    'name' => $siteSettings['site_name'] ?? 'Aksesorisku.store',
                    'alternateName' => 'Aksesorisku - Jaya Promosi Lestari',
                    'publisher' => [
                        '@id' => url('/') . '/#organization'
                    ],
                    'potentialAction' => [
                        '@type' => 'SearchAction',
                        'target' => url('/katalog') . '?q={search_term_string}',
                        'query-input' => 'required name=search_term_string'
                    ]
                ]
            ]
        ];
    @endphp

    <!-- Schema.org JSON-LD Structured Data -->
    <script type="application/ld+json">
    {!! json_encode($schemaOrgGraph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    @yield('schema_breadcrumb')
    @yield('schema_product')
    @yield('schema_faq')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body
    class="bg-slate-50 text-slate-900 antialiased flex flex-col min-h-screen selection:bg-emerald-600 selection:text-white">

    @php
        $rawPhone = $siteSettings['whatsapp'] ?? '6282326170804';
        $cleanPhone = preg_replace('/[^0-9]/', '', $rawPhone);
        if (str_starts_with($cleanPhone, '0')) {
            $cleanPhone = '62' . substr($cleanPhone, 1);
        }
        $defaultWaUrl = 'https://wa.me/' . $cleanPhone . '?text=' . rawurlencode("Halo Aksesorisku.store (Jaya Promosi Lestari), saya ingin berkonsultasi mengenai pemesanan produk custom (Rubber/Medali/Gantungan Kunci).");
    @endphp

    <!-- Top Contact Bar (Desktop Only) -->
    <div class="hidden lg:block bg-slate-900 text-slate-300 text-xs py-2 border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <span class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Workshop Buka:
                        {{ Str::before($siteSettings['opening_hours'] ?? 'Senin - Jumat: 08.00 - 17.00 WIB', "\n") }}</span>
                </span>
                <span class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span>Workshop Resmi Jaya Promosi Lestari</span>
                </span>
            </div>
            <div class="flex items-center space-x-5">
                <a href="{{ $defaultWaUrl }}" target="_blank" rel="noopener noreferrer"
                    class="hover:text-emerald-400 transition-colors flex items-center gap-1">
                    <span>WhatsApp: {{ $siteSettings['phone'] ?? '+62 823-2617-0804' }}</span>
                </a>
                <span class="text-slate-700">|</span>
                <a href="{{ route('admin.login') }}" class="text-slate-400 hover:text-white transition-colors">Admin
                    Panel</a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Header -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Identity -->
                <a href="{{ route('home') }}"
                    class="flex items-center gap-3 group focus:outline-hidden focus:ring-2 focus:ring-slate-900 rounded-lg p-1">
                    <div
                        class="w-11 h-11 rounded-xl bg-slate-900 text-white flex items-center justify-center font-extrabold text-base tracking-wider shadow-md group-hover:bg-slate-800 transition-colors">
                        AK
                    </div>
                    <div>
                        <span class="block text-xl font-extrabold tracking-tight text-slate-900 leading-none">
                            {{ $siteSettings['site_name'] ?? 'aksesorisku.store' }}
                        </span>
                        <span class="block text-[11px] font-semibold text-emerald-700 mt-1 tracking-wide uppercase">
                            Workshop Jaya Promosi Lestari
                        </span>
                    </div>
                </a>

                <!-- Desktop Menu Navigation -->
                <nav class="hidden md:flex items-center gap-1 lg:gap-2" aria-label="Menu Utama">
                    <a href="{{ route('home') }}"
                        class="px-3 py-2 text-sm font-semibold rounded-md transition-colors {{ request()->routeIs('home') ? 'text-slate-950 bg-slate-100' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        Home
                    </a>

                    <!-- Dropdown Katalog -->
                    <div class="relative group" id="katalogDropdownGroup">
                        <a href="{{ route('products.index') }}"
                            class="px-3 py-2 text-sm font-semibold rounded-md inline-flex items-center gap-1 transition-colors {{ request()->routeIs('products.*') ? 'text-slate-950 bg-slate-100' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}"
                            aria-haspopup="true">
                            <span>Katalog Produk</span>
                            <svg class="w-4 h-4 text-slate-400 group-hover:text-slate-600 transition-transform group-hover:rotate-180"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                        <div
                            class="absolute left-0 mt-1 w-64 bg-white rounded-xl shadow-xl border border-slate-200 py-2 hidden group-hover:block hover:block z-50 animate-in fade-in duration-150">
                            <a href="{{ route('products.index') }}"
                                class="block px-4 py-2.5 text-xs font-bold text-slate-400 uppercase tracking-wider hover:bg-slate-50">
                                Semua Produk Katalog
                            </a>
                            <div class="border-t border-slate-100 my-1"></div>
                            @foreach($navCategories as $cat)
                                <a href="{{ route('products.category', $cat->slug) }}"
                                    class="flex items-center justify-between px-4 py-2.5 text-sm font-medium text-slate-700 hover:text-slate-950 hover:bg-slate-50 transition-colors">
                                    <span>{{ $cat->name }}</span>
                                    <span
                                        class="text-xs text-slate-400 bg-slate-100 px-2 py-0.5 rounded-full font-mono">{{ $cat->products_count ?? $cat->products()->where('status', true)->count() }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <a href="{{ route('portfolios.index') }}"
                        class="px-3 py-2 text-sm font-semibold rounded-md transition-colors {{ request()->routeIs('portfolios.*') ? 'text-slate-950 bg-slate-100' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        Portofolio
                    </a>
                    <a href="{{ route('about') }}"
                        class="px-3 py-2 text-sm font-semibold rounded-md transition-colors {{ request()->routeIs('about') ? 'text-slate-950 bg-slate-100' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        Tentang Kami
                    </a>
                    <a href="{{ route('location') }}"
                        class="px-3 py-2 text-sm font-semibold rounded-md transition-colors {{ request()->routeIs('location') ? 'text-slate-950 bg-slate-100' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        Lokasi Workshop
                    </a>
                    <a href="{{ route('contact') }}"
                        class="px-3 py-2 text-sm font-semibold rounded-md transition-colors {{ request()->routeIs('contact') ? 'text-slate-950 bg-slate-100' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                        Kontak
                    </a>
                </nav>

                <!-- Desktop CTA Action -->
                <div class="hidden md:flex items-center gap-3">
                    <a href="{{ $defaultWaUrl }}" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm shadow-sm transition-all duration-150 focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                        </svg>
                        <span>Konsultasi Order</span>
                    </a>
                </div>

                <!-- Mobile Hamburger Button -->
                <div class="flex md:hidden items-center">
                    <button type="button" id="mobileMenuButton"
                        class="p-2.5 rounded-xl text-slate-700 hover:text-slate-950 hover:bg-slate-100 focus:outline-hidden focus:ring-2 focus:ring-slate-900"
                        aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="mobileMenu">
                        <svg id="hamburgerIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <svg id="closeIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer Navigation -->
        <div id="mobileMenu" class="hidden md:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-6 space-y-2">
            <a href="{{ route('home') }}"
                class="block px-3 py-2.5 rounded-lg text-base font-semibold {{ request()->routeIs('home') ? 'bg-slate-100 text-slate-900' : 'text-slate-700 hover:bg-slate-50' }}">
                Home
            </a>

            <div class="py-1">
                <a href="{{ route('products.index') }}"
                    class="block px-3 py-2 text-base font-semibold {{ request()->routeIs('products.*') ? 'text-slate-900' : 'text-slate-700' }}">
                    Katalog Produk
                </a>
                <div class="pl-4 space-y-1 mt-1 border-l-2 border-slate-200 ml-3">
                    <a href="{{ route('products.index') }}"
                        class="block px-2 py-1.5 text-sm text-slate-600 hover:text-slate-900">Semua Produk</a>
                    @foreach($navCategories as $cat)
                        <a href="{{ route('products.category', $cat->slug) }}"
                            class="block px-2 py-1.5 text-sm text-slate-600 hover:text-slate-900">
                            {{ $cat->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <a href="{{ route('portfolios.index') }}"
                class="block px-3 py-2.5 rounded-lg text-base font-semibold {{ request()->routeIs('portfolios.*') ? 'bg-slate-100 text-slate-900' : 'text-slate-700 hover:bg-slate-50' }}">
                Portofolio Produksi
            </a>
            <a href="{{ route('about') }}"
                class="block px-3 py-2.5 rounded-lg text-base font-semibold {{ request()->routeIs('about') ? 'bg-slate-100 text-slate-900' : 'text-slate-700 hover:bg-slate-50' }}">
                Tentang Kami
            </a>
            <a href="{{ route('location') }}"
                class="block px-3 py-2.5 rounded-lg text-base font-semibold {{ request()->routeIs('location') ? 'bg-slate-100 text-slate-900' : 'text-slate-700 hover:bg-slate-50' }}">
                Lokasi Workshop
            </a>
            <a href="{{ route('contact') }}"
                class="block px-3 py-2.5 rounded-lg text-base font-semibold {{ request()->routeIs('contact') ? 'bg-slate-100 text-slate-900' : 'text-slate-700 hover:bg-slate-50' }}">
                Kontak
            </a>

            <div class="pt-4 border-t border-slate-100">
                <a href="{{ $defaultWaUrl }}" target="_blank" rel="noopener noreferrer"
                    class="w-full flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-base shadow-sm">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path
                            d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                    </svg>
                    <span>Chat WhatsApp Sekarang</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content Body -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Floating WhatsApp CTA -->
    <div class="fixed bottom-6 right-6 z-40 group">
        <a href="{{ $defaultWaUrl }}" target="_blank" rel="noopener noreferrer"
            class="flex items-center gap-2.5 px-4 py-3 rounded-full bg-emerald-600 hover:bg-emerald-700 text-white shadow-xl hover:shadow-2xl transition-all duration-200 transform hover:-translate-y-1 focus:outline-hidden focus:ring-4 focus:ring-emerald-400"
            aria-label="Konsultasi dan Order via WhatsApp">
            <svg class="w-6 h-6 fill-current shrink-0" viewBox="0 0 24 24">
                <path
                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
            </svg>
            <span class="font-bold text-sm tracking-wide hidden sm:inline-block">Tanya via WhatsApp</span>
        </a>
    </div>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 pt-16 pb-12 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                <!-- Col 1: Brand Info -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-xl bg-white text-slate-900 flex items-center justify-center font-extrabold text-base">
                            AK
                        </div>
                        <div>
                            <span class="text-xl font-bold tracking-tight text-white block">
                                {{ $siteSettings['site_name'] ?? 'aksesorisku.store' }}
                            </span>
                            <span class="text-[11px] font-semibold text-emerald-400 block uppercase tracking-wider">
                                Jaya Promosi Lestari
                            </span>
                        </div>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        {{ $siteSettings['description'] ?? 'Digital showroom dan workshop produsen spesialis custom rubber PVC, cetak medali kejuaraan, dan gantungan kunci suvenir.' }}
                    </p>
                    <div class="pt-2">
                        <span
                            class="inline-block text-xs font-semibold uppercase tracking-wider text-emerald-400 bg-emerald-950/60 border border-emerald-800/60 px-3 py-1 rounded-full">
                            Langsung Workshop Produsen
                        </span>
                    </div>
                </div>

                <!-- Col 2: Kategori Produk -->
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-wider text-white mb-4">
                        Kategori Produk
                    </h3>
                    <ul class="space-y-2.5 text-sm">
                        @foreach($navCategories as $cat)
                            <li>
                                <a href="{{ route('products.category', $cat->slug) }}"
                                    class="text-slate-400 hover:text-white transition-colors">
                                    {{ $cat->name }}
                                </a>
                            </li>
                        @endforeach
                        <li>
                            <a href="{{ route('products.index') }}"
                                class="text-emerald-400 hover:underline inline-flex items-center gap-1 font-medium">
                                <span>Lihat Semua Katalog</span>
                                <span>&rarr;</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Col 3: Navigasi Cepat -->
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-wider text-white mb-4">
                        Halaman Informasi
                    </h3>
                    <ul class="space-y-2.5 text-sm">
                        <li>
                            <a href="{{ route('portfolios.index') }}"
                                class="text-slate-400 hover:text-white transition-colors">
                                Portofolio Pengerjaan
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="text-slate-400 hover:text-white transition-colors">
                                Profil Workshop Kami
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('testimonials') }}"
                                class="text-slate-400 hover:text-white transition-colors">
                                Ulasan Pelanggan
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('location') }}" class="text-slate-400 hover:text-white transition-colors">
                                Lokasi Tempat Produksi
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="text-slate-400 hover:text-white transition-colors">
                                Hubungi Kami
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('sitemap') }}" class="text-slate-500 hover:text-slate-400 transition-colors text-xs">
                                Sitemap XML
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Col 4: Alamat & Jam Buka -->
                <div class="space-y-3">
                    <h3 class="text-sm font-bold uppercase tracking-wider text-white mb-4">
                        Tempat Produksi & Workshop
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        {{ $siteSettings['address'] ?? 'Jl. Sayuran Kavling Hiu Macan No. 40 RT 002 RW 008 Desa Cangkuang Kulon, Kec. Dayeuh Kolot, Kab. Bandung' }}
                    </p>
                    <div class="p-3 rounded-lg bg-slate-800/80 border border-slate-700/60 text-xs space-y-1">
                        <span class="block font-semibold text-slate-200">Jam Operasional:</span>
                        <p class="text-slate-400 whitespace-pre-line">
                            {{ $siteSettings['opening_hours'] ?? "Senin - Jumat: 08.00 - 17.00 WIB\nSabtu: 08.00 - 15.00 WIB" }}
                        </p>
                    </div>
                    <div class="pt-1">
                        <a href="{{ $siteSettings['google_maps_url'] ?? 'https://maps.google.com' }}" target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex items-center gap-1.5 text-xs text-emerald-400 hover:text-emerald-300 font-medium">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                            <span>Buka di Google Maps</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- SEO Quick Keywords Strip -->
            <div class="mt-10 pt-6 border-t border-slate-800/80 text-[11px] text-slate-400 leading-relaxed">
                <span class="font-bold text-slate-300 uppercase tracking-wider block mb-1">Spesialisasi Produksi Aksesorisku.store (Jaya Promosi Lestari):</span>
                <p>
                    Aksesoris Karet Custom • Print Rubber PVC • Cetak Medali Kejuaraan Cor Zinc Alloy • Gantungan Kunci Karet 3D / 2D • Rubber Patch Velcro Seragam & Tactical • Medali Lomba & Wisuda Logam Cor / Akrilik • Wristband & Gelang Karet Promosi • Souvenir Promosi Perusahaan & Komunitas.
                </p>
            </div>

            <!-- Bottom Copyright & Social -->
            <div
                class="mt-8 pt-6 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-4">
                <p>&copy; {{ date('Y') }} {{ $siteSettings['site_name'] ?? 'aksesorisku.store' }} (Jaya Promosi Lestari). Hak cipta
                    dilindungi undang-undang.</p>
                <div class="flex items-center space-x-6">
                    @if(!empty($siteSettings['instagram']))
                        <a href="{{ $siteSettings['instagram'] }}" target="_blank" rel="noopener noreferrer"
                            class="hover:text-slate-300 transition-colors">Instagram</a>
                    @endif
                    @if(!empty($siteSettings['facebook']))
                        <a href="{{ $siteSettings['facebook'] }}" target="_blank" rel="noopener noreferrer"
                            class="hover:text-slate-300 transition-colors">Facebook</a>
                    @endif
                    @if(!empty($siteSettings['tiktok']))
                        <a href="{{ $siteSettings['tiktok'] }}" target="_blank" rel="noopener noreferrer"
                            class="hover:text-slate-300 transition-colors">TikTok</a>
                    @endif
                    <a href="{{ route('admin.login') }}" class="hover:text-slate-300 transition-colors">Admin</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Interactive Navigation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuBtn = document.getElementById('mobileMenuButton');
            const mobileMenu = document.getElementById('mobileMenu');
            const hamburgerIcon = document.getElementById('hamburgerIcon');
            const closeIcon = document.getElementById('closeIcon');

            if (menuBtn && mobileMenu) {
                menuBtn.addEventListener('click', function () {
                    const isExpanded = menuBtn.getAttribute('aria-expanded') === 'true';
                    menuBtn.setAttribute('aria-expanded', !isExpanded);
                    mobileMenu.classList.toggle('hidden');
                    hamburgerIcon.classList.toggle('hidden');
                    closeIcon.classList.toggle('hidden');
                });

                // Close on escape
                document.addEventListener('keydown', function (e) {
                    if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
                        menuBtn.setAttribute('aria-expanded', 'false');
                        mobileMenu.classList.add('hidden');
                        hamburgerIcon.classList.remove('hidden');
                        closeIcon.classList.add('hidden');
                    }
                });
            }
        });
    </script>
    @stack('scripts')
</body>

</html>