@extends('layouts.admin')

@section('title', 'Portofolio Pengerjaan')
@section('header_title', 'Kelola Portofolio Pekerjaan')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-900">Daftar Portofolio</h2>
            <p class="text-xs text-slate-500">Hasil produksi yang telah selesai sebagai bukti kualitas pengerjaan</p>
        </div>
        <a href="{{ route('admin.portfolios.create') }}" class="px-4 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs transition-colors shadow-xs self-start sm:self-auto">
            + Tambah Portofolio
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 border-b border-slate-200 text-xs font-bold uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="py-3.5 px-4 w-16">Cover</th>
                        <th class="py-3.5 px-4">Judul Proyek</th>
                        <th class="py-3.5 px-4">Kategori</th>
                        <th class="py-3.5 px-4">Klien / Pemesan</th>
                        <th class="py-3.5 px-4">Tahun</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($portfolios as $port)
                        <tr class="hover:bg-slate-50/60 transition-colors">
                            <td class="py-3 px-4">
                                <div class="w-12 h-12 rounded-lg bg-slate-100 overflow-hidden border border-slate-200">
                                    <img src="{{ $port->cover_url ?: asset('images/portfolio/medali-kejuaraan.jpg') }}" alt="{{ $port->title }}" class="w-full h-full object-cover">
                                </div>
                            </td>
                            <td class="py-3 px-4">
                                <span class="font-bold text-slate-900 block">{{ $port->title }}</span>
                                <span class="font-mono text-[11px] text-slate-400">/portofolio/{{ $port->slug }}</span>
                            </td>
                            <td class="py-3 px-4 text-xs text-slate-600">
                                {{ $port->category ?: '-' }}
                            </td>
                            <td class="py-3 px-4 text-xs text-slate-600">
                                {{ $port->client_name ?: '-' }}
                            </td>
                            <td class="py-3 px-4 text-xs font-mono text-slate-600">
                                {{ $port->project_year ?: '-' }}
                            </td>
                            <td class="py-3 px-4">
                                @if($port->status)
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">Aktif</span>
                                @else
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-600">Draft</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a href="{{ route('portfolios.show', $port->slug) }}" target="_blank" class="px-2.5 py-1.5 rounded-lg bg-slate-50 hover:bg-slate-100 text-slate-600 text-xs font-bold transition-colors">
                                    Lihat
                                </a>
                                <a href="{{ route('admin.portfolios.edit', $port->id) }}" class="px-2.5 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition-colors">
                                    Edit
                                </a>
                                <form action="{{ route('admin.portfolios.destroy', $port->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus portofolio ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2.5 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-700 text-xs font-bold transition-colors">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-xs text-slate-400">
                                Belum ada data portofolio.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $portfolios->links() }}
        </div>
    </div>
</div>
@endsection
