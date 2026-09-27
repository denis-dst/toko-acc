@extends('layouts.admin')

@section('title', 'Testimoni Pelanggan')
@section('header_title', 'Kelola Testimoni & Ulasan')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-slate-900">Daftar Testimoni</h2>
            <p class="text-xs text-slate-500">Ulasan nyata dari pelanggan untuk meningkatkan kepercayaan (trust)</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="px-4 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs transition-colors shadow-xs">
            + Tambah Testimoni
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 border-b border-slate-200 text-xs font-bold uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="py-3.5 px-4">Nama Pelanggan</th>
                        <th class="py-3.5 px-4">Organisasi / Instansi</th>
                        <th class="py-3.5 px-4">Rating</th>
                        <th class="py-3.5 px-4">Isi Testimoni</th>
                        <th class="py-3.5 px-4">Status</th>
                        <th class="py-3.5 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($testimonials as $testi)
                        <tr class="hover:bg-slate-50/60 transition-colors">
                            <td class="py-3 px-4 font-bold text-slate-900">
                                {{ $testi->name }}
                            </td>
                            <td class="py-3 px-4 text-xs text-slate-600">
                                {{ $testi->organization ?: '-' }}
                            </td>
                            <td class="py-3 px-4 text-amber-500 font-bold text-xs">
                                ★ {{ $testi->rating }}/5
                            </td>
                            <td class="py-3 px-4 text-xs text-slate-600 line-clamp-2 max-w-md">
                                "{{ $testi->content }}"
                            </td>
                            <td class="py-3 px-4">
                                @if($testi->status)
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">Tampil</span>
                                @else
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-600">Draft</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right space-x-2">
                                <a href="{{ route('admin.testimonials.edit', $testi->id) }}" class="px-2.5 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition-colors">
                                    Edit
                                </a>
                                <form action="{{ route('admin.testimonials.destroy', $testi->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus testimoni ini?')">
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
                            <td colspan="6" class="py-8 text-center text-xs text-slate-400">
                                Belum ada data testimoni.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $testimonials->links() }}
        </div>
    </div>
</div>
@endsection
