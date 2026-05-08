<!DOCTYPE html>
<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Upload Sertifikat - E-SKKM</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "on-primary-fixed": "#001c38",
                        "background": "#f6fafe",
                        "surface-bright": "#f6fafe",
                        "on-tertiary": "#ffffff",
                        "surface-container": "#eaeef2",
                        "tertiary-fixed": "#ffdad6",
                        "on-surface": "#171c1f",
                        "inverse-on-surface": "#edf1f5",
                        "surface-tint": "#0060a8",
                        "on-error": "#ffffff",
                        "error": "#ba1a1a",
                        "outline-variant": "#c0c7d4",
                        "on-error-container": "#93000a",
                        "tertiary-fixed-dim": "#ffb4ac",
                        "tertiary-container": "#db322f",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-low": "#f0f4f8",
                        "surface-container-high": "#e4e9ed",
                        "on-primary": "#ffffff",
                        "tertiary": "#b7131a",
                        "secondary-fixed-dim": "#7ddc7a",
                        "primary": "#005ea4",
                        "outline": "#707783",
                        "on-secondary-fixed": "#002204",
                        "surface-variant": "#dfe3e7",
                        "on-tertiary-fixed-variant": "#93000d",
                        "on-secondary": "#ffffff",
                        "on-primary-container": "#fdfcff",
                        "on-primary-fixed-variant": "#004881",
                        "inverse-primary": "#a2c9ff",
                        "secondary-fixed": "#98f994",
                        "on-tertiary-container": "#fffbff",
                        "on-secondary-container": "#0c7521",
                        "secondary-container": "#98f994",
                        "on-secondary-fixed-variant": "#005313",
                        "on-background": "#171c1f",
                        "secondary": "#006e1c",
                        "surface": "#f6fafe",
                        "primary-fixed-dim": "#a2c9ff",
                        "primary-fixed": "#d3e4ff",
                        "error-container": "#ffdad6",
                        "surface-dim": "#d6dade",
                        "primary-container": "#0077ce",
                        "surface-container-highest": "#dfe3e7",
                        "on-tertiary-fixed": "#410002",
                        "on-surface-variant": "#404752",
                        "inverse-surface": "#2c3134"
                    },
                    borderRadius: {
                        DEFAULT: "0.25rem",
                        lg: "0.5rem",
                        xl: "0.75rem",
                        full: "9999px"
                    },
                    fontFamily: {
                        headline: ["Manrope"],
                        body: ["Inter"],
                        label: ["Inter"]
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3,
        .headline {
            font-family: 'Manrope', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Safe area untuk iPhone notch/home indicator */
        .pb-safe {
            padding-bottom: env(safe-area-inset-bottom, 1rem);
        }

        .bottom-nav {
            padding-bottom: env(safe-area-inset-bottom, 0);
        }

        /* Transisi platform button */
        .platform-btn {
            transition: all 0.2s ease;
        }

        .platform-btn.active {
            border-color: #005ea4;
            background-color: rgba(0, 94, 164, 0.07);
            color: #005ea4;
        }

        .platform-btn.inactive {
            border-color: rgba(192, 199, 212, 0.5);
            color: #404752;
        }

        /* Input focus ring lebih tebal di mobile (lebih mudah terlihat) */
        @media (max-width: 768px) {

            input:focus,
            select:focus {
                outline: none;
                box-shadow: 0 0 0 3px rgba(0, 94, 164, 0.15);
            }
        }

        /* Animasi masuk form card */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-in {
            animation: slideUp 0.35s ease both;
        }

        /* Step indicator number */
        .step-num {
            width: 2rem;
            height: 2rem;
            border-radius: 0.5rem;
            background: #005ea4;
            color: #fff;
            font-size: 0.75rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(0, 94, 164, 0.25);
        }
    </style>
</head>

<body class="bg-background text-on-surface min-h-screen">

    {{-- ===== TOP NAVBAR ===== --}}
    <nav
        class="fixed top-0 w-full z-50 bg-[#f6fafe]/90 backdrop-blur-md flex justify-between items-center px-4 md:px-8 h-14 md:h-16 shadow-[0_2px_20px_rgba(23,28,31,0.07)]">
        <div class="flex items-center gap-4 md:gap-8">
            <span class="font-bold text-[#005ea4] text-lg md:text-xl tracking-tight"
                style="font-family:Manrope">E-SKKM</span>
            {{-- Nav links: hanya desktop --}}
            <div class="hidden md:flex gap-6 text-sm font-semibold" style="font-family:Manrope">
                <a class="text-slate-500 hover:text-[#005ea4] transition-colors"
                    href="{{ route('mahasiswa.dashboard') }}">Beranda</a>
                <a class="text-[#005ea4] font-bold border-b-2 border-[#005ea4] pb-1"
                    href="{{ route('sertifikat.create') }}">Upload</a>
                <a class="text-slate-500 hover:text-[#005ea4] transition-colors"
                    href="{{ route('panduan') }}">Panduan</a>
            </div>
        </div>
        <div class="flex items-center gap-2 md:gap-4">
            {{-- Tombol notif: sembunyikan di mobile kecil --}}
            <button class="hidden sm:flex p-2 text-slate-500 hover:bg-slate-100/60 rounded-lg transition-all">
                <span class="material-symbols-outlined text-xl">notifications</span>
            </button>
            {{-- Nama singkat di mobile --}}
            <div class="text-right hidden sm:block">
                <p class="text-xs font-bold text-on-surface">{{ $mahasiswa->nama ?? 'Mahasiswa' }}</p>
                <p class="text-[10px] text-on-surface-variant">{{ $mahasiswa->nim ?? '' }}</p>
            </div>
            <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-white text-xs font-bold">
                {{ strtoupper(substr($mahasiswa->nama ?? 'M', 0, 1)) }}
            </div>
        </div>
    </nav>

    {{-- ===== LAYOUT WRAPPER ===== --}}
    {{-- pt-14 mobile, pt-16 desktop; pb-20 mobile (untuk bottom nav) --}}
    <div class="flex pt-14 md:pt-16 min-h-screen pb-20 md:pb-0">

        {{-- ===== SIDEBAR (tablet ke atas) ===== --}}
        <aside
            class="hidden md:flex h-[calc(100vh-64px)] w-56 lg:w-64 fixed left-0 top-16 bg-[#f0f4f8] flex-col p-4 lg:p-6 gap-2 z-40 shrink-0">
            <div class="mb-6 lg:mb-8">
                <div class="flex items-center gap-3 mb-2">
                    <div
                        class="w-9 h-9 lg:w-10 lg:h-10 bg-primary rounded-xl flex items-center justify-center text-white shrink-0">
                        <span class="material-symbols-outlined text-lg">school</span>
                    </div>
                    <div class="min-w-0">
                        <p class="font-bold text-[#005ea4] text-xs lg:text-sm leading-tight truncate"
                            style="font-family:Manrope">Portal Mahasiswa</p>
                        <p class="text-[10px] lg:text-xs text-slate-500">Sistem Kredit Kegiatan</p>
                    </div>
                </div>
            </div>

            <nav class="flex-1 space-y-1">
                <a class="flex items-center gap-3 px-3 lg:px-4 py-2.5 lg:py-3 text-slate-600 hover:bg-white/50 rounded-xl transition-all"
                    href="{{ route('mahasiswa.dashboard') }}">
                    <span class="material-symbols-outlined text-xl">dashboard</span>
                    <span class="text-xs lg:text-sm font-medium">Dashboard</span>
                </a>
                <a class="flex items-center gap-3 px-3 lg:px-4 py-2.5 lg:py-3 bg-white text-[#005ea4] rounded-xl shadow-sm font-semibold transition-all"
                    href="{{ route('sertifikat.create') }}">
                    <span class="material-symbols-outlined text-xl">cloud_upload</span>
                    <span class="text-xs lg:text-sm font-medium">Upload Sertifikat</span>
                </a>
                <a class="flex items-center gap-3 px-3 lg:px-4 py-2.5 lg:py-3 text-slate-600 hover:bg-white/50 rounded-xl transition-all"
                    href="{{ route('sertifikat.index') }}">
                    <span class="material-symbols-outlined text-xl">assignment</span>
                    <span class="text-xs lg:text-sm font-medium">List Sertifikat</span>
                </a>
                <a class="flex items-center gap-3 px-3 lg:px-4 py-2.5 lg:py-3 text-slate-600 hover:bg-white/50 rounded-xl transition-all"
                    href="{{ route('panduan') }}">
                    <span class="material-symbols-outlined text-xl">menu_book</span>
                    <span class="text-xs lg:text-sm font-medium">Panduan</span>
                </a>
            </nav>

            <div class="mt-auto">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 px-3 lg:px-4 py-2.5 lg:py-3 text-tertiary hover:bg-error-container/20 rounded-xl transition-all">
                        <span class="material-symbols-outlined text-xl">logout</span>
                        <span class="text-xs lg:text-sm font-medium">Keluar</span>
                    </button>
                </form>
            </div>
        </aside>

        {{-- ===== MAIN CONTENT ===== --}}
        {{-- ml-56 tablet, ml-64 desktop --}}
        <main class="flex-1 md:ml-56 lg:ml-64 min-w-0 w-full">
            <div class="p-4 sm:p-6 lg:p-8 max-w-7xl mx-auto">

                {{-- ===== HEADER ===== --}}
                <div class="mb-6 md:mb-8 animate-in">
                    {{-- Breadcrumb mobile --}}
                    <div class="flex items-center gap-2 text-xs text-on-surface-variant mb-3 md:hidden">
                        <a href="{{ route('mahasiswa.dashboard') }}"
                            class="hover:text-primary transition-colors">Dashboard</a>
                        <span class="material-symbols-outlined text-xs">chevron_right</span>
                        <span class="text-primary font-semibold">Upload Sertifikat</span>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                        <div>
                            <h2 class="text-xl sm:text-2xl md:text-[1.75rem] font-bold text-on-surface leading-tight"
                                style="font-family:Manrope">
                                Upload Sertifikat
                            </h2>
                            <p class="text-on-surface-variant mt-1 text-sm">
                                Unggah bukti kegiatan untuk validasi SKKM Anda.
                            </p>
                        </div>
                        {{-- Tombol kembali di mobile --}}
                        <a href="{{ route('mahasiswa.dashboard') }}"
                            class="sm:hidden self-start flex items-center gap-1.5 text-sm text-primary font-semibold">
                            <span class="material-symbols-outlined text-base">arrow_back</span>
                            Kembali
                        </a>
                    </div>
                </div>

                {{-- Validasi & Success alerts --}}
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-xl animate-in">
                        <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div
                        class="mb-4 p-4 bg-green-50 border border-green-200 rounded-xl flex items-start gap-3 animate-in">
                        <span class="material-symbols-outlined text-green-600 shrink-0">check_circle</span>
                        <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                    </div>
                @endif

                {{-- ===== FORM LAYOUT =====
                     Mobile: 1 kolom (semua stack)
                     Tablet (md): 1 kolom, info panel atas
                     Desktop (lg): 2 kolom (5+7)
                --}}
                <form action="{{ route('sertifikat.store') }}" method="POST" enctype="multipart/form-data"
                    id="form-upload">
                    @csrf

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 md:gap-6 lg:gap-8">

                        {{-- ===== KOLOM KIRI: Info Panel ===== --}}
                        <div class="lg:col-span-5 flex flex-col gap-4 md:gap-5 animate-in"
                            style="animation-delay:0.05s">

                            {{-- Info card ringkas — tampil di semua ukuran --}}
                            <div class="bg-white rounded-2xl p-5 md:p-6 border border-outline-variant/20 shadow-sm">
                                <h4 class="text-sm font-bold mb-4 flex items-center gap-2" style="font-family:Manrope">
                                    <span class="material-symbols-outlined text-[#005ea4] text-lg">lightbulb</span>
                                    Panduan Upload
                                </h4>
                                <ul class="space-y-3">
                                    <li class="flex items-start gap-3">
                                        <span
                                            class="material-symbols-outlined text-secondary text-lg mt-0.5 shrink-0">check_circle</span>
                                        <span class="text-xs sm:text-sm text-on-surface-variant">Pastikan <strong>nama
                                                lengkap</strong> dan <strong>tanggal kegiatan</strong> terlihat
                                            jelas.</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span
                                            class="material-symbols-outlined text-secondary text-lg mt-0.5 shrink-0">check_circle</span>
                                        <span class="text-xs sm:text-sm text-on-surface-variant">Sertifikat tingkat
                                            <strong>nasional</strong> bernilai minimal 10 poin.</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span
                                            class="material-symbols-outlined text-secondary text-lg mt-0.5 shrink-0">check_circle</span>
                                        <span class="text-xs sm:text-sm text-on-surface-variant">Kegiatan organisasi
                                            berlaku untuk <strong>1 semester</strong>.</span>
                                    </li>
                                    <li class="flex items-start gap-3">
                                        <span
                                            class="material-symbols-outlined text-[#005ea4] text-lg mt-0.5 shrink-0">info</span>
                                        <span class="text-xs sm:text-sm text-on-surface-variant">Gunakan link
                                            <strong>Google Drive</strong> atau <strong>OneDrive</strong> yang bisa
                                            diakses publik.</span>
                                    </li>
                                </ul>
                            </div>

                            {{-- Visual ilustrasi upload — hanya lg ke atas --}}
                            <div
                                class="hidden lg:flex bg-surface-container-lowest rounded-2xl overflow-hidden flex-col shadow-sm border border-outline-variant/10 flex-1">
                                <div
                                    class="flex-1 flex flex-col items-center justify-center p-8 border-2 border-dashed border-outline-variant/30 m-4 rounded-xl bg-surface-container-low/30 text-center">
                                    <div
                                        class="w-16 h-16 bg-[#005ea4]/10 rounded-2xl flex items-center justify-center mb-5 text-[#005ea4]">
                                        <span class="material-symbols-outlined text-4xl">insert_link</span>
                                    </div>
                                    <h3 class="text-base font-semibold mb-2" style="font-family:Manrope">Tautkan
                                        Sertifikat</h3>
                                    <p class="text-xs text-on-surface-variant max-w-[220px] leading-relaxed">Bagikan
                                        link dari Google Drive atau OneDrive Anda</p>
                                    <div class="mt-6 flex gap-2 items-center">
                                        <div
                                            class="flex items-center gap-1.5 px-3 py-1.5 bg-white rounded-full border border-outline-variant/30 text-xs text-on-surface-variant">
                                            <span class="w-2 h-2 rounded-full bg-[#34a853]"></span>Google Drive
                                        </div>
                                        <div
                                            class="flex items-center gap-1.5 px-3 py-1.5 bg-white rounded-full border border-outline-variant/30 text-xs text-on-surface-variant">
                                            <span class="w-2 h-2 rounded-full bg-[#0078d4]"></span>OneDrive
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-[#005ea4]/5 px-6 py-4 flex items-start gap-3">
                                    <span
                                        class="material-symbols-outlined text-[#005ea4] text-lg mt-0.5 shrink-0">security</span>
                                    <p class="text-xs text-on-primary-fixed-variant leading-relaxed">Pastikan file
                                        dapat diakses oleh siapapun yang memiliki link sebelum submit.</p>
                                </div>
                            </div>

                            {{-- Progress indikator step — tablet & mobile, horizontal --}}
                            <div class="lg:hidden bg-white rounded-2xl p-4 border border-outline-variant/20 shadow-sm">
                                <p class="text-xs font-bold text-on-surface-variant uppercase tracking-widest mb-3">
                                    Langkah Pengisian</p>
                                <div class="flex items-center gap-0">
                                    <div class="flex items-center gap-2">
                                        <div
                                            class="w-7 h-7 rounded-lg bg-[#005ea4] flex items-center justify-center text-white text-xs font-bold shrink-0">
                                            1</div>
                                        <span
                                            class="text-xs font-semibold text-on-surface hidden sm:block">Detail</span>
                                    </div>
                                    <div class="flex-1 h-px bg-outline-variant/40 mx-2"></div>
                                    <div class="flex items-center gap-2">
                                        <div
                                            class="w-7 h-7 rounded-lg bg-[#005ea4] flex items-center justify-center text-white text-xs font-bold shrink-0">
                                            2</div>
                                        <span
                                            class="text-xs font-semibold text-on-surface hidden sm:block">Klasifikasi</span>
                                    </div>
                                    <div class="flex-1 h-px bg-outline-variant/40 mx-2"></div>
                                    <div class="flex items-center gap-2">
                                        <div
                                            class="w-7 h-7 rounded-lg bg-[#005ea4] flex items-center justify-center text-white text-xs font-bold shrink-0">
                                            3</div>
                                        <span class="text-xs font-semibold text-on-surface hidden sm:block">Link</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ===== KOLOM KANAN: Form ===== --}}
                        <div class="lg:col-span-7 animate-in" style="animation-delay:0.1s">
                            <div
                                class="bg-white rounded-2xl p-5 sm:p-6 md:p-8 shadow-sm border border-outline-variant/10 space-y-7 md:space-y-8">

                                {{-- ===== SECTION 1: Detail Kegiatan ===== --}}
                                <div class="space-y-5">
                                    <div class="flex items-center gap-3">
                                        <div class="step-num">1</div>
                                        <div>
                                            <h3 class="text-sm sm:text-base font-bold text-on-surface"
                                                style="font-family:Manrope">Detail Kegiatan</h3>
                                            <p class="text-xs text-on-surface-variant mt-0.5">Informasi dasar tentang
                                                kegiatan</p>
                                        </div>
                                    </div>

                                    {{-- Nama aktivitas - full width --}}
                                    <div>
                                        <label
                                            class="block text-[0.65rem] sm:text-[0.6875rem] font-bold text-on-surface-variant uppercase tracking-widest mb-2">
                                            Nama Aktivitas / Sertifikat <span class="text-error">*</span>
                                        </label>
                                        <input name="nama_kegiatan" value="{{ old('nama_kegiatan') }}"
                                            type="text" required
                                            placeholder="Contoh: Juara 1 Lomba Karya Tulis Ilmiah"
                                            class="w-full bg-surface-container-lowest border border-outline-variant/30 focus:border-[#005ea4] focus:ring-2 focus:ring-[#005ea4]/15 rounded-xl py-3 sm:py-3.5 px-4 text-sm placeholder:text-outline/50 transition-all outline-none" />
                                    </div>

                                    {{-- Bidang + Sub Kegiatan: 1 kolom mobile, 2 kolom sm+ --}}
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
                                        <div>
                                            <label
                                                class="block text-[0.65rem] sm:text-[0.6875rem] font-bold text-on-surface-variant uppercase tracking-widest mb-2">
                                                Bidang Kegiatan <span class="text-error">*</span>
                                            </label>
                                            <div class="relative">
                                                <select id="bidang_kegiatan" required
                                                    class="w-full bg-surface-container-lowest border border-outline-variant/30 focus:border-[#005ea4] focus:ring-2 focus:ring-[#005ea4]/15 rounded-xl py-3 sm:py-3.5 px-4 text-sm appearance-none transition-all outline-none">
                                                    <option disabled selected value="">Pilih Bidang</option>
                                                    @foreach ($bidangKegiatans as $bidang)
                                                        <option value="{{ $bidang->id }}">
                                                            {{ $bidang->nama_bidang }}</option>
                                                    @endforeach
                                                </select>
                                                <span
                                                    class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline pointer-events-none text-lg">expand_more</span>
                                            </div>
                                        </div>

                                        <div>
                                            <label
                                                class="block text-[0.65rem] sm:text-[0.6875rem] font-bold text-on-surface-variant uppercase tracking-widest mb-2">
                                                Sub Kegiatan <span class="text-error">*</span>
                                            </label>
                                            <div class="relative">
                                                <select id="sub_kegiatan" required disabled
                                                    class="w-full bg-surface-container-lowest border border-outline-variant/30 focus:border-[#005ea4] focus:ring-2 focus:ring-[#005ea4]/15 rounded-xl py-3 sm:py-3.5 px-4 text-sm appearance-none transition-all outline-none disabled:opacity-50 disabled:cursor-not-allowed">
                                                    <option disabled selected value="">Pilih Bidang dulu</option>
                                                </select>
                                                <span
                                                    class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline pointer-events-none text-lg">expand_more</span>
                                            </div>
                                        </div>

                                        <div>
                                            <label
                                                class="block text-[0.65rem] sm:text-[0.6875rem] font-bold text-on-surface-variant uppercase tracking-widest mb-2">
                                                Penyelenggara <span class="text-error">*</span>
                                            </label>
                                            <input name="penyelenggara" value="{{ old('penyelenggara') }}"
                                                type="text" required placeholder="Contoh: Himpunan Mahasiswa"
                                                class="w-full bg-surface-container-lowest border border-outline-variant/30 focus:border-[#005ea4] focus:ring-2 focus:ring-[#005ea4]/15 rounded-xl py-3 sm:py-3.5 px-4 text-sm placeholder:text-outline/50 transition-all outline-none" />
                                        </div>

                                        <div>
                                            <label
                                                class="block text-[0.65rem] sm:text-[0.6875rem] font-bold text-on-surface-variant uppercase tracking-widest mb-2">
                                                Tanggal Pelaksanaan <span class="text-error">*</span>
                                            </label>
                                            <input name="tanggal_kegiatan" value="{{ old('tanggal_kegiatan') }}"
                                                type="date" required
                                                class="w-full bg-surface-container-lowest border border-outline-variant/30 focus:border-[#005ea4] focus:ring-2 focus:ring-[#005ea4]/15 rounded-xl py-3 sm:py-3.5 px-4 text-sm transition-all outline-none" />
                                        </div>
                                    </div>
                                </div>

                                <div class="h-px bg-surface-container-high"></div>

                                {{-- ===== SECTION 2: Klasifikasi Poin ===== --}}
                                <div class="space-y-5">
                                    <div class="flex items-center gap-3">
                                        <div class="step-num">2</div>
                                        <div>
                                            <h3 class="text-sm sm:text-base font-bold text-on-surface"
                                                style="font-family:Manrope">Klasifikasi Poin</h3>
                                            <p class="text-xs text-on-surface-variant mt-0.5">Kedudukan dan tingkat
                                                kegiatan</p>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
                                        <div>
                                            <label
                                                class="block text-[0.65rem] sm:text-[0.6875rem] font-bold text-on-surface-variant uppercase tracking-widest mb-2">
                                                Kedudukan / Peran <span class="text-error">*</span>
                                            </label>
                                            <div class="relative">
                                                <select id="kedudukan" name="kedudukan_id" required disabled
                                                    class="w-full bg-surface-container-lowest border border-outline-variant/30 focus:border-[#005ea4] focus:ring-2 focus:ring-[#005ea4]/15 rounded-xl py-3 sm:py-3.5 px-4 text-sm appearance-none transition-all outline-none disabled:opacity-50 disabled:cursor-not-allowed">
                                                    <option disabled selected value="">Pilih Sub Kegiatan dulu
                                                    </option>
                                                </select>
                                                <span
                                                    class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline pointer-events-none text-lg">expand_more</span>
                                            </div>
                                        </div>

                                        <div id="tingkat_wrapper">
                                            <label
                                                class="block text-[0.65rem] sm:text-[0.6875rem] font-bold text-on-surface-variant uppercase tracking-widest mb-2">Tingkat</label>
                                            <div class="relative">
                                                <select id="tingkat" name="tingkat"
                                                    class="w-full bg-surface-container-lowest border border-outline-variant/30 focus:border-[#005ea4] focus:ring-2 focus:ring-[#005ea4]/15 rounded-xl py-3 sm:py-3.5 px-4 text-sm appearance-none transition-all outline-none">
                                                    <option value="perguruan_tinggi">Perguruan Tinggi</option>
                                                    <option value="regional">Regional</option>
                                                    <option value="nasional">Nasional</option>
                                                    <option value="internasional">Internasional</option>
                                                </select>
                                                <span
                                                    class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-outline pointer-events-none text-lg">expand_more</span>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Estimasi Bobot --}}
                                    <div id="estimasi_bobot"
                                        class="hidden bg-secondary/5 rounded-2xl p-4 sm:p-5 border border-secondary/15
                                               flex flex-row items-center justify-between gap-4">
                                        <div class="flex items-center gap-3 sm:gap-4">
                                            <div
                                                class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary shrink-0">
                                                <span
                                                    class="material-symbols-outlined text-xl sm:text-2xl">calculate</span>
                                            </div>
                                            <div>
                                                <p
                                                    class="text-[10px] font-bold text-on-surface-variant uppercase tracking-wider">
                                                    Estimasi Poin</p>
                                                <p id="bobot_value"
                                                    class="text-xl sm:text-2xl font-bold text-secondary"
                                                    style="font-family:Manrope">0 Poin</p>
                                            </div>
                                        </div>
                                        <p
                                            class="text-[10px] text-on-surface-variant text-right max-w-[120px] leading-tight hidden sm:block">
                                            Skor final ditentukan validator berdasarkan bukti dokumen.</p>
                                    </div>
                                </div>

                                <div class="h-px bg-surface-container-high"></div>

                                {{-- ===== SECTION 3: Link Sertifikat ===== --}}
                                <div class="space-y-4 sm:space-y-5">
                                    <div class="flex items-center gap-3">
                                        <div class="step-num">3</div>
                                        <div>
                                            <h3 class="text-sm sm:text-base font-bold text-on-surface"
                                                style="font-family:Manrope">Link Sertifikat</h3>
                                            <p class="text-xs text-on-surface-variant mt-0.5">Tautkan file dari cloud
                                                storage</p>
                                        </div>
                                    </div>

                                    {{-- Pilihan platform: full width di mobile, auto di sm+ --}}
                                    <div class="grid grid-cols-2 sm:flex sm:flex-row gap-3">
                                        <button type="button" onclick="setPlatform('drive')" id="btn_drive"
                                            class="platform-btn active flex items-center justify-center sm:justify-start gap-2 px-3 sm:px-4 py-2.5 sm:py-2 rounded-xl border-2 text-sm font-semibold">
                                            {{-- Google Drive icon --}}
                                            <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M4.648 13.5l-2.648 4.5h15.852l2.648-4.5z" opacity=".3" />
                                                <path d="M7.648 4.5l-5 8.5 2.648 0 5-8.5z" opacity=".5" />
                                                <path d="M16.352 4.5h-8.704l-2.648 4.5h8.704z" />
                                                <path d="M18.352 13.5h-13.704l2.648 4.5h13.704z" />
                                                <path d="M13.648 4.5l5 8.5-2.648 0-5-8.5z" opacity=".7" />
                                            </svg>
                                            <span class="text-xs sm:text-sm">Google Drive</span>
                                        </button>

                                        <button type="button" onclick="setPlatform('onedrive')" id="btn_onedrive"
                                            class="platform-btn inactive flex items-center justify-center sm:justify-start gap-2 px-3 sm:px-4 py-2.5 sm:py-2 rounded-xl border-2 text-sm font-semibold">
                                            {{-- OneDrive icon --}}
                                            <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M10.5 13.5H19c1.93 0 3.5-1.57 3.5-3.5S20.93 6.5 19 6.5c-.16 0-.31.01-.46.03A5.5 5.5 0 003.5 8.5C3.5 8.67 3.5 8.84 3.52 9A4 4 0 005.5 16.5H10v-3z"
                                                    opacity=".5" />
                                                <path d="M10.5 13.5v3H19a3 3 0 000-6H10.5z" />
                                            </svg>
                                            <span class="text-xs sm:text-sm">OneDrive</span>
                                        </button>
                                    </div>

                                    {{-- Input URL --}}
                                    <div>
                                        <label
                                            class="block text-[0.65rem] sm:text-[0.6875rem] font-bold text-on-surface-variant uppercase tracking-widest mb-2">
                                            URL Sertifikat <span class="text-error">*</span>
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3.5 sm:pl-4 flex items-center pointer-events-none">
                                                <span
                                                    class="material-symbols-outlined text-outline text-lg sm:text-xl">link</span>
                                            </div>
                                            <input type="url" name="link_sertifikat" id="link_sertifikat"
                                                value="{{ old('link_sertifikat') }}" required
                                                placeholder="https://drive.google.com/file/d/..."
                                                class="w-full pl-10 sm:pl-12 pr-4 py-3 sm:py-3.5 bg-surface-container-lowest border border-outline-variant/30 focus:border-[#005ea4] focus:ring-2 focus:ring-[#005ea4]/15 rounded-xl text-sm placeholder:text-outline/50 transition-all outline-none" />
                                        </div>
                                        {{-- Error validasi link --}}
                                        <p id="link_error"
                                            class="hidden mt-2 text-xs text-error flex items-center gap-1">
                                            <span class="material-symbols-outlined text-sm">error</span>
                                            Link tidak valid. Gunakan link Google Drive atau OneDrive yang bisa diakses
                                            publik.
                                        </p>
                                    </div>

                                    <input type="hidden" name="platform_sertifikat" id="platform_sertifikat"
                                        value="drive" />

                                    {{-- Panduan dinamis --}}
                                    <div id="panduan_link"
                                        class="p-3.5 sm:p-4 bg-surface-container-low rounded-xl text-xs text-on-surface-variant leading-relaxed">
                                        <p class="font-semibold text-on-surface flex items-center gap-1.5 mb-2">
                                            <span class="material-symbols-outlined text-sm text-[#005ea4]">info</span>
                                            Cara mendapatkan link Google Drive:
                                        </p>
                                        <ol class="list-decimal list-inside space-y-1 ml-1">
                                            <li>Buka Google Drive → klik kanan file sertifikat</li>
                                            <li>Pilih <strong>"Share"</strong> → <strong>"Copy link"</strong></li>
                                            <li>Ubah akses ke <strong>"Anyone with the link"</strong></li>
                                            <li>Tempel link di kolom di atas</li>
                                        </ol>
                                    </div>
                                </div>

                                {{-- ===== SUBMIT ===== --}}
                                {{-- Sticky di mobile, normal di desktop --}}
                                <div class="pt-2">
                                    {{-- Desktop/tablet: tombol di dalam card --}}
                                    <div class="hidden sm:flex gap-3 justify-end">
                                        <a href="{{ route('mahasiswa.dashboard') }}"
                                            class="px-6 py-3 text-sm font-semibold text-on-surface-variant bg-surface-container rounded-xl hover:bg-surface-container-high transition-all">
                                            Batal
                                        </a>
                                        <button type="submit"
                                            class="px-8 py-3 text-sm font-semibold text-white bg-gradient-to-br from-[#005ea4] to-[#0077ce] rounded-xl shadow-lg shadow-[#005ea4]/25 hover:shadow-[#005ea4]/40 hover:-translate-y-0.5 active:translate-y-0 transition-all flex items-center gap-2">
                                            <span class="material-symbols-outlined text-base">send</span>
                                            Daftarkan Sertifikat
                                        </button>
                                    </div>
                                </div>

                            </div>{{-- end card --}}
                        </div>{{-- end kolom kanan --}}

                    </div>{{-- end grid --}}

                    {{-- ===== TOMBOL SUBMIT STICKY MOBILE ===== --}}
                    {{-- Hanya tampil di mobile (< sm), melekat di atas bottom nav --}}
                    <div
                        class="sm:hidden fixed bottom-16 left-0 right-0 z-40 px-4 pb-2 bg-gradient-to-t from-background via-background/95 to-transparent pt-4">
                        <button type="submit"
                            class="w-full py-3.5 text-sm font-bold text-white bg-gradient-to-r from-[#005ea4] to-[#0077ce] rounded-xl shadow-xl shadow-[#005ea4]/30 active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-base">send</span>
                            Daftarkan Sertifikat
                        </button>
                    </div>

                </form>{{-- end form --}}

            </div>{{-- end container --}}
        </main>
    </div>

    {{-- ===== BOTTOM NAVIGATION MOBILE ===== --}}
    <nav
        class="md:hidden fixed bottom-0 left-0 right-0 bg-white/95 backdrop-blur-sm shadow-[0_-1px_12px_rgba(0,0,0,0.07)] h-16 flex items-center justify-around z-50 bottom-nav">
        <a class="flex flex-col items-center gap-0.5 text-slate-400 hover:text-primary transition-colors"
            href="{{ route('mahasiswa.dashboard') }}">
            <span class="material-symbols-outlined text-[22px]">dashboard</span>
            <span class="text-[10px] font-medium">Dasbor</span>
        </a>
        <a class="flex flex-col items-center gap-0.5 text-slate-400 hover:text-primary transition-colors"
            href="{{ route('sertifikat.index') }}">
            <span class="material-symbols-outlined text-[22px]">assignment</span>
            <span class="text-[10px] font-medium">Sertifikat</span>
        </a>
        {{-- Tombol upload aktif (halaman ini) --}}
        <div class="relative -top-5">
            <div
                class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center shadow-lg shadow-primary/40 ring-4 ring-white">
                <span class="material-symbols-outlined text-xl">cloud_upload</span>
            </div>
        </div>
        <a class="flex flex-col items-center gap-0.5 text-slate-400 hover:text-primary transition-colors"
            href="{{ route('panduan') }}">
            <span class="material-symbols-outlined text-[22px]">menu_book</span>
            <span class="text-[10px] font-medium">Panduan</span>
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex flex-col items-center gap-0.5 text-slate-400">
                <span class="material-symbols-outlined text-[22px]">logout</span>
                <span class="text-[10px] font-medium">Keluar</span>
            </button>
        </form>
    </nav>

    {{-- Dekoratif background (hanya desktop, tidak ganggu mobile) --}}
    <div
        class="hidden lg:block fixed bottom-0 right-0 w-[400px] h-[400px] bg-[#005ea4]/4 rounded-full blur-[100px] -z-10 translate-x-1/2 translate-y-1/2 pointer-events-none">
    </div>
    <div
        class="hidden lg:block fixed top-0 right-0 w-[300px] h-[300px] bg-secondary/4 rounded-full blur-[80px] -z-10 pointer-events-none">
    </div>
    <script>
        // ===== Elemen =====
        const bidangEl = document.getElementById('bidang_kegiatan');
        const subEl = document.getElementById('sub_kegiatan');
        const kedudukanEl = document.getElementById('kedudukan');
        const tingkatEl = document.getElementById('tingkat');
        const tingkatWrapper = document.getElementById('tingkat_wrapper');
        const estimasiEl = document.getElementById('estimasi_bobot');
        const bobotVal = document.getElementById('bobot_value');
        const linkInput = document.getElementById('link_sertifikat');
        const linkError = document.getElementById('link_error');
        const panduan = document.getElementById('panduan_link');
        let currentHasTingkat = true;

        // ===== Panduan per platform =====
        const panduanText = {
            drive: `
    <p class="font-semibold text-on-surface flex items-center gap-1.5 mb-2">
        <span class="material-symbols-outlined text-sm text-[#005ea4]">info</span>
        Cara mendapatkan link Google Drive:
    </p>
    <ol class="list-decimal list-inside space-y-1 ml-1">
        <li>Buka Google Drive → klik kanan file sertifikat</li>
        <li>Pilih <strong>"Share"</strong> → <strong>"Copy link"</strong></li>
        <li>Ubah akses ke <strong>"Anyone with the link"</strong></li>
        <li>Tempel link di kolom di atas</li>
    </ol>`,
            onedrive: `
    <p class="font-semibold text-on-surface flex items-center gap-1.5 mb-2">
        <span class="material-symbols-outlined text-sm text-[#005ea4]">info</span>
        Cara mendapatkan link OneDrive:
    </p>
    <ol class="list-decimal list-inside space-y-1 ml-1">
        <li>Buka OneDrive → klik kanan file sertifikat</li>
        <li>Pilih <strong>"Share"</strong></li>
        <li>Pastikan siapapun dengan link bisa melihat</li>
        <li>Klik <strong>"Copy Link"</strong> dan tempel di atas</li>
    </ol>`
        };

        // ===== Toggle platform =====
        function setPlatform(platform) {
            document.getElementById('platform_sertifikat').value = platform;
            linkInput.placeholder = platform === 'drive' ?
                'https://drive.google.com/file/d/...' :
                'https://1drv.ms/... atau https://onedrive.live.com/...';
            panduan.innerHTML = panduanText[platform];
            const btnDrive = document.getElementById('btn_drive');
            const btnOnedrive = document.getElementById('btn_onedrive');
            if (platform === 'drive') {
                btnDrive.classList.replace('inactive', 'active');
                btnOnedrive.classList.replace('active', 'inactive');
            } else {
                btnOnedrive.classList.replace('inactive', 'active');
                btnDrive.classList.replace('active', 'inactive');
            }
            linkError.classList.add('hidden');
            linkInput.classList.remove('border-error');
        }

        // ===== Validasi link =====
        function validateLink(val) {
            if (!val) return true;
            const platform = document.getElementById('platform_sertifikat').value;
            if (platform === 'drive') {
                return val.includes('drive.google.com') || val.includes('docs.google.com');
            } else {
                return val.includes('1drv.ms') || val.includes('onedrive.live.com') || val.includes('sharepoint.com');
            }
        }

        linkInput.addEventListener('blur', function() {
            const ok = validateLink(this.value);
            linkError.classList.toggle('hidden', ok);
            this.classList.toggle('border-error', !ok);
            this.classList.toggle('border-outline-variant/30', ok);
        });

        linkInput.addEventListener('input', function() {
            if (!linkError.classList.contains('hidden')) {
                linkError.classList.add('hidden');
                this.classList.remove('border-error');
                this.classList.add('border-outline-variant/30');
            }
        });

        // ===== FIX: Handle tingkat saat pertama load =====
        // Pastikan tingkat punya name dari awal
        tingkatEl.setAttribute('name', 'tingkat');

        // ===== Cascade: Bidang → Sub Kegiatan =====
        bidangEl.addEventListener('change', async function() {
            const id = this.value;
            subEl.innerHTML = '<option disabled selected value="">Memuat...</option>';
            subEl.disabled = true;
            kedudukanEl.innerHTML = '<option disabled selected value="">Pilih Sub Kegiatan dulu</option>';
            kedudukanEl.disabled = true;
            estimasiEl.classList.add('hidden');

            // Reset tingkat ke default
            tingkatWrapper.style.display = '';
            tingkatEl.setAttribute('name', 'tingkat');
            currentHasTingkat = true;

            try {
                const res = await fetch(`/mahasiswa/api/sub-kegiatan/${id}`);
                const data = await res.json();
                subEl.innerHTML = '<option disabled selected value="">Pilih Sub Kegiatan</option>';
                data.forEach(s => {
                    subEl.innerHTML +=
                        `<option value="${s.id}" data-has-tingkat="${s.has_tingkat}">${s.nama_sub_kegiatan}</option>`;
                });
                subEl.disabled = false;
            } catch (e) {
                subEl.innerHTML = '<option disabled selected value="">Gagal memuat, coba lagi</option>';
            }
        });

        // ===== Cascade: Sub Kegiatan → Kedudukan =====
        subEl.addEventListener('change', async function() {
            const id = this.value;
            const opt = this.options[this.selectedIndex];
            currentHasTingkat = opt.dataset.hasTingkat === '1' 
                 || opt.dataset.hasTingkat === 'true';

            // FIX: tampilkan/sembunyikan tingkat + atur name
            tingkatWrapper.style.display = currentHasTingkat ? '' : 'none';
            if (!currentHasTingkat) {
                tingkatEl.value = '';
                tingkatEl.removeAttribute('name'); // tidak ikut terkirim ke server
            } else {
                tingkatEl.value = 'perguruan_tinggi'; // reset ke default
                tingkatEl.setAttribute('name', 'tingkat');
            }

            kedudukanEl.innerHTML = '<option disabled selected value="">Memuat...</option>';
            kedudukanEl.disabled = true;
            estimasiEl.classList.add('hidden');

            try {
                const res = await fetch(`/mahasiswa/api/kedudukan/${id}`);
                const data = await res.json();
                kedudukanEl.innerHTML = '<option disabled selected value="">Pilih Kedudukan</option>';
                data.forEach(k => {
                    kedudukanEl.innerHTML += `<option value="${k.id}">${k.nama_kedudukan}</option>`;
                });
                kedudukanEl.disabled = false;
            } catch (e) {
                kedudukanEl.innerHTML = '<option disabled selected value="">Gagal memuat</option>';
            }
        });

        // ===== FIX: Update estimasi bobot =====
        async function updateBobot() {
            const kid = kedudukanEl.value;
            if (!kid) return;

            // FIX: kalau has_tingkat=false, kirim tanpa tingkat di URL
            const tingkat = currentHasTingkat ? tingkatEl.value : null;
            const url = tingkat ?
                `/mahasiswa/api/bobot/${kid}/${tingkat}` :
                `/mahasiswa/api/bobot/${kid}`;

            try {
                const res = await fetch(url);
                const data = await res.json();
                if (data.length > 0) {
                    bobotVal.textContent = data[0].bobot + ' Poin';
                    estimasiEl.classList.remove('hidden');
                } else {
                    // FIX: sembunyikan estimasi kalau tidak ada data
                    estimasiEl.classList.add('hidden');
                }
            } catch (e) {
                /* silent */
            }
        }

        kedudukanEl.addEventListener('change', updateBobot);
        tingkatEl.addEventListener('change', updateBobot);

        // ===== Validasi form sebelum submit =====
        document.getElementById('form-upload').addEventListener('submit', function(e) {
            const ok = validateLink(linkInput.value);
            if (!ok) {
                e.preventDefault();
                linkError.classList.remove('hidden');
                linkInput.classList.add('border-error');
                linkInput.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        });
    </script>

</body>

</html>
