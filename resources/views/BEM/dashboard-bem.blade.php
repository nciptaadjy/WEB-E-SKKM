<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>E-SKKM BEM Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = { darkMode: "class", theme: { extend: {
            colors: {
                "primary": "#005ea4", "primary-container": "#0077ce", "on-primary": "#ffffff",
                "on-primary-container": "#fdfcff", "secondary": "#006e1c", "secondary-container": "#98f994",
                "on-secondary": "#ffffff", "on-secondary-container": "#0c7521",
                "tertiary": "#b7131a", "tertiary-container": "#db322f", "on-tertiary": "#ffffff",
                "error": "#ba1a1a", "error-container": "#ffdad6", "on-error": "#ffffff",
                "on-error-container": "#93000a", "background": "#f6fafe", "surface": "#f6fafe",
                "surface-container-lowest": "#ffffff", "surface-container-low": "#f0f4f8",
                "surface-container": "#eaeef2", "surface-container-high": "#e4e9ed",
                "surface-container-highest": "#dfe3e7",
                "on-surface": "#171c1f", "on-surface-variant": "#404752",
                "outline": "#707783", "outline-variant": "#c0c7d4",
                "primary-fixed": "#d3e4ff", "primary-fixed-dim": "#a2c9ff",
                "secondary-fixed": "#98f994", "tertiary-fixed": "#ffdad6",
            },
            fontFamily: { headline: ["Manrope"], body: ["Inter"], label: ["Inter"] }
        }}}
    </script>
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .font-headline { font-family: 'Manrope', sans-serif; }
    </style>
</head>

