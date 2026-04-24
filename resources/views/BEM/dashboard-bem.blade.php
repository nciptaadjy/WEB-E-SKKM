<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "secondary-fixed": "#98f994",
                        "on-secondary-container": "#0c7521",
                        "inverse-primary": "#a2c9ff",
                        "surface-variant": "#dfe3e7",
                        "tertiary-fixed": "#ffdad6",
                        "on-primary-fixed": "#001c38",
                        "surface-container-low": "#f0f4f8",
                        "on-background": "#171c1f",
                        "on-tertiary-fixed-variant": "#93000d",
                        "on-tertiary-fixed": "#410002",
                        "on-surface": "#171c1f",
                        "on-error-container": "#93000a",
                        "error-container": "#ffdad6",
                        "primary-fixed": "#d3e4ff",
                        "primary-container": "#0077ce",
                        "surface-container-high": "#e4e9ed",
                        "on-primary-fixed-variant": "#004881",
                        "secondary-fixed-dim": "#7ddc7a",
                        "on-secondary-fixed-variant": "#005313",
                        "tertiary": "#b7131a",
                        "surface-tint": "#0060a8",
                        "surface-bright": "#f6fafe",
                        "primary-fixed-dim": "#a2c9ff",
                        "outline": "#707783",
                        "on-secondary": "#ffffff",
                        "outline-variant": "#c0c7d4",
                        "background": "#f6fafe",
                        "primary": "#005ea4",
                        "inverse-on-surface": "#edf1f5",
                        "on-surface-variant": "#404752",
                        "surface": "#f6fafe",
                        "on-tertiary": "#ffffff",
                        "secondary": "#006e1c",
                        "on-primary-container": "#fdfcff",
                        "tertiary-container": "#db322f",
                        "surface-container": "#eaeef2",
                        "surface-container-highest": "#dfe3e7",
                        "secondary-container": "#98f994",
                        "surface-container-lowest": "#ffffff",
                        "on-tertiary-container": "#fffbff",
                        "inverse-surface": "#2c3134",
                        "surface-dim": "#d6dade",
                        "on-primary": "#ffffff",
                        "on-error": "#ffffff",
                        "tertiary-fixed-dim": "#ffb4ac",
                        "on-secondary-fixed": "#002204",
                        "error": "#ba1a1a"
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
            display: inline-block;
            line-height: 1;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3,
        .font-headline {
            font-family: 'Manrope', sans-serif;
        }
    </style>
</head>

