@extends('layouts.app')

@section('title', 'Tempat Produksi Offline & Workshop | ' . ($siteSettings['site_name'] ?? 'Aksesorisku.store') . ' - Jaya Promosi Lestari')

@section('meta_description', 'Lokasi bengkel workshop tempat produksi aksesoris karet, print rubber, dan cetak medali Jaya Promosi Lestari di Aksesorisku.store.')

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
      "name": "Lokasi Workshop",
      "item": "{{ url()->current() }}"
    }
  ]
}
</script>
@endsection

@section('content')

    @php
        $rawPhone = $siteSettings['whatsapp'] ?? '6282326170804';
        $cleanPhone = preg_replace('/[^0-9]/', '', $rawPhone);
        if (str_starts_with($cleanPhone, '0')) {
            $cleanPhone = '62' . substr($cleanPhone, 1);
        }
        $locWaUrl = 'https://wa.me/' . $cleanPhone . '?text=' . rawurlencode("Halo Aksesorisku.store (Jaya Promosi Lestari), saya ingin berkunjung ke workshop untuk melihat contoh sampel bahan langsung.");
    @endphp

    <div class="bg-slate-50 min-h-screen py-12 sm:py-16 border-b border-slate-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto">
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-600 block mb-1">Workshop Offline</span>
                <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight">
                    Lokasi Workshop Jaya Promosi Lestari
                </h1>
                <p class="text-base text-slate-600 mt-3 leading-relaxed">
                    Anda dipersilakan datang langsung ke workshop kami di Bandung untuk melihat contoh fisik sampel karet rubber, ketebalan medali cor, atau mendiskusikan konsep desain secara tatap muka.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <!-- Left Info Cards -->
                <div class="lg:col-span-5 space-y-6">
                    <!-- Address Card -->
                    <div class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-xs space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-900 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-lg font-bold text-slate-900">Alamat Workshop</h2>
                        </div>

                        <p class="text-sm text-slate-600 leading-relaxed">
                            {{ $siteSettings['address'] ?? 'Jl. Industri Kreatif No. 88, Sentra Workshop & Produksi, Jawa Barat, Indonesia' }}
                        </p>

                        <div class="pt-2">
                            <a href="{{ $siteSettings['google_maps_url'] ?? 'https://maps.google.com' }}" target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                    </path>
                                </svg>
                                <span>Buka di Aplikasi Google Maps</span>
                            </a>
                        </div>
                    </div>

                    <!-- Operating Hours Card -->
                    <div class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-xs space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-900 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-lg font-bold text-slate-900">Jam Operasional</h2>
                        </div>

                        <div
                            class="text-xs sm:text-sm text-slate-700 space-y-2 whitespace-pre-line bg-slate-50 p-4 rounded-xl border border-slate-100">
                            {{ $siteSettings['opening_hours'] ?? "Senin - Jumat: 08.00 - 17.00 WIB\nSabtu: 08.00 - 15.00 WIB\nMinggu: Libur / Tutup" }}
                        </div>

                        <p class="text-xs text-slate-500">
                            *Disarankan untuk konfirmasi janji temu melalui WhatsApp sebelum datang agar tim sampel dapat
                            menyiapkan bahan yang relevan.
                        </p>
                    </div>

                    <!-- Direct CTA to visit -->
                    <div class="bg-emerald-50 border border-emerald-200 rounded-2xl p-6 space-y-3">
                        <h3 class="text-sm font-bold text-emerald-950">Ingin Mengunjungi Workshop?</h3>
                        <p class="text-xs text-slate-600">Hubungi kami via WhatsApp untuk membuat janji temu dan share live
                            location.</p>
                        <a href="{{ $locWaUrl }}" target="_blank" rel="noopener noreferrer"
                            class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-xs transition-colors">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                            </svg>
                            <span>Konfirmasi Janji Kunjungan</span>
                        </a>
                    </div>
                </div>

                <!-- Right Google Maps Embed -->
                <div
                    class="lg:col-span-7 bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-xs h-[480px] sm:h-[540px]">
                    <iframe
                        src="{{ $siteSettings['google_maps_embed'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.86877708892!2d107.5731165!3d-6.9034443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e215b5!2sBandung%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1680000000000!5m2!1sen!2sid' }}"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" title="Peta Lokasi Workshop Toko Jaya Promosi Lestari">
                    </iframe>
                </div>

            </div>

        </div>
    </div>
@endsection