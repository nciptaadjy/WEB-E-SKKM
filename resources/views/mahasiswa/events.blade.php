<x-layouts.app-mahasiswa :title="'Berita Event'" :activePage="'events'">

    {{-- Page Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-on-surface font-headline">Berita Event</h2>
            <p class="text-sm text-on-surface-variant mt-1">Informasi kegiatan & event kampus terbaru.</p>
        </div>
    </div>

    {{-- Event Cards Grid --}}
    @if($events->isEmpty())
    <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant/10 shadow-sm p-12 text-center">
        <span class="material-symbols-outlined text-5xl text-outline/20 block mb-3">campaign</span>
        <p class="font-bold text-on-surface font-headline">Belum Ada Event</p>
        <p class="text-sm text-on-surface-variant mt-2">Event kampus akan ditampilkan di sini.</p>
    </div>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
        @foreach($events as $event)
        <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant/10 shadow-sm overflow-hidden hover:shadow-lg transition-all group cursor-pointer"
             onclick="openEventDetail({{ json_encode([
                 'judul' => $event->judul_event,
                 'deskripsi' => $event->deskripsi ?? 'Tidak ada deskripsi.',
                 'tanggal_mulai' => $event->tanggal_mulai ? \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') : '-',
                 'tanggal_selesai' => $event->tanggal_selesai ? \Carbon\Carbon::parse($event->tanggal_selesai)->format('d M Y') : '-',
                 'bidang' => $event->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-',
                 'sub' => $event->subKegiatan?->nama_sub ?? '-',
                 'status' => $event->status_event,
                 'link_form' => $event->link_form,
             ]) }})">
            {{-- Status Badge --}}
            <div class="px-5 pt-5 flex items-center justify-between">
                @if($event->status_event === 'berlangsung')
                <span class="px-3 py-1 bg-secondary-container text-on-secondary-container text-[10px] font-bold rounded-full uppercase flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-secondary animate-pulse"></span> Berlangsung
                </span>
                @elseif($event->status_event === 'akan_datang')
                <span class="px-3 py-1 bg-primary-fixed text-primary text-[10px] font-bold rounded-full uppercase">Akan Datang</span>
                @else
                <span class="px-3 py-1 bg-surface-container-high text-on-surface-variant text-[10px] font-bold rounded-full uppercase">Selesai</span>
                @endif
                <span class="material-symbols-outlined text-outline/30 group-hover:text-primary transition-colors">open_in_new</span>
            </div>

            {{-- Content --}}
            <div class="p-5 space-y-3">
                <h3 class="text-base font-bold text-on-surface font-headline line-clamp-2 group-hover:text-primary transition-colors">{{ $event->judul_event }}</h3>
                <p class="text-xs text-on-surface-variant line-clamp-2">{{ Str::limit($event->deskripsi ?? 'Tidak ada deskripsi.', 100) }}</p>

                <div class="flex items-center gap-2 text-xs text-outline">
                    <span class="material-symbols-outlined text-[14px]">calendar_month</span>
                    {{ $event->tanggal_mulai ? \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') : '-' }}
                </div>

                <div class="flex items-center gap-2">
                    <span class="px-2 py-0.5 bg-surface-container text-on-surface-variant text-[10px] font-semibold rounded">
                        {{ $event->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-' }}
                    </span>
                </div>

                @if($event->link_form)
                <a href="{{ $event->link_form }}" target="_blank" onclick="event.stopPropagation()"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-primary text-on-primary rounded-xl text-xs font-bold hover:opacity-90 transition-all shadow-sm w-full justify-center">
                    <span class="material-symbols-outlined text-sm">edit_note</span> Daftar Sekarang
                </a>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    @if($events->hasPages())
    <div class="mt-6">
        {{ $events->links() }}
    </div>
    @endif
    @endif

    {{-- Event Detail Modal --}}
    <div id="modal-event-detail"
        class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm"
        onclick="if(event.target===this)closeModal('modal-event-detail')">
        <div class="modal-box bg-white w-full sm:max-w-lg rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10 max-h-[90vh] flex flex-col">
            {{-- Header --}}
            <div class="flex items-center justify-between px-5 sm:px-6 py-4 border-b border-outline-variant/10 shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-primary/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-xl">campaign</span>
                    </div>
                    <h3 class="text-base font-extrabold text-on-surface font-headline">Detail Event</h3>
                </div>
                <button onclick="closeModal('modal-event-detail')"
                    class="w-8 h-8 rounded-full hover:bg-surface-container flex items-center justify-center transition-colors">
                    <span class="material-symbols-outlined text-on-surface-variant text-xl">close</span>
                </button>
            </div>
            {{-- Body --}}
            <div class="overflow-y-auto flex-1 p-5 sm:p-6 space-y-5">
                <div>
                    <h4 class="text-lg font-bold text-on-surface font-headline" id="ed-judul">-</h4>
                    <div id="ed-status-wrap" class="mt-2"></div>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Deskripsi</p>
                    <p class="text-sm text-on-surface leading-relaxed" id="ed-deskripsi">-</p>
                </div>
                <div class="grid grid-cols-2 gap-2.5">
                    <div class="p-3 bg-surface-container-low rounded-xl">
                        <p class="text-[10px] text-on-surface-variant mb-0.5">Tanggal Mulai</p>
                        <p class="text-sm font-semibold text-on-surface" id="ed-mulai">-</p>
                    </div>
                    <div class="p-3 bg-surface-container-low rounded-xl">
                        <p class="text-[10px] text-on-surface-variant mb-0.5">Tanggal Selesai</p>
                        <p class="text-sm font-semibold text-on-surface" id="ed-selesai">-</p>
                    </div>
                    <div class="p-3 bg-surface-container-low rounded-xl">
                        <p class="text-[10px] text-on-surface-variant mb-0.5">Bidang</p>
                        <p class="text-sm font-semibold text-on-surface" id="ed-bidang">-</p>
                    </div>
                    <div class="p-3 bg-surface-container-low rounded-xl">
                        <p class="text-[10px] text-on-surface-variant mb-0.5">Sub Kegiatan</p>
                        <p class="text-sm font-semibold text-on-surface" id="ed-sub">-</p>
                    </div>
                </div>
            </div>
            {{-- Footer --}}
            <div class="p-4 border-t border-outline-variant/10 bg-surface-container-low flex gap-3 shrink-0">
                <button onclick="closeModal('modal-event-detail')"
                    class="flex-1 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">Tutup</button>
                <a id="ed-link" href="#" target="_blank"
                    class="hidden flex-1 py-2.5 rounded-xl bg-primary text-on-primary font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all text-center flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-base">edit_note</span> Daftar
                </a>
            </div>
        </div>
    </div>

@push('scripts')
<script>
    function openEventDetail(data) {
        document.getElementById('ed-judul').textContent = data.judul || '-';
        document.getElementById('ed-deskripsi').textContent = data.deskripsi || '-';
        document.getElementById('ed-mulai').textContent = data.tanggal_mulai || '-';
        document.getElementById('ed-selesai').textContent = data.tanggal_selesai || '-';
        document.getElementById('ed-bidang').textContent = data.bidang || '-';
        document.getElementById('ed-sub').textContent = data.sub || '-';

        const statusMap = {
            'berlangsung': '<span class="px-3 py-1 bg-secondary-container text-on-secondary-container text-xs font-bold rounded-full uppercase">Berlangsung</span>',
            'akan_datang': '<span class="px-3 py-1 bg-primary-fixed text-primary text-xs font-bold rounded-full uppercase">Akan Datang</span>',
            'selesai': '<span class="px-3 py-1 bg-surface-container-high text-on-surface-variant text-xs font-bold rounded-full uppercase">Selesai</span>',
        };
        document.getElementById('ed-status-wrap').innerHTML = statusMap[data.status] || '';

        const linkBtn = document.getElementById('ed-link');
        if (data.link_form) {
            linkBtn.href = data.link_form;
            linkBtn.classList.remove('hidden');
        } else {
            linkBtn.classList.add('hidden');
        }

        openModal('modal-event-detail');
    }
</script>
@endpush

</x-layouts.app-mahasiswa>
