<x-layouts.app-mahasiswa :title="'Dashboard'" :activePage="'dashboard'">

    {{-- Welcome --}}
    <header class="flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-on-surface font-headline">Selamat datang, {{ $mahasiswa->nama }}!</h1>
            <p class="text-on-surface-variant mt-1">Berikut adalah ringkasan capaian SKKM Anda.</p>
        </div>
        <a href="{{ route('sertifikat.create') }}"
            class="px-5 py-2.5 bg-primary text-white font-semibold rounded-lg flex items-center gap-2 hover:opacity-90 transition-all shadow-lg shadow-primary/20 self-start md:self-auto">
            <span class="material-symbols-outlined text-sm">add</span>
            Upload Sertifikat
        </a>
    </header>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
        <div class="col-span-2 lg:col-span-1 bg-primary-container p-5 md:p-6 rounded-xl text-on-primary-container flex flex-col justify-between h-36 md:h-40 shadow-sm">
            <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">stars</span>
            <div>
                <p class="text-sm font-medium opacity-80">Total Poin SKKM</p>
                <p class="text-3xl md:text-4xl font-bold">{{ $totalPoin }}</p>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-xl flex flex-col justify-between h-36 md:h-40 shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
            <div class="flex justify-between items-start">
                <span class="material-symbols-outlined text-2xl md:text-3xl text-primary">pending_actions</span>
                <span class="text-xs font-semibold px-2 py-1 bg-surface-container text-on-surface-variant rounded-full">Proses</span>
            </div>
            <div>
                <p class="text-xs md:text-sm font-medium text-on-surface-variant">Verifikasi Tertunda</p>
                <p class="text-2xl md:text-3xl font-bold">{{ $totalPending }}</p>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-xl flex flex-col justify-between h-36 md:h-40 shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
            <span class="material-symbols-outlined text-2xl md:text-3xl text-secondary">verified</span>
            <div>
                <p class="text-xs md:text-sm font-medium text-on-surface-variant">Aktivitas Disetujui</p>
                <p class="text-2xl md:text-3xl font-bold">{{ $totalApproved }}</p>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-xl flex flex-col justify-between h-36 md:h-40 shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
            <div class="flex justify-between items-start">
                <span class="material-symbols-outlined text-2xl md:text-3xl text-tertiary">cancel</span>
                @if($totalRejected > 0)
                <span class="text-xs font-semibold px-2 py-1 bg-error-container/30 text-on-error-container rounded-full">Revisi</span>
                @endif
            </div>
            <div>
                <p class="text-xs md:text-sm font-medium text-on-surface-variant">Aktivitas Ditolak</p>
                <p class="text-2xl md:text-3xl font-bold">{{ $totalRejected }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 md:gap-8">
        {{-- Progress Per Bidang --}}
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-surface-container-lowest p-5 md:p-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                <h3 class="text-lg font-bold mb-6 text-on-surface font-headline">Progres Per Bidang</h3>
                <div class="space-y-6">
                    @foreach($progressPerBidang as $bidang)
                    @php
                        $target = $bidang['is_wajib'] ? 50 : 30;
                        $persen = $target > 0 ? min(100, round(($bidang['poin'] / $target) * 100)) : 0;
                    @endphp
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-semibold text-on-surface">{{ $bidang['nama'] }}</span>
                            <span class="text-sm font-bold {{ $bidang['poin'] >= $target ? 'text-secondary' : 'text-primary' }}">{{ $bidang['poin'] }}/{{ $target }}</span>
                        </div>
                        <div class="h-3 bg-surface-container-highest rounded-full overflow-hidden">
                            <div class="h-full rounded-full transition-all duration-500 {{ $bidang['poin'] >= $target ? 'bg-gradient-to-r from-secondary to-secondary-container' : 'bg-gradient-to-r from-primary to-primary-container' }}"
                                style="width: {{ $persen }}%"></div>
                        </div>
                        @if($bidang['poin'] >= $target)
                        <p class="text-[11px] text-secondary mt-1 font-medium">✓ Target tercapai!</p>
                        @elseif($bidang['poin'] > 0)
                        <p class="text-[11px] text-on-surface-variant mt-1 font-medium">Sisa {{ $target - $bidang['poin'] }} poin lagi.</p>
                        @else
                        <p class="text-[11px] text-on-surface-variant mt-1 font-medium">Belum ada poin di bidang ini.</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Sertifikat Terakhir & Event --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Sertifikat Terbaru --}}
            <div class="bg-surface-container-lowest p-5 md:p-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-on-surface font-headline">Pengajuan Terakhir</h3>
                    <a href="{{ route('sertifikat.index') }}" class="text-primary text-sm font-semibold flex items-center gap-1 hover:underline">
                        Lihat Semua
                        <span class="material-symbols-outlined text-xs">arrow_forward</span>
                    </a>
                </div>
                <div class="space-y-3">
                    @forelse($recentSertifikats as $s)
                    <div class="flex items-center justify-between p-3 md:p-4 rounded-xl border border-outline-variant/10 hover:bg-primary/5 transition-all">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-bold text-on-surface truncate">{{ $s->nama_kegiatan }}</p>
                            <p class="text-xs text-on-surface-variant">{{ $s->kedudukan?->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-' }} • {{ $s->created_at->format('d M Y') }}</p>
                        </div>
                        <div class="flex items-center gap-2 md:gap-3 ml-4 flex-shrink-0">
                            <span class="text-sm font-bold text-primary hidden sm:inline">{{ $s->bobot_snapshot }} poin</span>
                            @include('components.status-badge', ['status' => $s->status])
                        </div>
                    </div>
                    @if($s->status === 'rejected' && $s->catatan_reject)
                    <div class="ml-4 -mt-1 mb-2 p-2 bg-error-container/20 rounded-lg">
                        <p class="text-[10px] text-on-error-container"><strong>Alasan:</strong> {{ $s->catatan_reject }}</p>
                    </div>
                    @endif
                    @empty
                    <div class="text-center py-8 text-on-surface-variant">
                        <span class="material-symbols-outlined text-4xl text-outline/30">inbox</span>
                        <p class="text-sm mt-2">Belum ada sertifikat yang diajukan.</p>
                        <a href="{{ route('sertifikat.create') }}" class="text-primary text-sm font-semibold hover:underline mt-2 inline-block">Upload sekarang →</a>
                    </div>
                    @endforelse
                </div>
            </div>

            {{-- Event Terbaru --}}
            <div class="bg-surface-container-lowest p-5 md:p-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                <h3 class="text-lg font-bold text-on-surface mb-6 font-headline">Informasi Acara Terbaru</h3>
                <div class="space-y-4">
                    @forelse($events as $event)
                    <div class="group flex gap-4 md:gap-5 p-3 md:p-4 rounded-xl border border-outline-variant/10 hover:border-primary/30 hover:bg-primary/5 transition-all cursor-pointer"
                         onclick="openEventModal({{ json_encode([
                            'judul' => $event->nama_event,
                            'deskripsi' => $event->deskripsi ?? 'Tidak ada deskripsi.',
                            'tanggal_mulai' => \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y'),
                            'tanggal_selesai' => $event->tanggal_selesai ? \Carbon\Carbon::parse($event->tanggal_selesai)->format('d M Y') : null,
                            'status' => $event->status_event,
                            'link_form' => $event->link_form ?? null,
                        ]) }})">
                        <div class="flex-1">
                            <div class="flex justify-between items-start mb-1">
                                <h4 class="font-bold text-on-surface group-hover:text-primary transition-colors text-sm md:text-base">{{ $event->nama_event }}</h4>
                                @if($event->status_event === 'akan_datang')
                                <span class="text-[10px] font-bold px-2 py-0.5 bg-secondary-container text-on-secondary-container rounded-full flex-shrink-0 ml-2">Coming Soon</span>
                                @elseif($event->status_event === 'berlangsung')
                                <span class="text-[10px] font-bold px-2 py-0.5 bg-primary-container text-on-primary-container rounded-full flex-shrink-0 ml-2">Berlangsung</span>
                                @endif
                            </div>
                            <p class="text-xs text-primary font-semibold mb-2 flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">calendar_today</span>
                                {{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') }}
                                @if($event->tanggal_selesai && $event->tanggal_selesai != $event->tanggal_mulai)
                                — {{ \Carbon\Carbon::parse($event->tanggal_selesai)->format('d M Y') }}
                                @endif
                            </p>
                            <p class="text-sm text-on-surface-variant line-clamp-2">{{ $event->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-8 text-on-surface-variant">
                        <span class="material-symbols-outlined text-4xl text-outline/30">event_busy</span>
                        <p class="text-sm mt-2">Belum ada acara terbaru.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- Event Detail Modal --}}
    <div id="modal-event"
        class="modal-wrap hidden fixed inset-0 z-[100] flex items-end sm:items-center justify-center p-0 sm:p-4 bg-slate-900/60 backdrop-blur-sm"
        onclick="if(event.target===this)closeModal('modal-event')">
        <div class="modal-box bg-white w-full sm:max-w-lg rounded-t-3xl sm:rounded-2xl shadow-2xl overflow-hidden border border-outline-variant/10 max-h-[90vh] flex flex-col">
            <div class="flex items-center justify-between px-5 sm:px-6 py-4 border-b border-outline-variant/10 shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-primary/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-xl">event</span>
                    </div>
                    <h3 class="text-base font-extrabold text-on-surface font-headline">Detail Event</h3>
                </div>
                <button onclick="closeModal('modal-event')"
                    class="w-8 h-8 rounded-full hover:bg-surface-container flex items-center justify-center transition-colors">
                    <span class="material-symbols-outlined text-on-surface-variant text-xl">close</span>
                </button>
            </div>
            <div class="overflow-y-auto flex-1 p-5 sm:p-6 space-y-4">
                <h4 class="text-lg font-bold text-on-surface font-headline" id="event-judul">-</h4>
                <div class="flex items-center gap-2 text-sm text-primary font-semibold">
                    <span class="material-symbols-outlined text-sm">calendar_today</span>
                    <span id="event-tanggal">-</span>
                </div>
                <div id="event-status-wrap"></div>
                <p class="text-sm text-on-surface-variant leading-relaxed" id="event-deskripsi">-</p>
            </div>
            <div class="p-4 border-t border-outline-variant/10 bg-surface-container-low flex gap-3 shrink-0">
                <button onclick="closeModal('modal-event')"
                    class="flex-1 py-2.5 rounded-xl border border-outline-variant text-on-surface-variant font-bold text-sm hover:bg-surface-container transition-colors">
                    Tutup
                </button>
                <a id="event-link-daftar" href="#" target="_blank"
                    class="flex-1 py-2.5 rounded-xl bg-primary text-white font-bold text-sm shadow-lg shadow-primary/20 hover:opacity-90 transition-all flex items-center justify-center gap-2 hidden">
                    <span class="material-symbols-outlined text-base">open_in_new</span>
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </div>

@push('scripts')
<script>
    function openEventModal(data) {
        document.getElementById('event-judul').textContent = data.judul || '-';
        document.getElementById('event-deskripsi').textContent = data.deskripsi || '-';

        let tanggalText = data.tanggal_mulai || '-';
        if (data.tanggal_selesai && data.tanggal_selesai !== data.tanggal_mulai) {
            tanggalText += ' — ' + data.tanggal_selesai;
        }
        document.getElementById('event-tanggal').textContent = tanggalText;

        const statusWrap = document.getElementById('event-status-wrap');
        if (data.status === 'akan_datang') {
            statusWrap.innerHTML = '<span class="px-3 py-1 bg-secondary-container text-on-secondary-container text-xs font-bold rounded-full">Coming Soon</span>';
        } else if (data.status === 'berlangsung') {
            statusWrap.innerHTML = '<span class="px-3 py-1 bg-primary-container text-on-primary-container text-xs font-bold rounded-full">Berlangsung</span>';
        } else {
            statusWrap.innerHTML = '';
        }

        const linkBtn = document.getElementById('event-link-daftar');
        if (data.link_form) {
            linkBtn.href = data.link_form;
            linkBtn.classList.remove('hidden');
        } else {
            linkBtn.classList.add('hidden');
        }

        openModal('modal-event');
    }
</script>
@endpush

</x-layouts.app-mahasiswa>
