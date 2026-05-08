<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>E-SKKM - Dashboard Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet" />
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
                "primary-fixed": "#d3e4ff", "secondary-fixed": "#98f994",
                "tertiary-fixed": "#ffdad6",
            },
            fontFamily: { headline: ["Manrope"], body: ["Inter"], label: ["Inter"] }
        }}}
    </script>
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3 { font-family: 'Manrope', sans-serif; }
    </style>
</head>

<body class="bg-surface text-on-surface">
    <!-- TopNavBar -->
    <nav class="fixed top-0 w-full z-50 bg-[#f6fafe]/80 backdrop-blur-md flex justify-between items-center px-8 h-16 shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
        <div class="flex items-center gap-8">
            <span class="font-bold text-[#005ea4] text-xl tracking-tight" style="font-family:'Manrope'">E-SKKM</span>
            <div class="hidden md:flex gap-6 text-sm font-semibold" style="font-family:'Manrope'">
                <a class="text-[#005ea4] font-bold border-b-2 border-[#005ea4] pb-1" href="{{ route('mahasiswa.dashboard') }}">Beranda</a>
                <a class="text-slate-500 hover:text-[#005ea4] transition-colors" href="{{ route('panduan') }}">Panduan</a>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <div class="text-right hidden sm:block">
                <p class="text-xs font-bold text-on-surface">{{ $mahasiswa->nama }}</p>
                <p class="text-[10px] text-on-surface-variant">{{ $mahasiswa->nim }}</p>
            </div>
        </div>
    </nav>

    <div class="flex pt-16">
        <!-- Sidebar -->
        <aside class="hidden md:flex h-[calc(100vh-64px)] w-64 fixed left-0 top-16 bg-[#f0f4f8] flex-col p-6 gap-2">
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-white">
                        <span class="material-symbols-outlined">school</span>
                    </div>
                    <div>
                        <p class="font-bold text-[#005ea4] text-sm leading-tight" style="font-family:'Manrope'">Portal Mahasiswa</p>
                        <p class="text-xs text-slate-500">Sistem Kredit Kegiatan</p>
                    </div>
                </div>
            </div>
            <nav class="flex-1 space-y-1">
                <a class="flex items-center gap-3 px-4 py-3 bg-white text-[#005ea4] rounded-xl shadow-sm font-semibold transition-all"
                    href="{{ route('mahasiswa.dashboard') }}">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-white/50 rounded-xl transition-all"
                    href="{{ route('sertifikat.create') }}">
                    <span class="material-symbols-outlined">cloud_upload</span>
                    <span class="text-sm font-medium">Upload Sertifikat</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-white/50 rounded-xl transition-all"
                    href="{{ route('sertifikat.index') }}">
                    <span class="material-symbols-outlined">assignment</span>
                    <span class="text-sm font-medium">List Sertifikat</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-white/50 rounded-xl transition-all"
                    href="{{ route('panduan') }}">
                    <span class="material-symbols-outlined">menu_book</span>
                    <span class="text-sm font-medium">Panduan</span>
                </a>
            </nav>
            <div class="mt-auto space-y-4">
                <form action="{{ route('logout') }}" method="POST">
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
                        <h1 class="text-3xl font-bold tracking-tight text-on-surface">Selamat datang, {{ $mahasiswa->nama }}!</h1>
                        <p class="text-on-surface-variant mt-1">Berikut adalah ringkasan capaian SKKM Anda.</p>
                    </div>
                    <a href="{{ route('sertifikat.create') }}"
                        class="px-5 py-2.5 bg-primary text-white font-semibold rounded-lg flex items-center gap-2 hover:opacity-90 transition-all shadow-lg shadow-primary/20">
                        <span class="material-symbols-outlined text-sm">add</span>
                        Upload Sertifikat
                    </a>
                </header>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-primary-container p-6 rounded-xl text-on-primary-container flex flex-col justify-between h-40 shadow-sm">
                        <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">stars</span>
                        <div>
                            <p class="text-sm font-medium opacity-80">Total Poin SKKM</p>
                            <p class="text-4xl font-bold">{{ $totalPoin }}</p>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-between h-40 shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                        <div class="flex justify-between items-start">
                            <span class="material-symbols-outlined text-3xl text-primary">pending_actions</span>
                            <span class="text-xs font-semibold px-2 py-1 bg-surface-container text-on-surface-variant rounded-full">Proses</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-on-surface-variant">Verifikasi Tertunda</p>
                            <p class="text-3xl font-bold">{{ $totalPending }}</p>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-between h-40 shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                        <div class="flex justify-between items-start">
                            <span class="material-symbols-outlined text-3xl text-secondary">verified</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-on-surface-variant">Aktivitas Disetujui</p>
                            <p class="text-3xl font-bold">{{ $totalApproved }}</p>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-between h-40 shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                        <div class="flex justify-between items-start">
                            <span class="material-symbols-outlined text-3xl text-tertiary">cancel</span>
                            @if($totalRejected > 0)
                            <span class="text-xs font-semibold px-2 py-1 bg-error-container/30 text-on-error-container rounded-full">Revisi</span>
                            @endif
                        </div>
                        <div>
                            <p class="text-sm font-medium text-on-surface-variant">Aktivitas Ditolak</p>
                            <p class="text-3xl font-bold">{{ $totalRejected }}</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Progress Per Bidang -->
                    <div class="lg:col-span-1 space-y-6">
                        <div class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                            <h3 class="text-lg font-bold mb-6 text-on-surface">Progres Per Bidang</h3>
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

                    <!-- Sertifikat Terakhir & Event -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Sertifikat Terbaru -->
                        <div class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-lg font-bold text-on-surface">Pengajuan Terakhir</h3>
                                <a href="{{ route('sertifikat.index') }}" class="text-primary text-sm font-semibold flex items-center gap-1 hover:underline">
                                    Lihat Semua
                                    <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                </a>
                            </div>
                            <div class="space-y-3">
                                @forelse($recentSertifikats as $s)
                                <div class="flex items-center justify-between p-4 rounded-xl border border-outline-variant/10 hover:bg-primary/5 transition-all">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-bold text-on-surface truncate">{{ $s->nama_kegiatan }}</p>
                                        <p class="text-xs text-on-surface-variant">{{ $s->kedudukan?->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-' }} • {{ $s->created_at->format('d M Y') }}</p>
                                    </div>
                                    <div class="flex items-center gap-3 ml-4">
                                        <span class="text-sm font-bold text-primary">{{ $s->bobot_snapshot }} poin</span>
                                        @if($s->status === 'approved')
                                            <span class="px-2 py-1 bg-secondary-container text-on-secondary-container text-[10px] font-bold rounded-full uppercase">Disetujui</span>
                                        @elseif($s->status === 'verified_bem')
                                            <span class="px-2 py-1 bg-primary-fixed text-primary text-[10px] font-bold rounded-full uppercase">Verif BEM</span>
                                        @elseif($s->status === 'pending')
                                            <span class="px-2 py-1 bg-surface-container-high text-on-surface-variant text-[10px] font-bold rounded-full uppercase">Pending</span>
                                        @elseif($s->status === 'rejected')
                                            <span class="px-2 py-1 bg-error-container text-on-error-container text-[10px] font-bold rounded-full uppercase">Ditolak</span>
                                        @endif
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

                        <!-- Event Terbaru -->
                        <div class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                            <h3 class="text-lg font-bold text-on-surface mb-6">Informasi Acara Terbaru</h3>
                            <div class="space-y-4">
                                @forelse($events as $event)
                                <div class="group flex gap-5 p-4 rounded-xl border border-outline-variant/10 hover:border-primary/30 hover:bg-primary/5 transition-all">
                                    <div class="flex-1">
                                        <div class="flex justify-between items-start mb-1">
                                            <h4 class="font-bold text-on-surface group-hover:text-primary transition-colors">{{ $event->nama_event }}</h4>
                                            @if($event->status_event === 'akan_datang')
                                            <span class="text-[10px] font-bold px-2 py-0.5 bg-secondary-container text-on-secondary-container rounded-full">Coming Soon</span>
                                            @elseif($event->status_event === 'berlangsung')
                                            <span class="text-[10px] font-bold px-2 py-0.5 bg-primary-container text-on-primary-container rounded-full">Berlangsung</span>
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
            </div>
        </main>
    </div>

    <!-- Mobile Navigation -->
    <nav class="md:hidden fixed bottom-0 left-0 right-0 bg-white shadow-[0_-2px_10px_rgba(0,0,0,0.05)] h-16 flex items-center justify-around z-50">
        <a class="flex flex-col items-center text-primary" href="{{ route('mahasiswa.dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="text-[10px] font-bold">Dasbor</span>
        </a>
        <a class="flex flex-col items-center text-slate-400" href="{{ route('sertifikat.index') }}">
            <span class="material-symbols-outlined">assignment</span>
            <span class="text-[10px] font-medium">Sertifikat</span>
        </a>
        <div class="relative -top-6">
            <a href="{{ route('sertifikat.create') }}" class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center shadow-lg shadow-primary/40">
                <span class="material-symbols-outlined">add</span>
            </a>
        </div>
        <a class="flex flex-col items-center text-slate-400" href="{{ route('panduan') }}">
            <span class="material-symbols-outlined">menu_book</span>
            <span class="text-[10px] font-medium">Panduan</span>
        </a>
        <form action="{{ route('logout') }}" method="POST" class="flex flex-col items-center">
            @csrf
            <button type="submit" class="flex flex-col items-center text-slate-400">
                <span class="material-symbols-outlined">logout</span>
                <span class="text-[10px] font-medium">Keluar</span>
            </button>
        </form>
    </nav>
</body>
</html>
