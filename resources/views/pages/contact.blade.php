@extends('layouts.app')

@section('title', 'Kontak & Konsultasi Langsung | ' . ($siteSettings['site_name'] ?? 'Toko Jaya Promosi Lestari'))

@section('meta_description', 'Hubungi kami melalui WhatsApp, telepon atau kunjungi workshop langsung untuk konsultasi pesanan custom.')

@section('content')

    @php
        $rawPhone = $siteSettings['whatsapp'] ?? '6281234567890';
        $cleanPhone = preg_replace('/[^0-9]/', '', $rawPhone);
        if (str_starts_with($cleanPhone, '0')) {
            $cleanPhone = '62' . substr($cleanPhone, 1);
        }
        $mainWaUrl = 'https://wa.me/' . $cleanPhone . '?text=' . rawurlencode("Halo Toko Jaya Promosi Lestari, saya ingin konsultasi mengenai pembuatan merchandise custom.");
    @endphp

    <div class="bg-slate-50 min-h-screen py-12 sm:py-16 border-b border-slate-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto">
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-600 block mb-1">Hubungi Kami</span>
                <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight">
                    Konsultasikan Kebutuhan Custom Anda
                </h1>
                <p class="text-base text-slate-600 mt-3 leading-relaxed">
                    Kami siap membantu mulai dari perhitungan estimasi harga, rekomendasi material, hingga pengecekan
                    kesiapan file desain Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">

                <!-- Left: Direct Channels & Workshop Address -->
                <div class="lg:col-span-5 space-y-6">
                    <!-- WhatsApp Card -->
                    <div class="bg-emerald-600 text-white rounded-3xl p-8 shadow-lg space-y-4">
                        <div class="w-12 h-12 rounded-2xl bg-white/20 flex items-center justify-center">
                            <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24">
                                <path
                                    d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-black">Saluran Utama WhatsApp</h2>
                        <p class="text-xs sm:text-sm text-emerald-100 leading-relaxed">
                            Kirim file desain atau konsultasikan langsung dengan customer support teknis workshop kami.
                        </p>
                        <div class="pt-2">
                            <a href="{{ $mainWaUrl }}" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-white text-emerald-800 hover:bg-emerald-50 font-extrabold text-sm shadow-md transition-colors">
                                <span>Chat WhatsApp Sekarang</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </div>

                    <!-- Contact Details Card -->
                    <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-xs space-y-6 text-sm">
                        <div class="flex items-start gap-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold text-slate-400">Telepon / WhatsApp</span>
                                <span
                                    class="font-bold text-slate-900">{{ $siteSettings['phone'] ?? '0812-3456-7890' }}</span>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold text-slate-400">Email Resmi</span>
                                <span class="font-bold text-slate-900">{{ $siteSettings['email'] ?? 'kontak@tokoacc.com'
                                    }}</span>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div
                                class="w-8 h-8 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold text-slate-400">Alamat Tempat Produksi</span>
                                <span
                                    class="font-medium text-slate-900 leading-relaxed">{{ $siteSettings['address'] ?? 'Jl. Industri Kreatif No. 88, Sentra Workshop & Produksi' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Interactive Consultation Form (Drafts WhatsApp text) -->
                <div class="lg:col-span-7 bg-white rounded-3xl border border-slate-200 p-8 sm:p-10 shadow-xs space-y-6">
                    <div>
                        <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">
                            Formulir Permintaan Estimasi Cepat
                        </h2>
                        <p class="text-xs sm:text-sm text-slate-500 mt-1">
                            Isi form singkat ini untuk menyusun draft pesan WhatsApp yang langsung rapi dan siap kirim ke
                            customer service kami.
                        </p>
                    </div>

                    <form id="quickInquiryForm" class="space-y-4">
                        <div>
                            <label for="userName"
                                class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Nama Anda /
                                Organisasi</label>
                            <input type="text" id="userName" required
                                placeholder="Contoh: Budi Santoso / Panitia Futsal Cup"
                                class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="productCategory"
                                    class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Jenis
                                    Produk</label>
                                <select id="productCategory"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm bg-white focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
                                    <option value="Rubber PVC / Gantungan Kunci Karet">Rubber PVC (Gantungan Kunci / Patch)
                                    </option>
                                    <option value="Medali Kejuaraan Logam Cor">Medali Kejuaraan Logam Cor</option>
                                    <option value="Gantungan Kunci Akrilik / Logam">Gantungan Kunci Akrilik / Logam</option>
                                    <option value="Lainnya">Produk Merchandise Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label for="quantity"
                                    class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Estimasi
                                    Jumlah (Pcs)</label>
                                <input type="text" id="quantity" placeholder="Contoh: 100 pcs"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
                            </div>
                        </div>

                        <div>
                            <label for="notes"
                                class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">Catatan
                                Spesifikasi / Desain</label>
                            <textarea id="notes" rows="3"
                                placeholder="Sebutkan ukuran, model 2D atau 3D, atau batas waktu tanggal acara jika ada..."
                                class="w-full px-4 py-3 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden"></textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit"
                                class="w-full flex items-center justify-center gap-2.5 px-6 py-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-base shadow-sm transition-colors">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                </svg>
                                <span>Kirim ke WhatsApp Toko Jaya Promosi Lestari</span>
                            </button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            document.getElementById('quickInquiryForm').addEventListener('submit', function (e) {
                e.preventDefault();
                const name = document.getElementById('userName').value.trim();
                const category = document.getElementById('productCategory').value;
                const qty = document.getElementById('quantity').value.trim() || 'Sesuai rekomendasi';
                const notes = document.getElementById('notes').value.trim() || 'Tidak ada catatan tambahan';
                const phone = '{{ $cleanPhone }}';

                const message = `Halo Toko Jaya Promosi Lestari,\n\nNama / Organisasi: *${name}*\nJenis Produk: *${category}*\nPerkiraan Jumlah: *${qty}*\nCatatan: ${notes}\n\nSaya ingin menanyakan estimasi biaya dan durasi pengerjaannya. Terima kasih.`;

                const waUrl = `https://wa.me/${phone}?text=${encodeURIComponent(message)}`;
                window.open(waUrl, '_blank');
            });
        </script>
    @endpush
@endsection