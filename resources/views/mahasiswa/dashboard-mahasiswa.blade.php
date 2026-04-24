<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Manrope:wght@600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "tertiary-fixed": "#ffdad6",
                        "surface-container-highest": "#dfe3e7",
                        "on-tertiary-fixed-variant": "#93000d",
                        "on-surface": "#171c1f",
                        "surface-container": "#eaeef2",
                        "tertiary": "#b7131a",
                        "outline-variant": "#c0c7d4",
                        "surface-container-high": "#e4e9ed",
                        "primary-fixed": "#d3e4ff",
                        "on-secondary-fixed": "#002204",
                        "on-primary-fixed-variant": "#004881",
                        "inverse-primary": "#a2c9ff",
                        "on-secondary-fixed-variant": "#005313",
                        "on-tertiary": "#ffffff",
                        "error": "#ba1a1a",
                        "on-background": "#171c1f",
                        "on-tertiary-container": "#fffbff",
                        "on-surface-variant": "#404752",
                        "on-primary-fixed": "#001c38",
                        "tertiary-fixed-dim": "#ffb4ac",
                        "inverse-on-surface": "#edf1f5",
                        "surface-dim": "#d6dade",
                        "primary-container": "#0077ce",
                        "error-container": "#ffdad6",
                        "on-secondary-container": "#0c7521",
                        "on-error": "#ffffff",
                        "secondary-fixed": "#98f994",
                        "outline": "#707783",
                        "secondary-fixed-dim": "#7ddc7a",
                        "secondary": "#006e1c",
                        "primary": "#005ea4",
                        "surface-container-lowest": "#ffffff",
                        "primary-fixed-dim": "#a2c9ff",
                        "surface": "#f6fafe",
                        "inverse-surface": "#2c3134",
                        "background": "#f6fafe",
                        "surface-variant": "#dfe3e7",
                        "on-secondary": "#ffffff",
                        "tertiary-container": "#db322f",
                        "on-tertiary-fixed": "#410002",
                        "surface-tint": "#0060a8",
                        "surface-bright": "#f6fafe",
                        "on-error-container": "#93000a",
                        "on-primary-container": "#fdfcff",
                        "on-primary": "#ffffff",
                        "surface-container-low": "#f0f4f8",
                        "secondary-container": "#98f994"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "fontFamily": {
                        "headline": ["Manrope"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3 {
            font-family: 'Manrope', sans-serif;
        }
    </style>
</head>

<body class="bg-surface text-on-surface">
    <!-- TopNavBar -->
    <nav
        class="fixed top-0 w-full z-50 bg-[#f6fafe]/80 dark:bg-slate-950/80 backdrop-blur-md flex justify-between items-center px-8 h-16 w-full shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
        <div class="flex items-center gap-8">
            <span class="font-manrope font-bold text-[#005ea4] dark:text-blue-400 text-xl tracking-tight">E-SKKM</span>
            <div class="hidden md:flex gap-6 font-manrope text-sm font-semibold">
                <a class="text-[#005ea4] font-bold border-b-2 border-[#005ea4] pb-1" href="#">Beranda</a>
                <a class="text-slate-500 hover:text-[#005ea4] transition-colors" href="#">Panduan</a>
                <a class="text-slate-500 hover:text-[#005ea4] transition-colors" href="#">FAQ</a>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <button class="p-2 text-slate-500 hover:bg-slate-100/50 rounded-lg transition-all">
                <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
            </button>
            <button class="p-2 text-slate-500 hover:bg-slate-100/50 rounded-lg transition-all">
                <span class="material-symbols-outlined" data-icon="help_outline">help_outline</span>
            </button>
            <img alt="Foto Profil Mahasiswa" class="w-8 h-8 rounded-full border-2 border-primary-container"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCv4MB192J79gCmbzz4pmR9UodhuTnaCHOOM2Emd7LpjQ9U9KvuYurqmdbJRzFBwOIom4QO5lGbkMFVtiVnv9snHZF6Jqj6OyUXSD4FAkczHTom5xSkprCs9QUGtxbk8D7wnb7wK-wHnsjsRUGccVEg3tfRch7WcIK1lqkFwzTpKkanDnUsPBPGBwbetpot_5KU9O37nfHnd7k0M8ZGHewHx4Ys89F1YirCD-6qMB5NVtQZYUa9woz7sM6pe0AL2aMGU8lkVOS9Dcc" />
        </div>
    </nav>
    <div class="flex pt-16">
        <!-- SideNavBar -->
        <aside class="hidden md:flex h-[calc(100vh-64px)] w-64 fixed left-0 top-16 bg-[#f0f4f8] flex-col p-6 gap-2">
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 bg-primary rounded-xl flex items-center justify-center text-white">
                        <span class="material-symbols-outlined" data-icon="school">school</span>
                    </div>
                    <div>
                        <p class="font-manrope font-bold text-[#005ea4] text-sm leading-tight">Portal Mahasiswa</p>
                        <p class="text-xs text-slate-500">Sistem Kredit Kegiatan</p>
                    </div>
                </div>
            </div>
            <nav class="flex-1 space-y-1">
                <a class="flex items-center gap-3 px-4 py-3 bg-white text-[#005ea4] rounded-xl shadow-sm font-semibold transition-all"
                    href={{ route('dashboard') }}>
                    <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                    <span class="font-inter text-sm font-medium">Dashboard</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-white/50 rounded-xl transition-all"
                    href={{ route('sertifikat.create') }}>
                    <span class="material-symbols-outlined" data-icon="cloud_upload">cloud_upload</span>
                    <span class="font-inter text-sm font-medium">Upload Sertifikat</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-white/50 rounded-xl transition-all"
                    href={{ route('sertifikat.show') }}>
                    <span class="material-symbols-outlined" data-icon="assignment">assignment</span>
                    <span class="font-inter text-sm font-medium">List Sertifikat</span>
                </a>
                <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-white/50 rounded-xl transition-all"
                    href="{{ route('panduan') }}">
                    <span class="material-symbols-outlined" data-icon="analytics">analytics</span>
                    <span class="font-inter text-sm font-medium">Panduan</span>
                </a>
            </nav>
            <div class="mt-auto space-y-4">
                {{-- <button
                    class="w-full py-3 px-4 bg-primary text-white rounded-xl text-sm font-semibold flex items-center justify-center gap-2 shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined text-sm" data-icon="support_agent">support_agent</span>
                    Bantuan Teknis
                </button> --}}
                <a class="flex items-center gap-3 px-4 py-3 text-tertiary hover:bg-error-container/20 rounded-xl transition-all"
                    href="#">
                    <span class="material-symbols-outlined" data-icon="logout">logout</span>
                    <span class="font-inter text-sm font-medium">Keluar</span>
                </a>
            </div>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 md:ml-64 p-8 min-h-screen">
            <div class="max-w-6xl mx-auto space-y-8">
                <!-- Welcome Section -->
                <header class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div>
                        <h1 class="text-3xl font-bold tracking-tight text-on-surface">Selamat datang kembali, Adrian!
                        </h1>
                        <p class="text-on-surface-variant mt-1">Berikut adalah ringkasan capaian SKKM Anda semester ini.
                        </p>
                    </div>
                    <div class="flex gap-3">
                        <button
                            class="px-5 py-2.5 bg-surface-container-lowest border border-outline-variant/15 text-primary font-semibold rounded-lg flex items-center gap-2 hover:bg-surface-container-low transition-all">
                            <span class="material-symbols-outlined" data-icon="download">download</span>
                            Unduh Sertifikat
                        </button>
                    </div>
                </header>
                <!-- Summary Grid (Bento Style) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div
                        class="bg-primary-container p-6 rounded-xl text-on-primary-container flex flex-col justify-between h-40 shadow-sm">
                        <span class="material-symbols-outlined text-3xl" data-icon="stars"
                            style="font-variation-settings: 'FILL' 1;">stars</span>
                        <div>
                            <p class="text-sm font-medium opacity-80">Total Poin SKKM</p>
                            <p class="text-4xl font-bold">145</p>
                        </div>
                    </div>
                    <div
                        class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-between h-40 shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                        <div class="flex justify-between items-start">
                            <span class="material-symbols-outlined text-3xl text-primary"
                                data-icon="pending_actions">pending_actions</span>
                            <span
                                class="text-xs font-semibold px-2 py-1 bg-surface-container text-on-surface-variant rounded-full">Proses</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-on-surface-variant">Verifikasi Tertunda</p>
                            <p class="text-3xl font-bold">12</p>
                        </div>
                    </div>
                    <div
                        class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-between h-40 shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                        <div class="flex justify-between items-start">
                            <span class="material-symbols-outlined text-3xl text-secondary"
                                data-icon="verified">verified</span>
                            <span
                                class="text-xs font-semibold px-2 py-1 bg-secondary-container/30 text-on-secondary-container rounded-full">+4
                                Baru</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-on-surface-variant">Aktivitas Disetujui</p>
                            <p class="text-3xl font-bold">24</p>
                        </div>
                    </div>
                    <div
                        class="bg-surface-container-lowest p-6 rounded-xl flex flex-col justify-between h-40 shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                        <div class="flex justify-between items-start">
                            <span class="material-symbols-outlined text-3xl text-tertiary"
                                data-icon="cancel">cancel</span>
                            <span
                                class="text-xs font-semibold px-2 py-1 bg-error-container/30 text-on-error-container rounded-full">Revisi</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-on-surface-variant">Aktivitas Ditolak</p>
                            <p class="text-3xl font-bold">3</p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Progress Requirements -->
                    <div class="lg:col-span-1 space-y-6">
                        <div
                            class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                            <h3 class="text-lg font-bold mb-6 text-on-surface">Progres Persyaratan</h3>
                            <div class="space-y-8">
                                <div>
                                    <div class="flex justify-between items-center mb-3">
                                        <span class="text-sm font-semibold text-on-surface">SKKM Wajib</span>
                                        <span class="text-sm font-bold text-primary">85/100</span>
                                    </div>
                                    <div class="h-4 bg-surface-container-highest rounded-full overflow-hidden">
                                        <div class="h-full bg-gradient-to-r from-primary to-primary-container rounded-full"
                                            style="width: 85%"></div>
                                    </div>
                                    <p class="text-[11px] text-on-surface-variant mt-2 font-medium">Sisa 15 poin untuk
                                        memenuhi syarat kelulusan.</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-3">
                                        <span class="text-sm font-semibold text-on-surface">SKKM Umum</span>
                                        <span class="text-sm font-bold text-secondary">60/50</span>
                                    </div>
                                    <div class="h-4 bg-surface-container-highest rounded-full overflow-hidden">
                                        <div class="h-full bg-gradient-to-r from-secondary to-secondary-container rounded-full"
                                            style="width: 100%"></div>
                                    </div>
                                    <p class="text-[11px] text-on-secondary-container mt-2 font-medium">Target
                                        terlampaui! Anda memiliki 10 poin ekstra.</p>
                                </div>
                            </div>
                            <button
                                class="w-full mt-8 py-3 text-sm font-bold text-primary border border-primary/20 rounded-lg hover:bg-primary/5 transition-all">
                                Lihat Detail Capaian
                            </button>
                        </div>
                        <div class="relative rounded-xl overflow-hidden group h-48">
                            <img alt="Panduan SKKM" class="w-full h-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZzL0PURvJqkScLYvsClRz9HnmOB0ROTxSp8bP2W7w2sTeuIp6fEbXvXvovmLsEHAuUlM5GXyT24mo2ySYdAFKnP1Ex5yMzJhrrKrS-Y3WGAdbhFGCmQDT73szABL5b_LRuG2cuX5tth0eXpWoBRm4BddA3Huch5UAzimPqGQcjZdEdmaMivh_SSbPJRVHY9FHbehXZnC0xPIT_R69HK_f_-o46VUpFu9U14f4fua-0nPPyt8I1CcLIWgZy_Sez1TyMQB--Dy-0p0" />
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-6 flex flex-col justify-end">
                                <p class="text-white font-bold text-lg">Bingung cara klaim poin?</p>
                                <p class="text-white/80 text-xs">Pelajari panduan lengkap pengisian SKKM terbaru.</p>
                            </div>
                        </div>
                    </div>
                    <!-- New Event Section -->
                    <div class="lg:col-span-2">
                        <div
                            class="bg-surface-container-lowest p-6 rounded-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-lg font-bold text-on-surface">Informasi Acara Terbaru</h3>
                                <button
                                    class="text-primary text-sm font-semibold flex items-center gap-1 hover:underline">
                                    Lihat Semua Acara
                                    <span class="material-symbols-outlined text-xs"
                                        data-icon="arrow_forward">arrow_forward</span>
                                </button>
                            </div>
                            <div class="space-y-4">
                                <div
                                    class="group flex gap-5 p-4 rounded-xl border border-outline-variant/10 hover:border-primary/30 hover:bg-primary/5 transition-all">
                                    <div
                                        class="flex-shrink-0 w-24 h-24 bg-surface-container-high rounded-lg overflow-hidden">
                                        <img alt="Event Image" class="w-full h-full object-cover"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAnp13pD5T1nB8jY0qD0Z-Y9x2B2h6gB1z9T7vC1R2S3T4u5V6w7X8y9z0" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex justify-between items-start mb-1">
                                            <h4
                                                class="font-bold text-on-surface group-hover:text-primary transition-colors">
                                                Workshop UX Design Modern 2024</h4>
                                            <span
                                                class="text-[10px] font-bold px-2 py-0.5 bg-secondary-container text-on-secondary-container rounded-full">Coming
                                                Soon</span>
                                        </div>
                                        <p class="text-xs text-primary font-semibold mb-2 flex items-center gap-1">
                                            <span class="material-symbols-outlined text-sm"
                                                data-icon="calendar_today">calendar_today</span>
                                            25 November 2023 • 09:00 WIB
                                        </p>
                                        <p class="text-sm text-on-surface-variant line-clamp-2 mb-3">Tingkatkan skill
                                            desain Anda dengan mempelajari framework UX terbaru langsung dari praktisi
                                            industri kreatif.</p>
                                        <a class="inline-flex items-center gap-1 text-xs font-bold text-primary hover:gap-2 transition-all"
                                            href="#">
                                            Info Acara Selengkapnya
                                            <span class="material-symbols-outlined text-sm"
                                                data-icon="chevron_right">chevron_right</span>
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="group flex gap-5 p-4 rounded-xl border border-outline-variant/10 hover:border-primary/30 hover:bg-primary/5 transition-all">
                                    <div
                                        class="flex-shrink-0 w-24 h-24 bg-surface-container-high rounded-lg overflow-hidden">
                                        <img alt="Event Image" class="w-full h-full object-cover"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCn-D1E2F3G4H5I6J7K8L9M0N1O2P3Q4R5S6T7U8V9W0X1Y2Z3" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex justify-between items-start mb-1">
                                            <h4
                                                class="font-bold text-on-surface group-hover:text-primary transition-colors">
                                                Lomba Inovasi Teknologi Tepat Guna</h4>
                                            <span
                                                class="text-[10px] font-bold px-2 py-0.5 bg-primary-container text-on-primary-container rounded-full">Sedang
                                                Berlangsung</span>
                                        </div>
                                        <p class="text-xs text-primary font-semibold mb-2 flex items-center gap-1">
                                            <span class="material-symbols-outlined text-sm"
                                                data-icon="calendar_today">calendar_today</span>
                                            15 - 30 November 2023
                                        </p>
                                        <p class="text-sm text-on-surface-variant line-clamp-2 mb-3">Tunjukkan ide
                                            kreatifmu dalam menciptakan solusi teknologi untuk membantu masyarakat
                                            pedesaan di Indonesia.</p>
                                        <a class="inline-flex items-center gap-1 text-xs font-bold text-primary hover:gap-2 transition-all"
                                            href="#">
                                            Info Acara Selengkapnya
                                            <span class="material-symbols-outlined text-sm"
                                                data-icon="chevron_right">chevron_right</span>
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="group flex gap-5 p-4 rounded-xl border border-outline-variant/10 hover:border-primary/30 hover:bg-primary/5 transition-all">
                                    <div
                                        class="flex-shrink-0 w-24 h-24 bg-surface-container-high rounded-lg overflow-hidden">
                                        <img alt="Event Image" class="w-full h-full object-cover"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuMn-E1F2G3H4I5J6K7L8M9N0O1P2Q3R4S5T6U7V8W9X0Y1Z2" />
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex justify-between items-start mb-1">
                                            <h4
                                                class="font-bold text-on-surface group-hover:text-primary transition-colors">
                                                Seminar Internasional: Future of AI</h4>
                                            <span
                                                class="text-[10px] font-bold px-2 py-0.5 bg-surface-container text-on-surface-variant rounded-full">Pendaftaran
                                                Dibuka</span>
                                        </div>
                                        <p class="text-xs text-primary font-semibold mb-2 flex items-center gap-1">
                                            <span class="material-symbols-outlined text-sm"
                                                data-icon="calendar_today">calendar_today</span>
                                            05 Desember 2023
                                        </p>
                                        <p class="text-sm text-on-surface-variant line-clamp-2 mb-3">Membahas dampak
                                            Artificial Intelligence terhadap lapangan pekerjaan di masa depan bersama
                                            pembicara dari Silicon Valley.</p>
                                        <a class="inline-flex items-center gap-1 text-xs font-bold text-primary hover:gap-2 transition-all"
                                            href="#">
                                            Info Acara Selengkapnya
                                            <span class="material-symbols-outlined text-sm"
                                                data-icon="chevron_right">chevron_right</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- Mobile Navigation -->
    <nav
        class="md:hidden fixed bottom-0 left-0 right-0 bg-white shadow-[0_-2px_10px_rgba(0,0,0,0.05)] h-16 flex items-center justify-around z-50">
        <a class="flex flex-col items-center text-primary" href="#">
            <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
            <span class="text-[10px] font-bold">Dasbor</span>
        </a>
        <a class="flex flex-col items-center text-slate-400" href="#">
            <span class="material-symbols-outlined" data-icon="assignment">assignment</span>
            <span class="text-[10px] font-medium">Kegiatan</span>
        </a>
        <div class="relative -top-6">
            <button
                class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center shadow-lg shadow-primary/40">
                <span class="material-symbols-outlined" data-icon="add">add</span>
            </button>
        </div>
        <a class="flex flex-col items-center text-slate-400" href="#">
            <span class="material-symbols-outlined" data-icon="analytics">analytics</span>
            <span class="text-[10px] font-medium">Rekap</span>
        </a>
        <a class="flex flex-col items-center text-slate-400" href="#">
            <span class="material-symbols-outlined" data-icon="account_circle">account_circle</span>
            <span class="text-[10px] font-medium">Profil</span>
        </a>
    </nav>
</body>

</html>