<body class="bg-background text-on-background flex min-h-screen">
    <!-- SideNavBar Component -->
    <aside
        class="h-screen w-72 flex-col sticky left-0 top-0 bg-blue-50/80 backdrop-blur-xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] flex z-50">
        <div class="flex flex-col gap-2 p-4 h-full">
            <div class="px-4 py-8 mb-4">
                <div class="flex items-center gap-3">
                    <img alt="BEM Logo" class="w-12 h-12 rounded-xl object-cover"
                        data-alt="Official university student executive board crest in minimalist blue and white aesthetic"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcG0oW9v3K71EvdHa0cCiEUGKNbY4tcjYbryo8mCyhVHzxsgelbFd86PVT6Sq-FgQF5R70XodwaxiXYGc6gdtqkTPhVUzNuNYE578VbJvO2kCl4INeSSws6yqhEFy6VawLwrltDIdeVhLvxh4BBWj_e-JyHB9eDr4C-bc829EMQ9GEPpPp4AQUpHFSbMEHPesjhzbdLvZGjvI9NyV5taievG2CDcriCUdTCVZZiMtgc5wVb4TALZkF34wK04CA_pXras86capD6P8" />
                    <div class="flex flex-col">
                        <span class="text-2xl font-bold tracking-tight text-blue-800">E-SKKM</span>
                        <span class="text-xs font-semibold text-slate-500 uppercase tracking-widest">BEM
                            Dashboard</span>
                    </div>
                </div>
            </div>
            <nav class="flex-1 space-y-2">
                <a class="flex items-center gap-3 px-6 py-4 text-blue-700 font-bold bg-white/50 rounded-xl transition-all duration-200 active:scale-[0.98]"
                    href="#">
                    <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                    <span class="font-['Manrope'] font-semibold text-sm">Dasbor</span>
                </a>
                <a class="flex items-center gap-3 px-6 py-4 text-slate-500 font-medium hover:bg-white/30 transition-all duration-200 active:scale-[0.98]"
                    href="#">
                    <span class="material-symbols-outlined" data-icon="fact_check">fact_check</span>
                    <span class="font-['Manrope'] font-semibold text-sm">Form Verifikasi</span>
                </a>
            </nav>
            <div class="mt-auto p-4 bg-primary-container rounded-2xl text-on-primary-container">
                <p class="text-xs font-medium opacity-90 mb-3">Butuh bantuan administrasi?</p>
                <button
                    class="w-full bg-surface-container-lowest text-primary px-4 py-2 rounded-lg font-bold text-sm hover:bg-opacity-90 transition-all">
                    Ajukan Laporan
                </button>
            </div>
        </div>
    </aside>
    <div class="flex-1 flex flex-col">
        <!-- TopAppBar Component -->
        <header
            class="w-full sticky top-0 z-40 bg-white/70 backdrop-blur-md flex justify-between items-center px-8 py-4">
            <div class="flex items-center gap-4">
                <h1 class="text-xl font-extrabold text-blue-800 font-headline">E-SKKM BEM Dashboard</h1>
            </div>
            <div class="flex items-center gap-6">
                <div class="relative hidden lg:block">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline"
                        data-icon="search">search</span>
                    <input
                        class="pl-10 pr-4 py-2 bg-surface-container-low border-none rounded-full text-sm w-64 focus:ring-2 focus:ring-blue-500/20"
                        placeholder="Cari mahasiswa..." type="text" />
                </div>
                <div class="flex items-center gap-4">
                    <button
                        class="p-2 text-slate-500 hover:text-blue-600 transition-colors focus:ring-2 focus:ring-blue-500/20 rounded-full">
                        <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
                    </button>
                    <button
                        class="p-2 text-slate-500 hover:text-blue-600 transition-colors focus:ring-2 focus:ring-blue-500/20 rounded-full">
                        <span class="material-symbols-outlined" data-icon="settings">settings</span>
                    </button>
                    <div class="h-10 w-10 rounded-full overflow-hidden border-2 border-primary-fixed">
                        <img alt="Admin Profile" class="w-full h-full object-cover"
                            data-alt="Professional headshot of a student administrator in business casual attire with soft office lighting"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBYh8qdVeOhh711QVr5ZAaeRWGFZrtppLSguF2B3j9Fj_AfbbNFaaDxRvs1pmaXhqm7BsFXIW_XY6p5zgpoov3RNZcRwPbURV3wdHfDIRT-grg24WWAPyrWHatF9ZcVild88YxM5xXeVb_YyoZhbNXcjneM4LgI3OL_8a4kneMbkJVpIBSMBR5fGEy-Q8t5IpabVs8UB6FXMa6pgCO09OciIXJo8Fsub1v_TwZFs8u9BWo5srgETw3VpEULr1_-g5XCaNtxeP-Z6Ig" />
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content -->
        <main class="p-8 space-y-10">
            <!-- Hero Header Section -->
            <section class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div>
                    <h2 class="text-3xl font-bold font-headline tracking-tight text-on-surface">Halo, Admin BEM</h2>
                    <p class="text-on-surface-variant font-body">Selamat datang di pusat kurasi Satuan Kredit Kegiatan
                        Mahasiswa.</p>
                </div>
                <div
                    class="bg-surface-container-lowest p-2 rounded-xl flex items-center gap-2 shadow-[0_4px_20px_rgba(23,28,31,0.04)]">
                    <div class="bg-primary-fixed text-on-primary-fixed px-4 py-2 rounded-lg font-bold text-sm">
                        Semester Ganjil 2023/2024
                    </div>
                </div>
            </section>
            <!-- Bento Summary Cards -->
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Card 1: Total -->
                <div
                    class="bg-surface-container-lowest p-6 rounded-2xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] group hover:-translate-y-1 transition-transform duration-300">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-primary-fixed rounded-xl text-primary">
                            <span class="material-symbols-outlined" data-icon="folder_shared">folder_shared</span>
                        </div>
                        <span class="text-label-sm font-semibold text-secondary">+12% vs bln lalu</span>
                    </div>
                    <div class="space-y-1">
                        <p class="text-on-surface-variant text-sm font-medium">Total Pengajuan</p>
                        <h3 class="text-3xl font-bold text-on-surface">1,284</h3>
                    </div>
                </div>
                <!-- Card 2: Menunggu -->
                <div
                    class="bg-surface-container-lowest p-6 rounded-2xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] group hover:-translate-y-1 transition-transform duration-300">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-surface-container-high rounded-xl text-on-surface-variant">
                            <span class="material-symbols-outlined" data-icon="pending_actions">pending_actions</span>
                        </div>
                        <span class="text-label-sm font-semibold text-tertiary">Butuh Atensi</span>
                    </div>
                    <div class="space-y-1">
                        <p class="text-on-surface-variant text-sm font-medium">Menunggu</p>
                        <h3 class="text-3xl font-bold text-on-surface">86</h3>
                    </div>
                </div>
                <!-- Card 3: Tervalidasi -->
                <div
                    class="bg-surface-container-lowest p-6 rounded-2xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] group hover:-translate-y-1 transition-transform duration-300">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-secondary-container rounded-xl text-on-secondary-container">
                            <span class="material-symbols-outlined" data-icon="verified">verified</span>
                        </div>
                        <div class="w-16 h-2 bg-surface-container rounded-full overflow-hidden mt-3">
                            <div class="bg-secondary h-full w-[92%]"></div>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <p class="text-on-surface-variant text-sm font-medium">Tervalidasi</p>
                        <h3 class="text-3xl font-bold text-on-surface">1,142</h3>
                    </div>
                </div>
                <!-- Card 4: Permintaan -->
                <div
                    class="bg-surface-container-lowest p-6 rounded-2xl shadow-[0_12px_40px_rgba(23,28,31,0.06)] group hover:-translate-y-1 transition-transform duration-300">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-tertiary-fixed rounded-xl text-on-tertiary-fixed-variant">
                            <span class="material-symbols-outlined" data-icon="error_outline">error_outline</span>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <p class="text-on-surface-variant text-sm font-medium">Permintaan Perbaikan</p>
                        <h3 class="text-3xl font-bold text-on-surface">56</h3>
                    </div>
                </div>
            </section>
            <!-- Activity Table Section -->
            <section class="bg-surface-container-lowest rounded-[2rem] p-8 shadow-[0_12px_40px_rgba(23,28,31,0.06)]">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                    <div>
                        <h3 class="text-xl font-bold font-headline text-on-surface">Daftar Pengajuan Terbaru</h3>
                        <p class="text-on-surface-variant text-sm">Review dan validasi aktivitas mahasiswa hari ini.
                        </p>
                    </div>
                    <div class="flex items-center gap-3">
                        <button
                            class="flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold border border-outline-variant/30 text-on-surface hover:bg-surface-container-low transition-all">
                            <span class="material-symbols-outlined text-sm" data-icon="filter_list">filter_list</span>
                            Filter
                        </button>
                        <button
                            class="flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold bg-primary text-on-primary hover:opacity-90 transition-all">
                            Export Data
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="text-left border-b border-outline-variant/10">
                                <th
                                    class="pb-4 px-4 font-semibold text-xs text-on-surface-variant uppercase tracking-widest">
                                    Nama Mahasiswa</th>
                                <th
                                    class="pb-4 px-4 font-semibold text-xs text-on-surface-variant uppercase tracking-widest">
                                    Nama Kegiatan</th>
                                <th
                                    class="pb-4 px-4 font-semibold text-xs text-on-surface-variant uppercase tracking-widest text-center">
                                    Poin</th>
                                <th
                                    class="pb-4 px-4 font-semibold text-xs text-on-surface-variant uppercase tracking-widest">
                                    Status BEM</th>
                                <th
                                    class="pb-4 px-4 font-semibold text-xs text-on-surface-variant uppercase tracking-widest text-right">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-transparent">
                            <!-- Table Row 1 -->
                            <tr class="group hover:bg-surface-container-low transition-all">
                                <td class="py-5 px-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-primary-fixed-dim flex items-center justify-center text-xs font-bold text-on-primary-fixed-variant">
                                            AR
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-on-surface">Aditya Rizky</p>
                                            <p class="text-[0.6875rem] text-on-surface-variant">21081010123</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-5 px-4">
                                    <p class="text-sm font-medium text-on-surface">Ketua Pelaksana Seminar Nasional
                                        Tech-Next</p>
                                    <p class="text-[0.6875rem] text-on-surface-variant">Kepemimpinan &amp; Organisasi
                                    </p>
                                </td>
                                <td class="py-5 px-4 text-center">
                                    <span class="text-sm font-bold text-primary">15.0</span>
                                </td>
                                <td class="py-5 px-4">
                                    <span
                                        class="px-3 py-1 bg-surface-container-high text-on-surface-variant rounded-full text-[0.6875rem] font-bold tracking-wider">MENUNGGU</span>
                                </td>
                                <td class="py-5 px-4 text-right">
                                    <button class="text-primary font-bold text-sm hover:underline">Verifikasi</button>
                                </td>
                            </tr>
                            <!-- Table Row 2 -->
                            <tr class="group hover:bg-surface-container-low transition-all">
                                <td class="py-5 px-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-secondary-fixed-dim flex items-center justify-center text-xs font-bold text-on-secondary-fixed-variant">
                                            SP
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-on-surface">Siti Putri</p>
                                            <p class="text-[0.6875rem] text-on-surface-variant">22081010045</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-5 px-4">
                                    <p class="text-sm font-medium text-on-surface">Juara 1 Lomba Debat Bahasa Inggris
                                    </p>
                                    <p class="text-[0.6875rem] text-on-surface-variant">Prestasi &amp; Kompetisi</p>
                                </td>
                                <td class="py-5 px-4 text-center">
                                    <span class="text-sm font-bold text-primary">20.0</span>
                                </td>
                                <td class="py-5 px-4">
                                    <span
                                        class="px-3 py-1 bg-secondary-container text-on-secondary-container rounded-full text-[0.6875rem] font-bold tracking-wider">VALIDASI</span>
                                </td>
                                <td class="py-5 px-4 text-right">
                                    <button class="text-primary font-bold text-sm hover:underline">Lihat
                                        Detail</button>
                                </td>
                            </tr>
                            <!-- Table Row 3 -->
                            <tr class="group hover:bg-surface-container-low transition-all">
                                <td class="py-5 px-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-8 h-8 rounded-full bg-tertiary-fixed-dim flex items-center justify-center text-xs font-bold text-on-tertiary-fixed">
                                            FK
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-on-surface">Farhan Kautsar</p>
                                            <p class="text-[0.6875rem] text-on-surface-variant">20081010098</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-5 px-4">
                                    <p class="text-sm font-medium text-on-surface">Peserta Workshop UI/UX</p>
                                    <p class="text-[0.6875rem] text-on-surface-variant">Minat &amp; Bakat</p>
                                </td>
                                <td class="py-5 px-4 text-center">
                                    <span class="text-sm font-bold text-primary">5.0</span>
                                </td>
                                <td class="py-5 px-4">
                                    <span
                                        class="px-3 py-1 bg-error-container text-on-error-container rounded-full text-[0.6875rem] font-bold tracking-wider">REJECTED</span>
                                </td>
                                <td class="py-5 px-4 text-right">
                                    <button class="text-primary font-bold text-sm hover:underline">Alasan</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-8 flex items-center justify-between">
                    <p class="text-xs text-on-surface-variant font-medium">Menampilkan 3 dari 86 pengajuan tertunda</p>
                    <div class="flex items-center gap-2">
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-xl border border-outline-variant/30 hover:bg-surface-container-low transition-all">
                            <span class="material-symbols-outlined text-sm"
                                data-icon="chevron_left">chevron_left</span>
                        </button>
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-xl bg-primary text-on-primary font-bold text-sm">1</button>
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-xl border border-outline-variant/30 hover:bg-surface-container-low transition-all font-bold text-sm">2</button>
                        <button
                            class="w-10 h-10 flex items-center justify-center rounded-xl border border-outline-variant/30 hover:bg-surface-container-low transition-all">
                            <span class="material-symbols-outlined text-sm"
                                data-icon="chevron_right">chevron_right</span>
                        </button>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <!-- FAB Suppression Applied: Context is Dashboard Admin -->
</body>

</html>
