<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>E-SKKM Kemahasiswaan - Verifikasi</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: { extend: {
                colors: {
                    "primary": "#005ea4", "primary-container": "#0077ce", "on-primary": "#ffffff",
                    "on-primary-container": "#fdfcff", "secondary": "#006e1c", "secondary-container": "#98f994",
                    "on-secondary": "#ffffff", "on-secondary-container": "#0c7521",
                    "tertiary": "#b7131a", "tertiary-container": "#db322f", "on-tertiary": "#ffffff",
                    "error": "#ba1a1a", "error-container": "#ffdad6", "on-error": "#ffffff",
                    "on-error-container": "#93000a", "background": "#f6fafe", "surface": "#f6fafe",
                    "surface-container-lowest": "#ffffff", "surface-container-low": "#f0f4f8",
                    "surface-container": "#eaeef2", "surface-container-high": "#e4e9ed",
                    "on-surface": "#171c1f", "on-surface-variant": "#404752",
                    "outline": "#707783", "outline-variant": "#c0c7d4",
                    "primary-fixed": "#d3e4ff", "secondary-fixed": "#98f994",
                    "tertiary-fixed": "#ffdad6",
                },
                fontFamily: { headline: ["Manrope"], body: ["Inter"], label: ["Inter"] }
            }}
        }
    </script>
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .headline { font-family: 'Manrope', sans-serif; }
    </style>
</head>

