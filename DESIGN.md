# DESIGN DIRECTION — TOKO ACC (DIGITAL SHOWROOM & E-KATALOG)

## 1. Identity & Purpose
- **Brand Purpose:** Digital showroom dan etalase resmi untuk produsen custom merchandise spesialis: Rubber (karet custom), Medali (logam/akrilik kejuaraan & event), dan Gantungan Kunci custom.
- **Model Interaksi:** Showcase & Konsultasi. Konversi utama melalui WhatsApp Direct Consultation ("Tanya Harga & Diskusi Desain").
- **Target Audiens:** Individu (komunitas, suvenir), Organisasi/Sekolah/Event Organizer, dan Perusahaan (merchandise B2B).

## 2. Personality & Mood
- **Karakter:** Industrial precision, profesional, transparan, rapi, dan berorientasi pada kualitas pengerjaan fisik produk.
- **Bukan:** Marketplace bising, e-commerce diskon massal, atau template AI generik dengan efek glow berlebihan.

## 3. Palet Warna (Color System)
- **Background Utama:** `#F8FAFC` (Slate 50) untuk kesan clean dan luas.
- **Surface / Card Background:** `#FFFFFF` (Pure White) dengan border halus `#E2E8F0` (Slate 200).
- **Teks Utama:** `#0F172A` (Slate 900) dengan kontras tinggi (memenuhi standar WCAG AA > 4.5:1).
- **Teks Pendukung:** `#475569` (Slate 600) untuk deskripsi dan spesifikasi material.
- **Brand Tone (Industrial Slate):** `#1E293B` (Slate 800) untuk navbar, heading aksen, dan footer.
- **Conversion Engine (WhatsApp Accent):** `#16A34A` / `#22C55E` (WhatsApp Emerald/Green) dengan teks putih kontras tinggi untuk tombol CTA utama.
- **Highlight Material:** `#D97706` (Amber 600) untuk label jenis material dan spesifikasi custom.

## 4. Tipografi
- **Family:** Inter / Plus Jakarta Sans / System UI Sans.
- **Skala:**
  - H1: 2rem (32px) di mobile, 2.75rem (44px) di desktop.
  - H2: 1.5rem (24px) di mobile, 2rem (32px) di desktop.
  - H3: 1.25rem (20px).
  - Body: 1rem (16px) dengan line-height 1.6 untuk kemudahan membaca.
  - Meta/Specs: 0.875rem (14px) medium weight.

## 5. Dials
- **ENERGY:** 2 (Fokus pada visual foto produk nyata, layout rapi, tidak ada elemen dekoratif yang mengganggu).
- **RHYTHM:** 2 (Variasi komposisi antar-seksi: grid kategori, katalog produk dengan filter interaktif, galeri portofolio, dan detail spesifikasi workshop).
- **MOTION:** 2 (Transisi lembut 150-200ms pada tombol dan card hover, transisi accordion FAQ/mobile menu).

## 6. Aturan Anti-Slop (Hard Gates & Standards)
- **Tanpa Em Dash (`—`):** Gunakan tanda koma, titik dua, tanda kurung, atau titik.
- **Tanpa Klaim Palsu:** Tidak menampilkan angka statistik rekayasa (seperti "10k+ klien puas"). Testimoni dan portofolio hanya mengambil data nyata dari database admin.
- **Responsif Penuh:** Target sentuh tombol minimal 44px, tidak ada horizontal scroll pada mobile, navigasi nyaman satu tangan.
- **Semua Elemen Berfungsi:** Tidak ada tombol dummy atau tautan mati. Tombol WhatsApp menyertakan format pesan otomatis yang kontekstual dengan nama produk.
- **States Lengkap:** Tampilan kosong (empty state), loading, dan error tertangani dengan pesan informatif.
