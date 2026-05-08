<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>E-SKKM Ormawa Dashboard</title>
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

<body class="bg-surface text-on-surface">
    <!-- TopNavBar -->
    <nav class="fixed top-0 w-full z-50 bg-[#f6fafe]/80 backdrop-blur-md flex justify-between items-center px-8 h-16 shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
        <div class="flex items-center gap-8">
            <span class="font-bold text-[#005ea4] text-xl tracking-tight font-headline">E-SKKM</span>
            <div class="hidden md:flex gap-6 text-sm font-semibold font-headline">
                <a class="text-[#005ea4] font-bold border-b-2 border-[#005ea4] pb-1" href="{{ route('ormawa.dashboard') }}">Dashboard</a>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <div class="text-right hidden sm:block">
                <p class="text-xs font-bold text-on-surface">{{ Auth::user()->nama_pengguna }}</p>
                <p class="text-[10px] text-on-surface-variant">Ormawa</p>
            </div>
        </div>
    </nav>

    <div class="flex pt-16">
        <!-- Sidebar -->
        <aside class="hidden md:flex h-[calc(100vh-64px)] w-64 fixed left-0 top-16 bg-[#f0f4f8] flex-col p-6 gap-2">
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-white">
                        <span class="material-symbols-outlined">groups</span>
                    </div>
                    <div>
                        <p class="font-bold text-[#005ea4] text-sm leading-tight font-headline">Portal Ormawa</p>
                        <p class="text-xs text-slate-500">Organisasi Mahasiswa</p>
                    </div>
                </div>
            </div>
            <nav class="flex-1 space-y-1">
                <a class="flex items-center gap-3 px-4 py-3 bg-white text-[#005ea4] rounded-xl shadow-sm font-semibold transition-all"
                    href="{{ route('ormawa.dashboard') }}">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
            </nav>
            <div class="mt-auto space-y-4">
                <form action="{{ route('logout.admin') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-tertiary hover:bg-error-container/20 rounded-xl transition-all">
                        <span class="material-symbols-outlined">logout</span>
                        <span class="text-sm font-medium">Keluar</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 md:ml-64 p-8 min-h-screen">
            <div class="max-w-6xl mx-auto space-y-8">

                <!-- Welcome -->
                <header>
                    <h1 class="text-3xl font-bold tracking-tight text-on-surface font-headline">Halo, {{ Auth::user()->nama_pengguna }}!</h1>
                    <p class="text-on-surface-variant mt-1">Ringkasan aktivitas dan pengajuan kredit E-SKKM periode ini.</p>
                </header>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] border-l-4 border-primary group hover:scale-[1.01] transition-all duration-300">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-primary/10 rounded-lg text-primary">
                                <span class="material-symbols-outlined">description</span>
                            </div>
                        </div>
                        <h3 class="text-on-surface-variant text-sm font-semibold mb-1">Total Sertifikat</h3>
                        <div class="flex items-baseline space-x-2">
                            <span class="text-4xl font-bold text-on-surface tracking-tighter">{{ $totalSertifikat }}</span>
                            <span class="text-outline text-sm font-medium">berkas</span>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] border-l-4 border-amber-500 group hover:scale-[1.01] transition-all duration-300">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-amber-500/10 rounded-lg text-amber-600">
                                <span class="material-symbols-outlined">pending_actions</span>
                            </div>
                            @if($totalPending > 0)
                            <span class="text-amber-600 text-xs font-bold bg-amber-100 px-2 py-1 rounded-full">Mendesak</span>
                            @endif
                        </div>
                        <h3 class="text-on-surface-variant text-sm font-semibold mb-1">Menunggu Persetujuan</h3>
                        <div class="flex items-baseline space-x-2">
                            <span class="text-4xl font-bold text-on-surface tracking-tighter">{{ $totalPending }}</span>
                            <span class="text-outline text-sm font-medium">antrean</span>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] border-l-4 border-tertiary group hover:scale-[1.01] transition-all duration-300">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-tertiary/10 rounded-lg text-tertiary">
                                <span class="material-symbols-outlined">cancel</span>
                            </div>
                        </div>
                        <h3 class="text-on-surface-variant text-sm font-semibold mb-1">Total Ditolak</h3>
                        <div class="flex items-baseline space-x-2">
                            <span class="text-4xl font-bold text-on-surface tracking-tighter">{{ $totalRejected }}</span>
                            <span class="text-outline text-sm font-medium">berkas</span>
                        </div>
                    </div>
                </div>

                <!-- Additional Stats Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-primary p-6 rounded-xl text-white shadow-xl shadow-primary/20">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="material-symbols-outlined text-2xl">event</span>
                            <h3 class="font-bold font-headline text-lg">Event Ormawa</h3>
                        </div>
                        <p class="text-4xl font-bold">{{ $totalEvents }}</p>
                        <p class="text-sm opacity-80 mt-1">Total event yang dibuat</p>
                    </div>
                    <div class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] border border-secondary/20">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="material-symbols-outlined text-2xl text-secondary">people</span>
                            <h3 class="font-bold font-headline text-lg text-on-surface">Total Peserta</h3>
                        </div>
                        <p class="text-4xl font-bold text-secondary">{{ $totalPesertaEvents }}</p>
                        <p class="text-sm text-on-surface-variant mt-1">Peserta dari semua event</p>
                    </div>
                </div>

                <!-- Sertifikat Terbaru Table -->
                <section class="bg-surface-container-lowest rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] overflow-hidden">
                    <div class="px-8 py-6 border-b border-outline-variant/10 flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-bold text-on-surface font-headline">Aktivitas Sertifikat Terbaru</h2>
                            <p class="text-sm text-outline">Daftar pengajuan SKKM mahasiswa terkini</p>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
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
                                        @if($sertifikat->status === 'approved')
                                            <span class="px-3 py-1 rounded-full font-bold bg-secondary-container text-on-secondary-container uppercase text-xs">Disetujui</span>
                                        @elseif($sertifikat->status === 'verified_bem')
                                            <span class="px-3 py-1 rounded-full font-bold bg-primary-fixed text-primary uppercase text-xs">Verif BEM</span>
                                        @elseif($sertifikat->status === 'pending')
                                            <span class="px-3 py-1 rounded-full font-bold bg-surface-container-high text-on-surface-variant uppercase text-xs">Menunggu</span>
                                        @elseif($sertifikat->status === 'rejected')
                                            <span class="px-3 py-1 rounded-full font-bold bg-error-container text-on-error-container uppercase text-xs">Ditolak</span>
                                        @endif
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
            </div>
        </main>
    </div>

    <!-- Mobile Navigation -->
    <nav class="md:hidden fixed bottom-0 left-0 right-0 bg-white shadow-[0_-4px_16px_rgba(0,0,0,0.05)] z-50 flex justify-around items-center h-16 px-4">
        <a class="flex flex-col items-center space-y-1 text-primary" href="{{ route('ormawa.dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="text-[10px] font-bold">Dasbor</span>
        </a>
        <form action="{{ route('logout.admin') }}" method="POST" class="flex flex-col items-center space-y-1">
            @csrf
            <button type="submit" class="flex flex-col items-center text-slate-400">
                <span class="material-symbols-outlined">logout</span>
                <span class="text-[10px] font-medium">Keluar</span>
            </button>
        </form>
    </nav>
</body>
</html>
