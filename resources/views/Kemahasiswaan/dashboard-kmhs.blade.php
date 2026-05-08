<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>E-SKKM Dashboard | Kemahasiswaan</title>
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
        h1, h2, h3, .font-headline, .font-manrope { font-family: 'Manrope', sans-serif; }
    </style>
</head>

<body class="bg-surface text-on-surface">
    <!-- TopNavBar -->
    <nav class="fixed top-0 w-full z-50 bg-[#f6fafe]/80 backdrop-blur-md flex justify-between items-center px-8 h-16 shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
        <div class="flex items-center gap-8">
            <span class="font-bold text-[#005ea4] text-xl tracking-tight font-headline">E-SKKM</span>
            <div class="hidden md:flex gap-6 text-sm font-semibold font-headline">
                <a class="text-[#005ea4] font-bold border-b-2 border-[#005ea4] pb-1" href="{{ route('kemahasiswaan.dashboard') }}">Dashboard</a>
                <a class="text-slate-500 hover:text-[#005ea4] transition-colors" href="{{ route('kemahasiswaan.verifikasi') }}">Verifikasi</a>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <div class="text-right hidden sm:block">
                <p class="text-xs font-bold text-on-surface">{{ Auth::user()->nama_pengguna }}</p>
                <p class="text-[10px] text-on-surface-variant uppercase tracking-wider">Kemahasiswaan</p>
            </div>
        </div>
    </nav>

    <div class="flex pt-16">
        <!-- Sidebar -->
        <aside class="hidden md:flex h-[calc(100vh-64px)] w-64 fixed left-0 top-16 bg-[#f0f4f8] flex-col p-6 gap-2">
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-white">
                        <span class="material-symbols-outlined">admin_panel_settings</span>
                    </div>
                    <div>
                        <p class="font-bold text-[#005ea4] text-sm leading-tight font-headline">Kemahasiswaan</p>
                        <p class="text-xs text-slate-500">Admin Portal</p>
                    </div>
                </div>
            </div>
            <nav class="flex-1 space-y-1">
                <a class="flex items-center gap-3 px-4 py-3 bg-white text-[#005ea4] rounded-xl shadow-sm font-semibold transition-all"
                    href="{{ route('kemahasiswaan.dashboard') }}">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="text-sm font-medium">Dasbor</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-white/50 rounded-xl transition-all"
                    href="{{ route('kemahasiswaan.verifikasi') }}">
                    <span class="material-symbols-outlined">fact_check</span>
                    <span class="text-sm font-medium">Form Verifikasi</span>
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

                @if(session('success'))
                <div class="p-4 bg-green-50 border border-green-200 rounded-xl flex items-start gap-3">
                    <span class="material-symbols-outlined text-green-600">check_circle</span>
                    <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                </div>
                @endif

                <!-- Welcome -->
                <header class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div>
                        <h1 class="text-3xl font-bold tracking-tight text-on-surface font-headline">Selamat Datang, {{ Auth::user()->nama_pengguna }}</h1>
                        <p class="text-on-surface-variant mt-1">Pantau dan verifikasi pencapaian kredit mahasiswa hari ini.</p>
                    </div>
                    <a href="{{ route('kemahasiswaan.verifikasi') }}"
                        class="px-5 py-2.5 bg-primary text-white font-semibold rounded-lg flex items-center gap-2 hover:opacity-90 shadow-lg shadow-primary/20 transition-all">
                        <span class="material-symbols-outlined text-sm">fact_check</span>
                        Buka Verifikasi
                    </a>
                </header>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-surface-container-lowest p-6 rounded-xl relative overflow-hidden group shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-primary/10 rounded-lg text-primary">
                                <span class="material-symbols-outlined">assignment</span>
                            </div>
                        </div>
                        <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-1">Total Pengajuan</p>
                        <h3 class="font-manrope text-3xl font-bold text-slate-900">{{ $totalApproved + $totalRejected + $totalPending }}</h3>
                        <div class="absolute bottom-0 left-0 w-full h-1 bg-primary/20">
                            <div class="h-full bg-primary" style="width: 75%"></div>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest p-6 rounded-xl relative overflow-hidden group shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-surface-container-high rounded-lg text-on-surface-variant">
                                <span class="material-symbols-outlined">pending_actions</span>
                            </div>
                            @if($totalVerifiedBem > 0)
                            <span class="text-xs font-bold text-tertiary">Mendesak</span>
                            @endif
                        </div>
                        <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-1">Menunggu Verifikasi Anda</p>
                        <h3 class="font-manrope text-3xl font-bold text-slate-900">{{ $totalVerifiedBem }}</h3>
                        <div class="absolute bottom-0 left-0 w-full h-1 bg-surface-container-high">
                            <div class="h-full bg-slate-400" style="width: {{ $totalVerifiedBem > 0 ? 33 : 0 }}%"></div>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest p-6 rounded-xl relative overflow-hidden group shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-secondary/10 rounded-lg text-secondary">
                                <span class="material-symbols-outlined">verified</span>
                            </div>
                            <span class="text-xs font-bold text-secondary">Selesai</span>
                        </div>
                        <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-1">Tervalidasi</p>
                        <h3 class="font-manrope text-3xl font-bold text-slate-900">{{ $totalApproved }}</h3>
                        <div class="absolute bottom-0 left-0 w-full h-1 bg-secondary/20">
                            @php $totalAll = $totalApproved + $totalRejected + $totalPending; @endphp
                            <div class="h-full bg-secondary" style="width: {{ $totalAll > 0 ? round(($totalApproved / $totalAll) * 100) : 0 }}%"></div>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest p-6 rounded-xl relative overflow-hidden group shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                        <div class="flex justify-between items-start mb-4">
                            <div class="p-3 bg-tertiary/10 rounded-lg text-tertiary">
                                <span class="material-symbols-outlined">cancel</span>
                            </div>
                        </div>
                        <p class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-1">Ditolak</p>
                        <h3 class="font-manrope text-3xl font-bold text-slate-900">{{ $totalRejected }}</h3>
                        <div class="absolute bottom-0 left-0 w-full h-1 bg-tertiary/20">
                            <div class="h-full bg-tertiary" style="width: {{ $totalAll > 0 ? round(($totalRejected / $totalAll) * 100) : 0 }}%"></div>
                        </div>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Table -->
                    <div class="lg:col-span-2">
                        <div class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                            <div class="px-6 py-5 border-b border-outline-variant/10 flex justify-between items-center">
                                <h2 class="font-manrope text-lg font-bold text-slate-900">Menunggu Verifikasi Anda</h2>
                                <a href="{{ route('kemahasiswaan.verifikasi') }}" class="text-sm font-semibold text-primary hover:underline">Lihat Semua</a>
                            </div>
                            <table class="w-full text-left border-collapse">
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

                    <!-- Side Info Card -->
                    <div class="space-y-6">
                        <div class="bg-primary p-6 rounded-2xl text-white shadow-xl shadow-primary/30 relative overflow-hidden">
                            <div class="relative z-10">
                                <h3 class="font-manrope text-xl font-bold mb-4">Statistik Mahasiswa</h3>
                                <div class="space-y-4">
                                    <div>
                                        <p class="text-xs font-medium opacity-80 mb-1">Total Mahasiswa Terdaftar</p>
                                        <p class="text-3xl font-bold">{{ $totalMahasiswa }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute -bottom-12 -right-12 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
                        </div>

                        <div class="bg-surface-container-lowest p-6 rounded-2xl shadow-sm border border-outline-variant/10">
                            <h3 class="font-manrope text-lg font-bold text-slate-900 mb-4">Alur Verifikasi</h3>
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
            </div>
        </main>
    </div>

    <!-- Mobile Nav -->
    <nav class="md:hidden fixed bottom-0 left-0 right-0 bg-white shadow-[0_-2px_10px_rgba(0,0,0,0.05)] h-16 flex items-center justify-around z-50">
        <a class="flex flex-col items-center text-primary" href="{{ route('kemahasiswaan.dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="text-[10px] font-bold">Dasbor</span>
        </a>
        <a class="flex flex-col items-center text-slate-400" href="{{ route('kemahasiswaan.verifikasi') }}">
            <span class="material-symbols-outlined">fact_check</span>
            <span class="text-[10px] font-medium">Verifikasi</span>
        </a>
        <form action="{{ route('logout.admin') }}" method="POST" class="flex flex-col items-center">
            @csrf
            <button type="submit" class="flex flex-col items-center text-slate-400">
                <span class="material-symbols-outlined">logout</span>
                <span class="text-[10px] font-medium">Keluar</span>
            </button>
        </form>
    </nav>
</body>
</html>