<body class="bg-background text-on-surface antialiased flex min-h-screen">
    <!-- Sidebar -->
    <aside class="h-screen w-72 flex-col sticky left-0 top-0 bg-blue-50/80 backdrop-blur-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] flex z-50">
        <div class="flex flex-col gap-2 p-6 h-full">
            <div class="flex items-center gap-3 mb-10">
                <div class="w-10 h-10 rounded-xl bg-primary-container flex items-center justify-center">
                    <span class="material-symbols-outlined text-on-primary-container" style="font-variation-settings: 'FILL' 1;">account_balance</span>
                </div>
                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-blue-800">E-SKKM</h1>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold">Kemahasiswaan</p>
                </div>
            </div>
            <nav class="flex flex-col gap-1">
                <a class="flex items-center gap-3 px-6 py-4 text-slate-500 font-medium hover:bg-white/30 transition-all rounded-xl"
                    href="{{ route('kemahasiswaan.dashboard') }}">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="font-semibold text-sm">Dasbor</span>
                </a>
                <a class="flex items-center gap-3 px-6 py-4 text-blue-700 font-bold bg-white/50 rounded-xl shadow-sm"
                    href="{{ route('kemahasiswaan.verifikasi') }}">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">fact_check</span>
                    <span class="font-semibold text-sm">Verifikasi Akhir</span>
                </a>
            </nav>
            <div class="mt-auto pt-6 border-t border-outline-variant/10">
                <form action="{{ route('logout.admin') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-tertiary text-on-tertiary py-4 rounded-xl font-bold flex items-center justify-center gap-2 hover:opacity-90 transition-opacity shadow-lg shadow-tertiary/20">
                        <span class="material-symbols-outlined">logout</span>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <!-- Top Bar -->
        <header class="w-full sticky top-0 z-40 bg-white/70 backdrop-blur-md">
            <div class="flex justify-between items-center w-full px-8 py-4">
                <h2 class="text-xl font-extrabold text-blue-800 font-headline">Verifikasi Akhir Sertifikat</h2>
                <div class="flex items-center gap-3">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs font-bold text-on-surface">{{ Auth::user()->nama_pengguna }}</p>
                        <p class="text-[10px] text-on-surface-variant">Kemahasiswaan</p>
                    </div>
                </div>
            </div>
        </header>

        <div class="p-8 overflow-y-auto">
            @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl flex items-start gap-3">
                <span class="material-symbols-outlined text-green-600">check_circle</span>
                <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
            </div>
            @endif

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <div class="p-6 rounded-xl bg-surface-container-lowest border border-outline-variant/10">
                    <p class="text-xs font-semibold text-outline uppercase tracking-widest mb-1">Menunggu Verifikasi</p>
                    <h3 class="text-4xl font-bold text-primary font-headline">{{ $totalAntrean }}</h3>
                </div>
                <div class="p-6 rounded-xl bg-secondary-container/20 border border-secondary/10">
                    <p class="text-xs font-semibold text-outline uppercase tracking-widest mb-1">Sudah Diverifikasi BEM</p>
                    <h3 class="text-2xl font-bold text-secondary font-headline">{{ $totalAntrean }} <span class="text-sm font-medium text-on-surface-variant">Sertifikat</span></h3>
                </div>
                <div class="p-6 rounded-xl bg-primary text-on-primary shadow-xl shadow-primary/20">
                    <p class="text-xs font-semibold opacity-80 uppercase tracking-widest mb-1">Status</p>
                    <div class="flex items-center gap-2 mt-2">
                        <span class="w-2 h-2 rounded-full bg-secondary-fixed animate-pulse"></span>
                        <h3 class="text-xl font-bold font-headline">Aktif</h3>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <section class="bg-surface-container-lowest rounded-xl overflow-hidden border border-outline-variant/10 shadow-sm">
                <div class="p-6 border-b border-outline-variant/5 flex items-center justify-between">
                    <h3 class="text-lg font-bold font-headline">Antrean Verifikasi Akhir</h3>
                    <span class="text-xs text-outline">Sertifikat yang sudah lolos verifikasi BEM</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container-low/50">
                                <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Mahasiswa</th>
                                <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Kegiatan</th>
                                <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Verifikator BEM</th>
                                <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Link Sertifikat</th>
                                <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider">Poin</th>
                                <th class="px-6 py-4 text-xs font-bold text-outline uppercase tracking-wider text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/5">
                            @forelse($sertifikats as $sertifikat)
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-6 py-6">
                                    <p class="text-sm font-bold text-on-surface">{{ $sertifikat->mahasiswa->nama }}</p>
                                    <p class="text-xs text-on-surface-variant">{{ $sertifikat->mahasiswa->nim }} — {{ $sertifikat->mahasiswa->prodi }}</p>
                                </td>
                                <td class="px-6 py-6">
                                    <p class="text-sm font-semibold text-on-surface">{{ $sertifikat->nama_kegiatan }}</p>
                                    <p class="text-[10px] text-on-surface-variant bg-surface-container px-2 py-0.5 rounded inline-block mt-1">
                                        {{ $sertifikat->kedudukan?->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-' }}
                                    </p>
                                </td>
                                <td class="px-6 py-6">
                                    <p class="text-xs text-on-surface-variant">{{ $sertifikat->verifierBem?->nama_pengguna ?? '-' }}</p>
                                </td>
                                <td class="px-6 py-6">
                                    @if($sertifikat->link_sertifikat)
                                    <a href="{{ $sertifikat->link_sertifikat }}" target="_blank"
                                        class="inline-flex items-center gap-1 text-xs text-primary font-semibold hover:underline">
                                        <span class="material-symbols-outlined text-sm">visibility</span>
                                        Lihat File
                                    </a>
                                    @else
                                    <span class="text-xs text-outline">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-6">
                                    <span class="text-lg font-bold text-primary font-headline">{{ $sertifikat->bobot_snapshot }}</span>
                                    <span class="text-[10px] font-bold text-outline uppercase"> Poin</span>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex justify-end gap-3">
                                        <form action="{{ route('kemahasiswaan.reject', $sertifikat) }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="catatan_reject" value="Ditolak oleh Kemahasiswaan.">
                                            <button type="submit" class="px-4 py-2 rounded-full border border-error text-error text-xs font-bold hover:bg-error-container transition-colors">Tolak</button>
                                        </form>
                                        <form action="{{ route('kemahasiswaan.approve', $sertifikat) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" class="px-4 py-2 rounded-full bg-secondary text-on-secondary text-xs font-bold hover:opacity-90 shadow-sm transition-all active:scale-95">Setujui</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-on-surface-variant">
                                    <span class="material-symbols-outlined text-4xl text-outline/30 mb-2">inbox</span>
                                    <p class="font-semibold">Tidak ada sertifikat yang menunggu verifikasi.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($sertifikats->hasPages())
                <div class="p-6 bg-surface-container-low/30 border-t border-outline-variant/5">
                    {{ $sertifikats->links() }}
                </div>
                @endif
            </section>
        </div>
    </main>
</body>
</html>
