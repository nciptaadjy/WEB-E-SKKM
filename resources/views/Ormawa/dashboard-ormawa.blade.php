<x-layouts.app-admin
    :title="'Ormawa Dashboard'"
    :role="'ormawa'"
    :activePage="'dashboard'"
    :portalName="'Portal Ormawa'"
    :portalSub="'Organisasi Mahasiswa'"
    :sidebarIcon="'groups'">

    {{-- Welcome --}}
    <header>
        <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-on-surface font-headline">Halo, {{ Auth::user()->nama_pengguna }}!</h1>
        <p class="text-on-surface-variant mt-1">Ringkasan aktivitas dan pengajuan kredit E-SKKM periode ini.</p>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
        <div class="bg-primary p-5 md:p-6 rounded-xl text-white shadow-xl shadow-primary/20 group hover:-translate-y-1 transition-transform">
            <div class="flex items-center gap-3 mb-2">
                <span class="material-symbols-outlined text-2xl">event</span>
                <h3 class="font-bold font-headline text-base">Event Ormawa</h3>
            </div>
            <p class="text-2xl md:text-3xl font-bold">{{ $totalEvents }}</p>
            <p class="text-xs opacity-80 mt-1">Total event dibuat</p>
        </div>
        
        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] border border-secondary/20 group hover:-translate-y-1 transition-transform">
            <div class="flex items-center gap-3 mb-2">
                <span class="material-symbols-outlined text-2xl text-secondary">people</span>
                <h3 class="font-bold font-headline text-base text-on-surface">Total Peserta</h3>
            </div>
            <p class="text-2xl md:text-3xl font-bold text-secondary">{{ $totalPesertaEvents }}</p>
            <p class="text-xs text-on-surface-variant mt-1">Dari semua event</p>
        </div>

        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] border border-amber-500/20 group hover:-translate-y-1 transition-transform">
            <div class="flex items-center gap-3 mb-2">
                <span class="material-symbols-outlined text-2xl text-amber-600">group_add</span>
                <h3 class="font-bold font-headline text-base text-on-surface">Peserta Batch</h3>
            </div>
            <p class="text-2xl md:text-3xl font-bold text-amber-600">{{ $totalBatchPeserta }}</p>
            <p class="text-xs text-on-surface-variant mt-1">Total daftar via {{ $totalBatch }} Batch</p>
        </div>

        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] border border-green-500/20 group hover:-translate-y-1 transition-transform">
            <div class="flex items-center gap-3 mb-2">
                <span class="material-symbols-outlined text-2xl text-green-600">verified</span>
                <h3 class="font-bold font-headline text-base text-on-surface">Batch Di-ACC</h3>
            </div>
            <p class="text-2xl md:text-3xl font-bold text-green-600">{{ $totalBatchPesertaAcc }}</p>
            <p class="text-xs text-on-surface-variant mt-1">Peserta dgn nomor sertifikat</p>
        </div>
    </div>

    {{-- Event Terbaru Table --}}
    <section class="bg-surface-container-lowest mt-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] overflow-hidden">
        <div class="px-5 md:px-8 py-5 md:py-6 border-b border-outline-variant/10">
            <h2 class="text-lg md:text-xl font-bold text-on-surface font-headline">Daftar Event Terbaru</h2>
            <p class="text-sm text-outline">Event yang baru saja Anda buat</p>
        </div>

        {{-- Mobile: Card list --}}
        <div class="divide-y divide-outline-variant/5 md:hidden">
            @forelse($recentEvents as $event)
            <div class="p-4 hover:bg-surface-container-low transition-colors">
                <div class="flex items-start justify-between gap-3 mb-2">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-on-surface truncate">{{ $event->judul_event }}</p>
                        <p class="text-xs text-on-surface-variant">{{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') }}</p>
                    </div>
                </div>
                <p class="text-xs font-medium text-primary mb-2">{{ $event->subKegiatan->bidangKegiatan->nama_bidang ?? '-' }}</p>
            </div>
            @empty
            <div class="px-6 py-12 text-center text-on-surface-variant">
                <span class="material-symbols-outlined text-4xl text-outline/30">event_busy</span>
                <p class="mt-2 font-semibold text-sm">Belum ada event yang dibuat.</p>
            </div>
            @endforelse
        </div>

        {{-- Desktop: Table --}}
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-low text-on-surface-variant uppercase text-[11px] tracking-widest font-bold">
                        <th class="px-8 py-4">Judul Event</th>
                        <th class="px-8 py-4">Bidang Kegiatan</th>
                        <th class="px-8 py-4">Kategori</th>
                        <th class="px-8 py-4">Tanggal Mulai</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/5">
                    @forelse($recentEvents as $event)
                    <tr class="hover:bg-surface-container-low transition-colors group">
                        <td class="px-8 py-5">
                            <p class="text-base font-semibold text-on-surface">{{ $event->judul_event }}</p>
                            @if($event->nama_event && $event->nama_event !== $event->judul_event)
                                <p class="text-xs text-outline">{{ $event->nama_event }}</p>
                            @endif
                        </td>
                        <td class="px-8 py-5 font-medium text-on-surface">{{ $event->subKegiatan->bidangKegiatan->nama_bidang ?? '-' }}</td>
                        <td class="px-8 py-5 text-sm text-on-surface-variant">{{ $event->kategori_event ?? '-' }}</td>
                        <td class="px-8 py-5 text-sm text-on-surface-variant">{{ \Carbon\Carbon::parse($event->tanggal_mulai)->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-8 py-12 text-center text-on-surface-variant">
                            <span class="material-symbols-outlined text-4xl text-outline/30">event_busy</span>
                            <p class="mt-2 font-semibold">Belum ada event yang dibuat.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</x-layouts.app-admin>
