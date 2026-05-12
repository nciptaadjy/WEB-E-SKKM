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

    {{-- Stats Grid --}}
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] border-l-4 border-primary group hover:scale-[1.01] transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-primary/10 rounded-lg text-primary">
                    <span class="material-symbols-outlined">description</span>
                </div>
            </div>
            <h3 class="text-on-surface-variant text-xs md:text-sm font-semibold mb-1">Total Sertifikat</h3>
            <div class="flex items-baseline space-x-2">
                <span class="text-3xl md:text-4xl font-bold text-on-surface tracking-tighter">{{ $totalSertifikat }}</span>
                <span class="text-outline text-xs md:text-sm font-medium">berkas</span>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] border-l-4 border-amber-500 group hover:scale-[1.01] transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-amber-500/10 rounded-lg text-amber-600">
                    <span class="material-symbols-outlined">pending_actions</span>
                </div>
                @if($totalPending > 0)
                <span class="text-amber-600 text-xs font-bold bg-amber-100 px-2 py-1 rounded-full">Mendesak</span>
                @endif
            </div>
            <h3 class="text-on-surface-variant text-xs md:text-sm font-semibold mb-1">Menunggu Persetujuan</h3>
            <div class="flex items-baseline space-x-2">
                <span class="text-3xl md:text-4xl font-bold text-on-surface tracking-tighter">{{ $totalPending }}</span>
                <span class="text-outline text-xs md:text-sm font-medium">antrean</span>
            </div>
        </div>
        <div class="col-span-2 md:col-span-1 bg-surface-container-lowest p-5 md:p-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] border-l-4 border-tertiary group hover:scale-[1.01] transition-all duration-300">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-tertiary/10 rounded-lg text-tertiary">
                    <span class="material-symbols-outlined">cancel</span>
                </div>
            </div>
            <h3 class="text-on-surface-variant text-xs md:text-sm font-semibold mb-1">Total Ditolak</h3>
            <div class="flex items-baseline space-x-2">
                <span class="text-3xl md:text-4xl font-bold text-on-surface tracking-tighter">{{ $totalRejected }}</span>
                <span class="text-outline text-xs md:text-sm font-medium">berkas</span>
            </div>
        </div>
    </div>

    {{-- Additional Stats Row --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
        <div class="bg-primary p-5 md:p-6 rounded-xl text-white shadow-xl shadow-primary/20">
            <div class="flex items-center gap-3 mb-2">
                <span class="material-symbols-outlined text-2xl">event</span>
                <h3 class="font-bold font-headline text-lg">Event Ormawa</h3>
            </div>
            <p class="text-3xl md:text-4xl font-bold">{{ $totalEvents }}</p>
            <p class="text-sm opacity-80 mt-1">Total event yang dibuat</p>
        </div>
        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] border border-secondary/20">
            <div class="flex items-center gap-3 mb-2">
                <span class="material-symbols-outlined text-2xl text-secondary">people</span>
                <h3 class="font-bold font-headline text-lg text-on-surface">Total Peserta</h3>
            </div>
            <p class="text-3xl md:text-4xl font-bold text-secondary">{{ $totalPesertaEvents }}</p>
            <p class="text-sm text-on-surface-variant mt-1">Peserta dari semua event</p>
        </div>
    </div>

    {{-- Sertifikat Terbaru Table --}}
    <section class="bg-surface-container-lowest rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] overflow-hidden">
        <div class="px-5 md:px-8 py-5 md:py-6 border-b border-outline-variant/10">
            <h2 class="text-lg md:text-xl font-bold text-on-surface font-headline">Aktivitas Sertifikat Terbaru</h2>
            <p class="text-sm text-outline">Daftar pengajuan SKKM mahasiswa terkini</p>
        </div>

        {{-- Mobile: Card list --}}
        <div class="divide-y divide-outline-variant/5 md:hidden">
            @forelse($recentSertifikats as $sertifikat)
            <div class="p-4 hover:bg-surface-container-low transition-colors">
                <div class="flex items-start justify-between gap-3 mb-2">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-on-surface">{{ $sertifikat->mahasiswa->nama }}</p>
                        <p class="text-xs text-on-surface-variant">{{ $sertifikat->mahasiswa->nim }}</p>
                    </div>
                    <span class="text-sm font-bold text-primary shrink-0">{{ $sertifikat->bobot_snapshot }} pts</span>
                </div>
                <p class="text-sm font-medium text-on-surface mb-2">{{ $sertifikat->nama_kegiatan }}</p>
                @include('components.status-badge', ['status' => $sertifikat->status])
            </div>
            @empty
            <div class="px-6 py-12 text-center text-on-surface-variant">
                <span class="material-symbols-outlined text-4xl text-outline/30">inbox</span>
                <p class="mt-2 font-semibold text-sm">Belum ada data sertifikat.</p>
            </div>
            @endforelse
        </div>

        {{-- Desktop: Table --}}
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-low text-on-surface-variant uppercase text-[11px] tracking-widest font-bold">
                        <th class="px-8 py-4">Mahasiswa</th>
                        <th class="px-8 py-4">Jenis Kegiatan</th>
                        <th class="px-8 py-4">Poin SKKM</th>
                        <th class="px-8 py-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/5">
                    @forelse($recentSertifikats as $sertifikat)
                    <tr class="hover:bg-surface-container-low transition-colors group">
                        <td class="px-8 py-5">
                            <p class="text-base font-semibold text-on-surface">{{ $sertifikat->mahasiswa->nama }}</p>
                            <p class="text-sm text-outline">{{ $sertifikat->mahasiswa->nim }}</p>
                        </td>
                        <td class="px-8 py-5 font-medium text-on-surface">{{ $sertifikat->nama_kegiatan }}</td>
                        <td class="px-8 py-5 font-bold text-primary">{{ $sertifikat->bobot_snapshot }} pts</td>
                        <td class="px-8 py-5">
                            @include('components.status-badge', ['status' => $sertifikat->status])
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-8 py-12 text-center text-on-surface-variant">
                            <span class="material-symbols-outlined text-4xl text-outline/30">inbox</span>
                            <p class="mt-2 font-semibold">Belum ada data sertifikat.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</x-layouts.app-admin>
