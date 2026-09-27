@extends('layouts.app')

@section('title', 'Tentang Kami | ' . ($siteSettings['site_name'] ?? 'Toko Jaya Promosi Lestari'))

@section('meta_description', 'Profil workshop spesialis custom rubber PVC, medali kejuaraan dan gantungan kunci suvenir.')

@section('content')

    @php
        $rawPhone = $siteSettings['whatsapp'] ?? '6281234567890';
        $cleanPhone = preg_replace('/[^0-9]/', '', $rawPhone);
        if (str_starts_with($cleanPhone, '0')) {
            $cleanPhone = '62' . substr($cleanPhone, 1);
        }
        $aboutWaUrl = 'https://wa.me/' . $cleanPhone . '?text=' . rawurlencode("Halo Toko Jaya Promosi Lestari, saya ingin berkonsultasi mengenai produksi merchandise custom.");
    @endphp

    <div class="bg-slate-50 min-h-screen py-12 sm:py-16 border-b border-slate-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto">
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-600 block mb-1">Profil Usaha</span>
                <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight">
                    Spesialis Produksi Rubber, Medali & Gantungan Kunci
                </h1>
                <p class="text-base text-slate-600 mt-4 leading-relaxed">
                    Toko Jaya Promosi Lestari adalah workshop manufaktur kreatif yang memproduksi berbagai cinderamata,
                    merchandise promosi, dan atribut penghargaan custom langsung dari bengkel produksi.
                </p>
            </div>

            <!-- Hero Workshop Image -->
            <div class="rounded-3xl overflow-hidden border border-slate-200 shadow-xl bg-slate-900">
                <img src="{{ asset('images/workshop/workshop-1.jpg') }}"
                    alt="Area Workshop Produksi Toko Jaya Promosi Lestari" class="w-full h-80 sm:h-[450px] object-cover">
            </div>

            <!-- Profil & Filosofi Pengerjaan -->
            <div
                class="grid grid-cols-1 md:grid-cols-2 gap-10 bg-white rounded-3xl border border-slate-200 p-8 sm:p-12 shadow-xs">
                <div class="space-y-4">
                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-600 block">Keahlian Kami</span>
                    <h2 class="text-2xl font-extrabold text-slate-900">Fokus Pada Presisi & Mutu Fisik</h2>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Kami memahami bahwa cinderamata dan medali penghargaan mencerminkan kehormatan acara serta citra
                        merek pemesan. Oleh karena itu, setiap pesanan melalui tahap pemeriksaan cetakan (moulding) dan
                        verifikasi sampel warna secara ketat.
                    </p>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Dengan memadukan mesin pencetak modern dan tenaga pengrajin berpengalaman, kami mampu menghasilkan
                        lekukan timbul 3D yang tajam, kontur warna bersih tanpa bercak, serta konstruksi fisik yang awet.
                    </p>
                </div>

                <div class="space-y-4">
                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-600 block">Spesialisasi
                        Produk</span>
                    <ul class="space-y-3 text-sm text-slate-700">
                        <li class="flex items-start gap-3">
                            <span
                                class="w-6 h-6 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">1</span>
                            <div>
                                <strong class="text-slate-900">Rubber PVC Custom:</strong> Gantungan kunci karet 2D/3D
                                timbul, patch velcro taktis seragam, gelang karet/wristband, dan coaster tatakan gelas.
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span
                                class="w-6 h-6 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">2</span>
                            <div>
                                <strong class="text-slate-900">Medali Kejuaraan & Wisuda:</strong> Medali cor die-cast zinc
                                alloy (emas, perak, perunggu antik), medali kuningan etsa, dan medali akrilik cetak UV.
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span
                                class="w-6 h-6 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xs shrink-0 mt-0.5">3</span>
                            <div>
                                <strong class="text-slate-900">Gantungan Kunci Aneka Bahan:</strong> Pilihan akrilik
                                laser-cut bening/warna, pelat logam grafir nama, dan kombinasi kulit sintetis.
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Alur Pemesanan Offline / WhatsApp (PRD Section 28) -->
            <div class="bg-white rounded-3xl border border-slate-200 p-8 sm:p-12 shadow-xs">
                <div class="text-center max-w-2xl mx-auto mb-10">
                    <span class="text-xs font-bold uppercase tracking-wider text-emerald-600 block mb-1">Alur Kerja</span>
                    <h2 class="text-2xl font-extrabold text-slate-900">Bagaimana Cara Pemesanan Custom?</h2>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Tanpa proses checkout rumit, cukup komunikasi langsung
                        melalui WhatsApp.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-slate-50 rounded-2xl border border-slate-200/80 p-5 text-center space-y-2">
                        <span
                            class="w-8 h-8 rounded-full bg-slate-900 text-white font-bold text-xs flex items-center justify-center mx-auto">1</span>
                        <h3 class="font-bold text-slate-900 text-sm">Pilih & Kirim Desain</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">Kirim file logo (Corel/AI/PDF/gambar) atau foto
                            contoh produk yang Anda inginkan.</p>
                    </div>
                    <div class="bg-slate-50 rounded-2xl border border-slate-200/80 p-5 text-center space-y-2">
                        <span
                            class="w-8 h-8 rounded-full bg-slate-900 text-white font-bold text-xs flex items-center justify-center mx-auto">2</span>
                        <h3 class="font-bold text-slate-900 text-sm">Konsultasi & Estimasi</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">Kami menghitung estimasi biaya terbaik dan
                            estimasi waktu produksi sesuai jumlah pesanan.</p>
                    </div>
                    <div class="bg-slate-50 rounded-2xl border border-slate-200/80 p-5 text-center space-y-2">
                        <span
                            class="w-8 h-8 rounded-full bg-slate-900 text-white font-bold text-xs flex items-center justify-center mx-auto">3</span>
                        <h3 class="font-bold text-slate-900 text-sm">Sampel & Produksi</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">Pembuatan matras cetakan, verifikasi sampel fisik
                            awal, lalu produksi massal.</p>
                    </div>
                    <div class="bg-slate-50 rounded-2xl border border-slate-200/80 p-5 text-center space-y-2">
                        <span
                            class="w-8 h-8 rounded-full bg-slate-900 text-white font-bold text-xs flex items-center justify-center mx-auto">4</span>
                        <h3 class="font-bold text-slate-900 text-sm">Quality Check & Kirim</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">Penyortiran kualitas per unit, packing aman, dan
                            pengiriman ekspedisi ke alamat Anda.</p>
                    </div>
                </div>

                <div class="mt-8 text-center">
                    <a href="{{ $aboutWaUrl }}" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md transition-colors">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                        </svg>
                        <span>Mulai Konsultasi Desain Sekarang</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection