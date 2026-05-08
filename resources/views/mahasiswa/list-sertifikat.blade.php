<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>List Sertifikat - E-SKKM</title>
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
                "primary-fixed": "#d3e4ff", "secondary-fixed": "#98f994",
                "tertiary-fixed": "#ffdad6",
            },
            fontFamily: { headline: ["Manrope"], body: ["Inter"], label: ["Inter"] }
        }}}
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .headline { font-family: 'Manrope', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
</head>

<body class="bg-background text-on-surface min-h-screen">
    <!-- TopNavBar -->
    <nav class="fixed top-0 w-full z-50 bg-[#f6fafe]/80 backdrop-blur-md flex justify-between items-center px-8 h-16 shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
        <div class="flex items-center gap-8">
            <span class="font-bold text-[#005ea4] text-xl tracking-tight" style="font-family:'Manrope'">E-SKKM</span>
        </div>
        <div class="flex items-center gap-4">
            <div class="text-right hidden sm:block">
                <p class="text-xs font-bold text-on-surface">{{ session('mahasiswa_nama') }}</p>
                <p class="text-[10px] text-on-surface-variant">{{ session('mahasiswa_nim') }}</p>
            </div>
        </div>
    </nav>

    <div class="flex pt-16 min-h-screen">
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
                <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-white/50 rounded-xl transition-all"
                    href="{{ route('mahasiswa.dashboard') }}">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-white/50 rounded-xl transition-all"
                    href="{{ route('sertifikat.create') }}">
                    <span class="material-symbols-outlined">cloud_upload</span>
                    <span class="text-sm font-medium">Upload Sertifikat</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 bg-white text-[#005ea4] rounded-xl shadow-sm font-semibold transition-all"
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
            <div class="mt-auto">
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
        <main class="flex-1 md:ml-64 min-w-0">
            <section class="p-4 lg:p-8 space-y-8">

                @if(session('success'))
                <div class="p-4 bg-green-50 border border-green-200 rounded-xl flex items-start gap-3">
                    <span class="material-symbols-outlined text-green-600">check_circle</span>
                    <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                </div>
                @endif

                <!-- Stats Header -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="col-span-1 md:col-span-2 bg-gradient-to-br from-primary to-primary-container
                                p-6 rounded-2xl text-white shadow-xl flex flex-col justify-between">
                        <div>
                            <p class="text-xs uppercase tracking-widest opacity-80 mb-1">Total Poin SKKM</p>
                            <h3 class="text-4xl lg:text-5xl font-bold headline">
                                {{ $totalPoin }}<span class="text-xl font-normal opacity-70 ml-2">poin</span>
                            </h3>
                        </div>
                        @php $targetPoin = 200; $pctPoin = $targetPoin > 0 ? min(100, round(($totalPoin / $targetPoin) * 100)) : 0; @endphp
                        <div class="mt-4">
                            <div class="w-full bg-white/20 h-2 rounded-full overflow-hidden">
                                <div class="bg-white h-full transition-all duration-500" style="width: {{ $pctPoin }}%"></div>
                            </div>
                            @if($totalPoin < $targetPoin)
                            <p class="text-[10px] mt-2 opacity-80 font-medium">Anda butuh {{ $targetPoin - $totalPoin }} poin lagi untuk syarat kelulusan.</p>
                            @else
                            <p class="text-[10px] mt-2 opacity-80 font-medium">✓ Target poin kelulusan tercapai!</p>
                            @endif
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest p-6 rounded-2xl flex flex-col justify-between border border-outline-variant/10 shadow-sm">
                        <div class="w-10 h-10 rounded-full bg-secondary-container/30 flex items-center justify-center mb-4">
                            <span class="material-symbols-outlined text-secondary">verified</span>
                        </div>
                        <div>
                            <p class="text-2xl font-bold headline">{{ $totalApproved }}</p>
                            <p class="text-xs text-outline font-semibold">Sertifikat Disetujui</p>
                        </div>
                    </div>
                    <div class="bg-surface-container-lowest p-6 rounded-2xl flex flex-col justify-between border border-outline-variant/10 shadow-sm">
                        <div class="w-10 h-10 rounded-full bg-tertiary-fixed/30 flex items-center justify-center mb-4">
                            <span class="material-symbols-outlined text-tertiary">hourglass_empty</span>
                        </div>
                        <div>
                            <p class="text-2xl font-bold headline">{{ $totalPending }}</p>
                            <p class="text-xs text-outline font-semibold">Dalam Antrean</p>
                        </div>
                    </div>
                </div>

                <!-- Riwayat Pengajuan -->
                <div class="space-y-4">
                    <h4 class="headline font-bold text-xl text-on-surface">Riwayat Pengajuan</h4>

                    @forelse($sertifikats as $sertifikat)
                    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/10 shadow-sm overflow-hidden hover:shadow-md transition-all">
                        <div class="p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start gap-3">
                                    <div class="flex-1 min-w-0">
                                        <h5 class="headline font-bold text-on-surface truncate">{{ $sertifikat->nama_kegiatan }}</h5>
                                        <p class="text-xs text-on-surface-variant mt-1">
                                            {{ $sertifikat->kedudukan?->subKegiatan?->bidangKegiatan?->nama_bidang ?? '-' }}
                                            • {{ $sertifikat->kedudukan?->nama_kedudukan ?? '' }}
                                        </p>
                                        <p class="text-xs text-outline mt-1 flex items-center gap-1">
                                            <span class="material-symbols-outlined text-[14px]">calendar_month</span>
                                            {{ $sertifikat->tanggal_kegiatan ? \Carbon\Carbon::parse($sertifikat->tanggal_kegiatan)->format('d M Y') : '-' }}
                                            @if($sertifikat->penyelenggara)
                                            <span class="mx-1">•</span> {{ $sertifikat->penyelenggara }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 flex-shrink-0">
                                <!-- Poin -->
                                <div class="text-right">
                                    <span class="text-lg font-bold {{ $sertifikat->status === 'approved' ? 'text-secondary' : ($sertifikat->status === 'rejected' ? 'text-tertiary' : 'text-primary') }}">
                                        {{ $sertifikat->status === 'approved' ? '+' : '' }}{{ $sertifikat->bobot_snapshot }}
                                    </span>
                                    <p class="text-[10px] text-outline">Poin</p>
                                </div>
                                <!-- Status Badge -->
                                @if($sertifikat->status === 'approved')
                                    <span class="px-3 py-1 bg-secondary-container text-on-secondary-container text-[10px] font-bold rounded-full uppercase flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                        Disetujui
                                    </span>
                                @elseif($sertifikat->status === 'verified_bem')
                                    <span class="px-3 py-1 bg-primary-fixed text-primary text-[10px] font-bold rounded-full uppercase flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[14px]">fact_check</span>
                                        Verif BEM
                                    </span>
                                @elseif($sertifikat->status === 'pending')
                                    <span class="px-3 py-1 bg-surface-container-high text-on-surface-variant text-[10px] font-bold rounded-full uppercase flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[14px]">schedule</span>
                                        Menunggu
                                    </span>
                                @elseif($sertifikat->status === 'rejected')
                                    <span class="px-3 py-1 bg-error-container text-on-error-container text-[10px] font-bold rounded-full uppercase flex items-center gap-1">
                                        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">cancel</span>
                                        Ditolak
                                    </span>
                                @endif
                                <!-- File link -->
                                @if($sertifikat->file_sertifikat)
                                <a href="{{ asset('storage/' . $sertifikat->file_sertifikat) }}" target="_blank"
                                    class="p-2 rounded-lg bg-surface-container-low text-primary hover:bg-primary hover:text-white transition-colors">
                                    <span class="material-symbols-outlined text-[18px]">visibility</span>
                                </a>
                                @endif
                            </div>
                        </div>
                        <!-- Rejection Reason -->
                        @if($sertifikat->status === 'rejected' && $sertifikat->catatan_reject)
                        <div class="px-5 pb-4">
                            <div class="p-3 bg-error-container/20 rounded-lg border border-error/10">
                                <p class="text-xs text-on-error-container leading-relaxed">
                                    <strong class="font-bold">Alasan Penolakan:</strong> {{ $sertifikat->catatan_reject }}
                                </p>
                            </div>
                        </div>
                        @endif
                        <!-- Status Tracker -->
                        <div class="px-5 pb-4">
                            <div class="flex items-center gap-2 text-[10px] font-semibold">
                                <div class="flex items-center gap-1 {{ in_array($sertifikat->status, ['pending', 'verified_bem', 'approved']) ? 'text-primary' : 'text-tertiary' }}">
                                    <span class="w-5 h-5 rounded-full {{ in_array($sertifikat->status, ['verified_bem', 'approved']) ? 'bg-primary text-white' : ($sertifikat->status === 'rejected' ? 'bg-tertiary text-white' : 'bg-primary/20 text-primary') }} flex items-center justify-center">
                                        @if(in_array($sertifikat->status, ['verified_bem', 'approved']))
                                        <span class="material-symbols-outlined text-[12px]" style="font-variation-settings: 'FILL' 1;">check</span>
                                        @elseif($sertifikat->status === 'rejected')
                                        <span class="material-symbols-outlined text-[12px]" style="font-variation-settings: 'FILL' 1;">close</span>
                                        @else
                                        1
                                        @endif
                                    </span>
                                    <span>Upload</span>
                                </div>
                                <div class="flex-1 h-0.5 {{ in_array($sertifikat->status, ['verified_bem', 'approved']) ? 'bg-primary' : 'bg-outline-variant/30' }}"></div>
                                <div class="flex items-center gap-1 {{ in_array($sertifikat->status, ['verified_bem', 'approved']) ? 'text-primary' : 'text-outline' }}">
                                    <span class="w-5 h-5 rounded-full {{ in_array($sertifikat->status, ['verified_bem', 'approved']) ? 'bg-primary text-white' : 'bg-outline-variant/20' }} flex items-center justify-center">
                                        @if(in_array($sertifikat->status, ['verified_bem', 'approved']))
                                        <span class="material-symbols-outlined text-[12px]" style="font-variation-settings: 'FILL' 1;">check</span>
                                        @else
                                        2
                                        @endif
                                    </span>
                                    <span>BEM</span>
                                </div>
                                <div class="flex-1 h-0.5 {{ $sertifikat->status === 'approved' ? 'bg-secondary' : 'bg-outline-variant/30' }}"></div>
                                <div class="flex items-center gap-1 {{ $sertifikat->status === 'approved' ? 'text-secondary' : 'text-outline' }}">
                                    <span class="w-5 h-5 rounded-full {{ $sertifikat->status === 'approved' ? 'bg-secondary text-white' : 'bg-outline-variant/20' }} flex items-center justify-center">
                                        @if($sertifikat->status === 'approved')
                                        <span class="material-symbols-outlined text-[12px]" style="font-variation-settings: 'FILL' 1;">check</span>
                                        @else
                                        3
                                        @endif
                                    </span>
                                    <span>Kemahasiswaan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/10 shadow-sm p-12 text-center">
                        <span class="material-symbols-outlined text-5xl text-outline/30">inbox</span>
                        <p class="headline font-bold text-on-surface mt-4">Belum Ada Sertifikat</p>
                        <p class="text-sm text-on-surface-variant mt-2">Mulai dengan mengunggah sertifikat kegiatan pertama Anda.</p>
                        <a href="{{ route('sertifikat.create') }}" class="inline-flex items-center gap-2 mt-4 px-5 py-2.5 bg-primary text-white font-semibold rounded-lg hover:opacity-90 transition-all shadow-lg shadow-primary/20">
                            <span class="material-symbols-outlined text-sm">add</span>
                            Upload Sertifikat
                        </a>
                    </div>
                    @endforelse
                </div>

            </section>
        </main>
    </div>
</body>
</html>