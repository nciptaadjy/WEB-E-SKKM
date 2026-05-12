<x-layouts.app-admin
    :title="'Kemahasiswaan Dashboard'"
    :role="'kemahasiswaan'"
    :activePage="'dashboard'"
    :portalName="'Kemahasiswaan'"
    :portalSub="'Admin Portal'"
    :sidebarIcon="'admin_panel_settings'">

    {{-- Welcome --}}
    <header class="flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold tracking-tight text-on-surface font-headline">Selamat Datang, {{ Auth::user()->nama_pengguna }}</h1>
            <p class="text-on-surface-variant mt-1">Pantau dan verifikasi pencapaian kredit mahasiswa hari ini.</p>
        </div>
        <a href="{{ route('kemahasiswaan.verifikasi') }}"
            class="px-5 py-2.5 bg-primary text-white font-semibold rounded-lg flex items-center gap-2 hover:opacity-90 shadow-lg shadow-primary/20 transition-all self-start md:self-auto">
            <span class="material-symbols-outlined text-sm">fact_check</span>
            Buka Verifikasi
        </a>
    </header>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
        @php $totalAll = $totalApproved + $totalRejected + $totalPending; @endphp
        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-xl relative overflow-hidden shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-primary/10 rounded-lg text-primary">
                    <span class="material-symbols-outlined">assignment</span>
                </div>
            </div>
            <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-1">Total Pengajuan</p>
            <h3 class="text-2xl md:text-3xl font-bold text-slate-900 font-headline">{{ $totalAll }}</h3>
            <div class="absolute bottom-0 left-0 w-full h-1 bg-primary/20">
                <div class="h-full bg-primary" style="width: 75%"></div>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-xl relative overflow-hidden shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-surface-container-high rounded-lg text-on-surface-variant">
                    <span class="material-symbols-outlined">pending_actions</span>
                </div>
                @if($totalVerifiedBem > 0)
                <span class="text-xs font-bold text-tertiary">Mendesak</span>
                @endif
            </div>
            <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-1">Menunggu Verifikasi Anda</p>
            <h3 class="text-2xl md:text-3xl font-bold text-slate-900 font-headline">{{ $totalVerifiedBem }}</h3>
            <div class="absolute bottom-0 left-0 w-full h-1 bg-surface-container-high">
                <div class="h-full bg-slate-400" style="width: {{ $totalVerifiedBem > 0 ? 33 : 0 }}%"></div>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-xl relative overflow-hidden shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-secondary/10 rounded-lg text-secondary">
                    <span class="material-symbols-outlined">verified</span>
                </div>
                <span class="text-xs font-bold text-secondary">Selesai</span>
            </div>
            <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-1">Tervalidasi</p>
            <h3 class="text-2xl md:text-3xl font-bold text-slate-900 font-headline">{{ $totalApproved }}</h3>
            <div class="absolute bottom-0 left-0 w-full h-1 bg-secondary/20">
                <div class="h-full bg-secondary" style="width: {{ $totalAll > 0 ? round(($totalApproved / $totalAll) * 100) : 0 }}%"></div>
            </div>
        </div>
        <div class="bg-surface-container-lowest p-5 md:p-6 rounded-xl relative overflow-hidden shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
            <div class="flex justify-between items-start mb-4">
                <div class="p-3 bg-tertiary/10 rounded-lg text-tertiary">
                    <span class="material-symbols-outlined">cancel</span>
                </div>
            </div>
            <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-1">Ditolak</p>
            <h3 class="text-2xl md:text-3xl font-bold text-slate-900 font-headline">{{ $totalRejected }}</h3>
            <div class="absolute bottom-0 left-0 w-full h-1 bg-tertiary/20">
                <div class="h-full bg-tertiary" style="width: {{ $totalAll > 0 ? round(($totalRejected / $totalAll) * 100) : 0 }}%"></div>
            </div>
        </div>
    </div>

    {{-- Content Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Table --}}
        <div class="lg:col-span-2">
            <div class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                <div class="px-5 md:px-6 py-5 border-b border-outline-variant/10 flex justify-between items-center">
                    <h2 class="font-headline text-lg font-bold text-slate-900">Menunggu Verifikasi Anda</h2>
                    <a href="{{ route('kemahasiswaan.verifikasi') }}" class="text-sm font-semibold text-primary hover:underline">Lihat Semua</a>
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
                        </div>
                        <p class="text-sm font-medium text-on-surface mb-1">{{ $sertifikat->nama_kegiatan }}</p>
                        <div class="flex items-center justify-between mt-2">
                            <span class="px-3 py-1 bg-primary-fixed text-primary text-[10px] font-bold rounded-full uppercase">Verif BEM ✓</span>
                            <a href="{{ route('kemahasiswaan.verifikasi') }}" class="text-primary font-bold text-xs hover:underline">Verifikasi →</a>
                        </div>
                    </div>
                    @empty
                    <div class="px-6 py-12 text-center text-on-surface-variant">
                        <span class="material-symbols-outlined text-4xl text-outline/30">inbox</span>
                        <p class="mt-2 font-semibold text-sm">Tidak ada sertifikat yang menunggu verifikasi Anda.</p>
                    </div>
                    @endforelse
                </div>

                {{-- Desktop: Table --}}
                <table class="w-full text-left border-collapse hidden md:table">
                    <thead>
                        <tr class="bg-surface-container-low border-none">
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Mahasiswa</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Aktivitas</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendingSertifikats as $sertifikat)
                        <tr class="hover:bg-surface-container-low transition-colors group border-b border-outline-variant/5">
                            <td class="px-6 py-4">
                                <p class="text-sm font-bold text-slate-900">{{ $sertifikat->mahasiswa->nama }}</p>
                                <p class="text-[10px] text-slate-500">{{ $sertifikat->mahasiswa->nim }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm font-medium text-slate-700">{{ $sertifikat->nama_kegiatan }}</p>
                                <p class="text-[10px] text-primary font-semibold">{{ $sertifikat->kedudukan?->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-' }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-primary-fixed text-primary text-[10px] font-bold rounded-full uppercase">Verif BEM ✓</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('kemahasiswaan.verifikasi') }}" class="text-primary font-bold text-xs hover:bg-primary/5 px-3 py-2 rounded-lg">Verifikasi</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-on-surface-variant">
                                <span class="material-symbols-outlined text-4xl text-outline/30">inbox</span>
                                <p class="mt-2 font-semibold">Tidak ada sertifikat yang menunggu verifikasi Anda.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Side Info Card --}}
        <div class="space-y-6">
            <div class="bg-primary p-5 md:p-6 rounded-2xl text-white shadow-xl shadow-primary/30 relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="font-headline text-xl font-bold mb-4">Statistik Mahasiswa</h3>
                    <div class="space-y-4">
                        <div>
                            <p class="text-xs font-medium opacity-80 mb-1">Total Mahasiswa Terdaftar</p>
                            <p class="text-3xl font-bold">{{ $totalMahasiswa }}</p>
                        </div>
                    </div>
                </div>
                <div class="absolute -bottom-12 -right-12 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
            </div>

            <div class="bg-surface-container-lowest p-5 md:p-6 rounded-2xl shadow-sm border border-outline-variant/10">
                <h3 class="font-headline text-lg font-bold text-slate-900 mb-4">Alur Verifikasi</h3>
                <div class="space-y-3">
                    <div class="flex items-center gap-3 text-sm">
                        <span class="w-6 h-6 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center text-xs font-bold">1</span>
                        <span class="text-on-surface-variant">Mahasiswa Upload</span>
                    </div>
                    <div class="ml-3 w-0.5 h-4 bg-outline-variant/30"></div>
                    <div class="flex items-center gap-3 text-sm">
                        <span class="w-6 h-6 rounded-full bg-primary-fixed text-primary flex items-center justify-center text-xs font-bold">2</span>
                        <span class="text-on-surface-variant">Verifikasi BEM</span>
                    </div>
                    <div class="ml-3 w-0.5 h-4 bg-outline-variant/30"></div>
                    <div class="flex items-center gap-3 text-sm">
                        <span class="w-6 h-6 rounded-full bg-primary text-white flex items-center justify-center text-xs font-bold">3</span>
                        <span class="font-bold text-primary">Anda (Kemahasiswaan)</span>
                    </div>
                    <div class="ml-3 w-0.5 h-4 bg-outline-variant/30"></div>
                    <div class="flex items-center gap-3 text-sm">
                        <span class="w-6 h-6 rounded-full bg-secondary text-white flex items-center justify-center text-xs font-bold">✓</span>
                        <span class="text-secondary font-semibold">Poin Ditambahkan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app-admin>
