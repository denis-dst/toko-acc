@extends('layouts.app')

@section('title', 'Ulasan & Testimoni Pelanggan | ' . ($siteSettings['site_name'] ?? 'Toko ACC'))

@section('meta_description', 'Ulasan pengalaman nyata pemesan produk custom rubber, medali dan gantungan kunci di workshop Toko ACC.')

@section('content')
<div class="bg-slate-50 min-h-screen py-12 sm:py-16 border-b border-slate-200">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto">
            <span class="text-xs font-bold uppercase tracking-wider text-emerald-600 block mb-1">Kepuasan Pemesan</span>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight">
                Testimoni & Ulasan Pelanggan
            </h1>
            <p class="text-base text-slate-600 mt-3 leading-relaxed">
                Reputasi pengerjaan kami dibangun melalui ketepatan hasil fisik produk dan komunikasi yang transparan bersama seluruh pelanggan.
            </p>
        </div>

        @if($testimonials->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($testimonials as $testi)
                    <div class="bg-white rounded-2xl border border-slate-200 p-7 shadow-xs flex flex-col justify-between">
                        <div>
                            <div class="flex items-center space-x-1 text-amber-500 mb-4" aria-label="Rating {{ $testi->rating }} dari 5">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= $testi->rating ? 'fill-current' : 'text-slate-200' }}" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>

                            <p class="text-sm text-slate-700 leading-relaxed italic">
                                "{{ $testi->content }}"
                            </p>
                        </div>

                        <div class="mt-6 pt-4 border-t border-slate-100 flex items-center gap-3">
                            @if($testi->photo)
                                <img src="{{ $testi->photo_url }}" alt="{{ $testi->name }}" class="w-10 h-10 rounded-full object-cover">
                            @else
                                <div class="w-10 h-10 rounded-full bg-slate-900 text-white font-bold flex items-center justify-center text-sm shrink-0">
                                    {{ substr($testi->name, 0, 1) }}
                                </div>
                            @endif
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

            <div class="mt-8">
                {{ $testimonials->links() }}
            </div>
        @else
            <!-- Empty state -->
            <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center max-w-lg mx-auto">
                <p class="text-sm text-slate-500">Belum ada testimoni yang dipublikasikan.</p>
            </div>
        @endif

    </div>
</div>
@endsection
