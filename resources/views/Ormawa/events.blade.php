<x-layouts.app-admin :title="'Berita Event'" :role="'ormawa'" :activePage="'events'" :portalName="'E-SKKM'" :portalSub="'Ormawa Portal'" :sidebarIcon="'groups'">

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-on-surface font-headline">Berita Event</h2>
            <p class="text-sm text-on-surface-variant mt-1">Kelola event dan publikasikan untuk mahasiswa.</p>
        </div>
        <a href="{{ route('ormawa.events.create') }}"
            class="inline-flex items-center gap-2 px-5 py-2.5 bg-primary text-on-primary rounded-xl font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all">
            <span class="material-symbols-outlined text-lg">add</span>
            Buat Event Baru
        </a>
    </div>

    {{-- Events Grid --}}
    @if($events->isEmpty())
    <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 p-12 text-center">
        <span class="material-symbols-outlined text-5xl text-outline/20 mb-3 block">event_busy</span>
        <p class="font-bold text-on-surface-variant">Belum ada event.</p>
        <p class="text-sm text-outline mt-1">Buat event baru untuk mempublikasikan kegiatan Anda.</p>
    </div>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
        @foreach($events as $event)
        <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 overflow-hidden hover:shadow-md transition-shadow">
            <div class="p-5 sm:p-6">
                <div class="flex items-start justify-between gap-3">
                    <div class="flex-1 min-w-0">
                        <h3 class="text-lg font-bold text-on-surface font-headline truncate">{{ $event->judul_event }}</h3>
                        <p class="text-xs text-on-surface-variant mt-1">{{ $event->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-' }} • {{ $event->subKegiatan?->nama_sub ?? '-' }}</p>
                    </div>
                    <span class="px-2.5 py-1 text-[10px] font-bold uppercase rounded-full shrink-0
                        {{ $event->status_event === 'akan_datang' ? 'bg-blue-100 text-blue-700' : ($event->status_event === 'berlangsung' ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-600') }}">
                        {{ str_replace('_', ' ', $event->status_event) }}
                    </span>
                </div>
                @if($event->deskripsi)
                <p class="text-sm text-on-surface-variant mt-3 line-clamp-2">{{ $event->deskripsi }}</p>
                @endif
                <div class="flex items-center gap-4 mt-4 text-xs text-on-surface-variant">
                    <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">calendar_today</span> {{ $event->tanggal_mulai->format('d M Y') }} — {{ $event->tanggal_selesai->format('d M Y') }}</span>
                    <span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">group</span> {{ $event->peserta_events_count }} peserta</span>
                </div>
                @if($event->link_form)
                <a href="{{ $event->link_form }}" target="_blank" class="inline-flex items-center gap-1 text-xs text-primary font-semibold mt-3 hover:underline">
                    <span class="material-symbols-outlined text-sm">link</span> Link Pendaftaran
                </a>
                @endif
            </div>
            <div class="px-5 sm:px-6 py-3 bg-surface-container-low/50 border-t border-outline-variant/10 flex items-center justify-between">
                <a href="{{ route('ormawa.peserta', $event) }}" class="text-xs text-primary font-bold hover:underline flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">upload_file</span> Upload Peserta (CSV)
                </a>
                <form action="{{ route('ormawa.events.delete', $event) }}" method="POST" onsubmit="return confirm('Hapus event ini?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-xs text-error font-semibold hover:underline flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">delete</span> Hapus
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-4">{{ $events->links() }}</div>
    @endif

</x-layouts.app-admin>