<body class="bg-background text-on-surface flex min-h-screen">
    <!-- Sidebar -->
    <aside class="h-screen w-72 flex-col sticky left-0 top-0 bg-blue-50/80 backdrop-blur-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] flex z-50">
        <div class="flex flex-col gap-2 p-6 h-full">
            <div class="flex items-center gap-3 mb-10">
                <div class="w-10 h-10 rounded-xl bg-primary-container flex items-center justify-center">
                    <span class="material-symbols-outlined text-on-primary-container" style="font-variation-settings: 'FILL' 1;">account_balance</span>
                </div>
                <div>
                    <h1 class="text-2xl font-bold tracking-tight text-blue-800">E-SKKM</h1>
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold">BEM Dashboard</p>
                </div>
            </div>
            <nav class="flex flex-col gap-1">
                <a class="flex items-center gap-3 px-6 py-4 text-blue-700 font-bold bg-white/50 rounded-xl shadow-sm"
                    href="{{ route('bem.dashboard') }}">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">dashboard</span>
                    <span class="font-semibold text-sm">Dasbor</span>
                </a>
                <a class="flex items-center gap-3 px-6 py-4 text-slate-500 font-medium hover:bg-white/30 transition-all rounded-xl"
                    href="{{ route('bem.verifikasi') }}">
                    <span class="material-symbols-outlined">fact_check</span>
                    <span class="font-semibold text-sm">Form Verifikasi</span>
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

    <div class="flex-1 flex flex-col">
        <!-- TopAppBar -->
        <header class="w-full sticky top-0 z-40 bg-white/70 backdrop-blur-md flex justify-between items-center px-8 py-4">
            <h2 class="text-xl font-extrabold text-blue-800 font-headline">E-SKKM BEM Dashboard</h2>
            <div class="flex items-center gap-3">
                <div class="text-right">
                    <p class="text-xs font-bold text-on-surface">{{ Auth::user()->nama_pengguna }}</p>
                    <p class="text-[10px] text-on-surface-variant">BEM Verifikator</p>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="p-8 space-y-10">
            @if(session('success'))
            <div class="p-4 bg-green-50 border border-green-200 rounded-xl flex items-start gap-3">
                <span class="material-symbols-outlined text-green-600">check_circle</span>
                <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
            </div>
            @endif

            <!-- Hero -->
            <section class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <h2 class="text-3xl font-bold font-headline tracking-tight text-on-surface">Halo, {{ Auth::user()->nama_pengguna }}</h2>
                    <p class="text-on-surface-variant">Selamat datang di pusat kurasi Satuan Kredit Kegiatan Mahasiswa.</p>
                </div>
                <a href="{{ route('bem.verifikasi') }}"
                    class="px-5 py-2.5 bg-primary text-white font-semibold rounded-lg flex items-center gap-2 hover:opacity-90 shadow-lg shadow-primary/20 transition-all">
                    <span class="material-symbols-outlined text-sm">fact_check</span>
                    Buka Verifikasi
                </a>
            </section>

            <!-- Stats Cards -->
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-surface-container-lowest p-6 rounded-2xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] group hover:-translate-y-1 transition-transform duration-300">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-primary-fixed rounded-xl text-primary">
                            <span class="material-symbols-outlined">folder_shared</span>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <p class="text-on-surface-variant text-sm font-medium">Total Pengajuan</p>
                        <h3 class="text-3xl font-bold text-on-surface">{{ $totalPending + $totalVerified + $totalRejected }}</h3>
                    </div>
                </div>
                <div class="bg-surface-container-lowest p-6 rounded-2xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] group hover:-translate-y-1 transition-transform duration-300">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-surface-container-high rounded-xl text-on-surface-variant">
                            <span class="material-symbols-outlined">pending_actions</span>
                        </div>
                        @if($totalPending > 0)
                        <span class="text-xs font-semibold text-tertiary">Butuh Atensi</span>
                        @endif
                    </div>
                    <div class="space-y-1">
                        <p class="text-on-surface-variant text-sm font-medium">Menunggu Verifikasi</p>
                        <h3 class="text-3xl font-bold text-on-surface">{{ $totalPending }}</h3>
                    </div>
                </div>
                <div class="bg-surface-container-lowest p-6 rounded-2xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] group hover:-translate-y-1 transition-transform duration-300">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-secondary-container rounded-xl text-on-secondary-container">
                            <span class="material-symbols-outlined">verified</span>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <p class="text-on-surface-variant text-sm font-medium">Tervalidasi BEM</p>
                        <h3 class="text-3xl font-bold text-on-surface">{{ $totalVerified }}</h3>
                    </div>
                </div>
                <div class="bg-surface-container-lowest p-6 rounded-2xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] group hover:-translate-y-1 transition-transform duration-300">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-tertiary-fixed rounded-xl text-tertiary">
                            <span class="material-symbols-outlined">cancel</span>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <p class="text-on-surface-variant text-sm font-medium">Ditolak</p>
                        <h3 class="text-3xl font-bold text-on-surface">{{ $totalRejected }}</h3>
                    </div>
                </div>
            </section>

            <!-- Pending Sertifikats Table -->
            <section class="bg-surface-container-lowest rounded-2xl p-8 shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                    <div>
                        <h3 class="text-xl font-bold font-headline text-on-surface">Daftar Pengajuan Terbaru</h3>
                        <p class="text-on-surface-variant text-sm">Review dan validasi sertifikat mahasiswa.</p>
                    </div>
                    <a href="{{ route('bem.verifikasi') }}" class="flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold bg-primary text-on-primary hover:opacity-90 transition-all">
                        Lihat Semua Antrean
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="text-left border-b border-outline-variant/10">
                                <th class="pb-4 px-4 font-semibold text-xs text-on-surface-variant uppercase tracking-widest">Mahasiswa</th>
                                <th class="pb-4 px-4 font-semibold text-xs text-on-surface-variant uppercase tracking-widest">Nama Kegiatan</th>
                                <th class="pb-4 px-4 font-semibold text-xs text-on-surface-variant uppercase tracking-widest text-center">Poin</th>
                                <th class="pb-4 px-4 font-semibold text-xs text-on-surface-variant uppercase tracking-widest">Status</th>
                                <th class="pb-4 px-4 font-semibold text-xs text-on-surface-variant uppercase tracking-widest text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/5">
                            @forelse($pendingSertifikats as $sertifikat)
                            <tr class="group hover:bg-surface-container-low transition-all">
                                <td class="py-5 px-4">
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
                                <td class="py-5 px-4">
                                    <p class="text-sm font-medium text-on-surface">{{ $sertifikat->nama_kegiatan }}</p>
                                    <p class="text-[0.6875rem] text-on-surface-variant">{{ $sertifikat->kedudukan?->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-' }}</p>
                                </td>
                                <td class="py-5 px-4 text-center">
                                    <span class="text-sm font-bold text-primary">{{ $sertifikat->bobot_snapshot }}</span>
                                </td>
                                <td class="py-5 px-4">
                                    <span class="px-3 py-1 bg-surface-container-high text-on-surface-variant rounded-full text-[0.6875rem] font-bold tracking-wider uppercase">Menunggu</span>
                                </td>
                                <td class="py-5 px-4 text-right">
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
        </main>
    </div>
</body>
</html>
