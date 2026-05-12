<x-layouts.app-admin
    :title="'BEM Dashboard'"
    :role="'bem'"
    :activePage="'dashboard'"
    :portalName="'BEM Panel'"
    :portalSub="'Verifikator Sertifikat'"
    :sidebarIcon="'account_balance'">

    {{-- Hero --}}
    <header class="flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold font-headline tracking-tight text-on-surface">Halo, {{ Auth::user()->nama_pengguna }}</h1>
            <p class="text-on-surface-variant mt-1">Selamat datang di pusat kurasi Satuan Kredit Kegiatan Mahasiswa.</p>
        </div>
        <a href="{{ route('bem.verifikasi') }}"
            class="px-5 py-2.5 bg-primary text-white font-semibold rounded-lg flex items-center gap-2 hover:opacity-90 shadow-lg shadow-primary/20 transition-all self-start md:self-auto">
            <span class="material-symbols-outlined text-sm">fact_check</span>
            Buka Verifikasi
        </a>
    </header>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-2xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] group hover:-translate-y-1 transition-transform duration-300">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-primary-fixed rounded-xl text-primary">
                    <span class="material-symbols-outlined">folder_shared</span>
                </div>
            </div>
            <div class="space-y-1">
                <p class="text-on-surface-variant text-xs md:text-sm font-medium">Total Pengajuan</p>
                <h3 class="text-2xl md:text-3xl font-bold text-on-surface">{{ $totalPending + $totalVerified + $totalRejected }}</h3>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-2xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] group hover:-translate-y-1 transition-transform duration-300">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-surface-container-high rounded-xl text-on-surface-variant">
                    <span class="material-symbols-outlined">pending_actions</span>
                </div>
                @if($totalPending > 0)
                <span class="text-xs font-semibold text-tertiary">Butuh Atensi</span>
                @endif
            </div>
            <div class="space-y-1">
                <p class="text-on-surface-variant text-xs md:text-sm font-medium">Menunggu Verifikasi</p>
                <h3 class="text-2xl md:text-3xl font-bold text-on-surface">{{ $totalPending }}</h3>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-2xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] group hover:-translate-y-1 transition-transform duration-300">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-secondary-container rounded-xl text-on-secondary-container">
                    <span class="material-symbols-outlined">verified</span>
                </div>
            </div>
            <div class="space-y-1">
                <p class="text-on-surface-variant text-xs md:text-sm font-medium">Tervalidasi BEM</p>
                <h3 class="text-2xl md:text-3xl font-bold text-on-surface">{{ $totalVerified }}</h3>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-2xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] group hover:-translate-y-1 transition-transform duration-300">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-tertiary-fixed rounded-xl text-tertiary">
                    <span class="material-symbols-outlined">cancel</span>
                </div>
            </div>
            <div class="space-y-1">
                <p class="text-on-surface-variant text-xs md:text-sm font-medium">Ditolak</p>
                <h3 class="text-2xl md:text-3xl font-bold text-on-surface">{{ $totalRejected }}</h3>
            </div>
        </div>
    </div>

    {{-- Pending Sertifikats Table --}}
    <section class="bg-surface-container-lowest rounded-2xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] overflow-hidden">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 p-5 md:p-8 border-b border-outline-variant/10">
            <div>
                <h3 class="text-lg md:text-xl font-bold font-headline text-on-surface">Daftar Pengajuan Terbaru</h3>
                <p class="text-on-surface-variant text-sm">Review dan validasi sertifikat mahasiswa.</p>
            </div>
            <a href="{{ route('bem.verifikasi') }}" class="flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold bg-primary text-on-primary hover:opacity-90 transition-all self-start">
                Lihat Semua Antrean
            </a>
        </div>

        {{-- Mobile: Card list --}}
        <div class="divide-y divide-outline-variant/5 md:hidden">
            @forelse($pendingSertifikats as $sertifikat)
            <div class="p-4 hover:bg-surface-container-low transition-colors">
                <div class="flex items-start justify-between gap-3 mb-2">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-on-surface">{{ $sertifikat->mahasiswa->nama }}</p>
                        <p class="text-xs text-on-surface-variant">{{ $sertifikat->mahasiswa->nim }}</p>
                    </div>
                    <span class="text-sm font-bold text-primary shrink-0">{{ $sertifikat->bobot_snapshot }} Poin</span>
                </div>
                <p class="text-sm font-semibold text-on-surface mb-1">{{ $sertifikat->nama_kegiatan }}</p>
                <p class="text-[10px] text-on-surface-variant bg-surface-container px-2 py-0.5 rounded inline-block mb-3">
                    {{ $sertifikat->kedudukan?->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-' }}
                </p>
                <div class="flex gap-2">
                    @include('components.status-badge', ['status' => $sertifikat->status])
                    <a href="{{ route('bem.verifikasi') }}" class="ml-auto text-primary font-bold text-xs hover:underline">Verifikasi →</a>
                </div>
            </div>
            @empty
            <div class="px-6 py-12 text-center text-on-surface-variant">
                <span class="material-symbols-outlined text-4xl text-outline/30">inbox</span>
                <p class="mt-2 font-semibold text-sm">Tidak ada pengajuan yang menunggu verifikasi.</p>
            </div>
            @endforelse
        </div>

        {{-- Desktop: Table --}}
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="text-left border-b border-outline-variant/10">
                        <th class="pb-4 px-6 pt-5 font-semibold text-xs text-on-surface-variant uppercase tracking-widest">Mahasiswa</th>
                        <th class="pb-4 px-6 pt-5 font-semibold text-xs text-on-surface-variant uppercase tracking-widest">Nama Kegiatan</th>
                        <th class="pb-4 px-6 pt-5 font-semibold text-xs text-on-surface-variant uppercase tracking-widest text-center">Poin</th>
                        <th class="pb-4 px-6 pt-5 font-semibold text-xs text-on-surface-variant uppercase tracking-widest">Status</th>
                        <th class="pb-4 px-6 pt-5 font-semibold text-xs text-on-surface-variant uppercase tracking-widest text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/5">
                    @forelse($pendingSertifikats as $sertifikat)
                    <tr class="group hover:bg-surface-container-low transition-all">
                        <td class="py-5 px-6">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-primary-fixed-dim flex items-center justify-center text-xs font-bold text-primary">
                                    {{ strtoupper(substr($sertifikat->mahasiswa->nama, 0, 2)) }}
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-on-surface">{{ $sertifikat->mahasiswa->nama }}</p>
                                    <p class="text-[0.6875rem] text-on-surface-variant">{{ $sertifikat->mahasiswa->nim }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-5 px-6">
                            <p class="text-sm font-medium text-on-surface">{{ $sertifikat->nama_kegiatan }}</p>
                            <p class="text-[0.6875rem] text-on-surface-variant">{{ $sertifikat->kedudukan?->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-' }}</p>
                        </td>
                        <td class="py-5 px-6 text-center">
                            <span class="text-sm font-bold text-primary">{{ $sertifikat->bobot_snapshot }}</span>
                        </td>
                        <td class="py-5 px-6">
                            @include('components.status-badge', ['status' => $sertifikat->status])
                        </td>
                        <td class="py-5 px-6 text-right">
                            <a href="{{ route('bem.verifikasi') }}" class="text-primary font-bold text-sm hover:underline">Verifikasi</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-12 text-center text-on-surface-variant">
                            <span class="material-symbols-outlined text-4xl text-outline/30">inbox</span>
                            <p class="mt-2 font-semibold">Tidak ada pengajuan yang menunggu verifikasi.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</x-layouts.app-admin>
