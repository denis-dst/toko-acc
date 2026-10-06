@extends('layouts.admin')

@section('title', 'Pengaturan Website & Kontak')
@section('header_title', 'Pengaturan Informasi Bisnis & Kontak')

@section('content')
    <div class="max-w-4xl bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-xs">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <!-- Profil Umum Website -->
            <div class="space-y-4">
                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-100 pb-2">
                    1. Informasi Identitas Bisnis (PRD Section 20)
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="site_name"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Nama Usaha /
                            Website</label>
                        <input type="text" name="site_name" id="site_name"
                            value="{{ old('site_name', $settings['site_name'] ?? 'Toko Jaya Promosi Lestari') }}" required
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
                    </div>

                    <div>
                        <label for="tagline"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Tagline /
                            Slogan</label>
                        <input type="text" name="tagline" id="tagline"
                            value="{{ old('tagline', $settings['tagline'] ?? 'Spesialis Custom Rubber, Medali & Gantungan Kunci') }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">
                    </div>
                </div>

                <div>
                    <label for="description"
                        class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Deskripsi Profil
                        Usaha</label>
                    <textarea name="description" id="description" rows="3"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">{{ old('description', $settings['description'] ?? '') }}</textarea>
                </div>
            </div>

            <!-- Nomor Kontak & WhatsApp -->
            <div class="space-y-4">
                <h3
                    class="text-xs font-bold uppercase tracking-wider text-emerald-700 border-b border-slate-100 pb-2 flex items-center justify-between">
                    <span>2. Kontak & Nomor WhatsApp Utama (Conversion Engine)</span>
                    <span class="text-[10px] font-normal text-slate-500 normal-case">Nomor tujuan tombol pesan
                        WhatsApp</span>
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-emerald-50/60 p-3.5 rounded-xl border border-emerald-200">
                        <label for="whatsapp"
                            class="block text-xs font-bold uppercase tracking-wider text-emerald-900 mb-1">Nomor WhatsApp
                            Aktif *</label>
                        <input type="text" name="whatsapp" id="whatsapp"
                            value="{{ old('whatsapp', $settings['whatsapp'] ?? '6281234567890') }}" required
                            placeholder="Contoh: 6281234567890"
                            class="w-full px-3 py-2 rounded-lg border border-emerald-300 text-sm font-mono font-bold bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-hidden">
                        <span class="text-[10px] text-emerald-800 mt-1 block">Format: 62812... (tanpa tanda + atau
                            spasi)</span>
                    </div>

                    <div>
                        <label for="phone"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Telepon Teks /
                            Hotline</label>
                        <input type="text" name="phone" id="phone"
                            value="{{ old('phone', $settings['phone'] ?? '0812-3456-7890') }}"
                            placeholder="Contoh: 0812-3456-7890"
                            class="w-full px-3 py-2 rounded-lg border border-slate-300 text-sm">
                    </div>

                    <div>
                        <label for="email"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Email Resmi</label>
                        <input type="email" name="email" id="email"
                            value="{{ old('email', $settings['email'] ?? 'kontak@tokoacc.com') }}"
                            placeholder="kontak@tokoacc.com"
                            class="w-full px-3 py-2 rounded-lg border border-slate-300 text-sm">
                    </div>
                </div>

                <div>
                    <label for="address"
                        class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Alamat Lengkap
                        Workshop</label>
                    <textarea name="address" id="address" rows="2"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">{{ old('address', $settings['address'] ?? '') }}</textarea>
                </div>
            </div>

            <!-- Lokasi & Jam Operasional -->
            <div class="space-y-4">
                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-100 pb-2">
                    3. Jam Operasional & Google Maps (PRD Section 12)
                </h3>

                <div>
                    <label for="opening_hours"
                        class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Jam Operasional
                        Workshop</label>
                    <textarea name="opening_hours" id="opening_hours" rows="3"
                        placeholder="Senin - Jumat: 08.00 - 17.00 WIB&#10;Sabtu: 08.00 - 15.00 WIB&#10;Minggu: Tutup"
                        class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-sm focus:ring-2 focus:ring-slate-900 focus:outline-hidden">{{ old('opening_hours', $settings['opening_hours'] ?? '') }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="google_maps_url"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Link Google Maps
                            (Buka Aplikasi)</label>
                        <input type="text" name="google_maps_url" id="google_maps_url"
                            value="{{ old('google_maps_url', $settings['google_maps_url'] ?? '') }}"
                            placeholder="https://maps.google.com/?q=..."
                            class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs">
                    </div>

                    <div>
                        <label for="google_maps_embed"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">Google Maps Embed
                            URL (Iframe)</label>
                        <input type="text" name="google_maps_embed" id="google_maps_embed"
                            value="{{ old('google_maps_embed', $settings['google_maps_embed'] ?? '') }}"
                            placeholder="https://www.google.com/maps/embed?pb=..."
                            class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs">
                    </div>
                </div>
            </div>

            <!-- Media Sosial -->
            <div class="space-y-4">
                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-100 pb-2">
                    4. Akun Media Sosial
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label for="instagram"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Instagram
                            URL</label>
                        <input type="text" name="instagram" id="instagram"
                            value="{{ old('instagram', $settings['instagram'] ?? '') }}"
                            placeholder="https://instagram.com/..."
                            class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs">
                    </div>
                    <div>
                        <label for="facebook"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Facebook
                            URL</label>
                        <input type="text" name="facebook" id="facebook"
                            value="{{ old('facebook', $settings['facebook'] ?? '') }}"
                            placeholder="https://facebook.com/..."
                            class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs">
                    </div>
                    <div>
                        <label for="tiktok"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">TikTok URL</label>
                        <input type="text" name="tiktok" id="tiktok" value="{{ old('tiktok', $settings['tiktok'] ?? '') }}"
                            placeholder="https://tiktok.com/@..."
                            class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs">
                    </div>
                </div>
            </div>

            <!-- Pengaturan SEO, Google Search Console & Analytics -->
            <div class="space-y-4">
                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 border-b border-slate-100 pb-2">
                    5. Optimasi SEO, Google Search Console & Analytics
                </h3>

                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="meta_keywords"
                            class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Target Keyword SEO</label>
                        <input type="text" name="meta_keywords" id="meta_keywords"
                            value="{{ old('meta_keywords', $settings['meta_keywords'] ?? 'aksesorisku.store, aksesorisku, jaya promosi lestari, aksesoris karet, print rubber, cetak medali, gantungan kunci karet, rubber patch velcro, medali kejuaraan custom') }}"
                            placeholder="aksesorisku.store, aksesorisku, jaya promosi lestari, aksesoris karet, print rubber, cetak medali..."
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="meta_google_verification"
                                class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Google Site Verification (Search Console)</label>
                            <input type="text" name="meta_google_verification" id="meta_google_verification"
                                value="{{ old('meta_google_verification', $settings['meta_google_verification'] ?? '') }}"
                                placeholder="google-site-verification=XXXXXXXXXXXXXXXXXXXX"
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs font-mono">
                            <span class="text-[11px] text-slate-400 mt-1 block">Kode verifikasi kepemilikan Search Console.</span>
                        </div>

                        <div>
                            <label for="google_analytics_id"
                                class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Google Analytics Measurement ID (GA4)</label>
                            <input type="text" name="google_analytics_id" id="google_analytics_id"
                                value="{{ old('google_analytics_id', $settings['google_analytics_id'] ?? 'G-QWNZWEXQ7P') }}"
                                placeholder="Contoh: G-QWNZWEXQ7P"
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-300 text-xs font-mono">
                            <span class="text-[11px] text-slate-400 mt-1 block">Google Tag / GA4 ID untuk pelacakan trafik pengunjung.</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-slate-100 flex items-center justify-end">
                <button type="submit"
                    class="px-6 py-3 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-extrabold text-xs shadow-md transition-colors">
                    Simpan Semua Pengaturan
                </button>
            </div>
        </form>
    </div>
@endsection