<html class="light" lang="id">

<head></head>

<body class="bg-background text-on-background min-h-screen">```html


    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Tabel Bobot SKKM | E-SKKM</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap"
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
                        "primary": "#1E88E5",
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
        h3,
        h4 {
            font-family: 'Manrope', sans-serif;
        }

        @media (max-width: 1023px) {
            aside {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            aside.open {
                transform: translateX(0);
            }

            main,
            header {
                margin-left: 0 !important;
                width: 100% !important;
            }
        }

        .tab-active {
            color: #1E88E5;
            border-bottom: 2px solid #1E88E5;
            font-weight: 700;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
    <!-- SideNavBar -->
    <aside
        class="h-screen w-72 flex-col fixed left-0 top-0 bg-white dark:bg-slate-900 p-6 gap-2 flex z-50 border-r border-outline-variant/30"
        id="sidebar">
        <div class="mb-10 px-2 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-primary dark:text-blue-400 tracking-tighter" style="">E-SKKM
                </h1>
                <p class="text-sm font-['Manrope'] font-semibold tracking-tight text-slate-500" style="">Digital
                    Curator</p>
            </div>
            <button class="lg:hidden text-on-surface"
                onclick="document.getElementById('sidebar').classList.remove('open')" style="">
                <span class="material-symbols-outlined" style="">close</span>
            </button>
        </div>
        <nav class="flex flex-col gap-2 flex-grow">
            <a class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:text-primary hover:bg-[#f6fafe] dark:hover:bg-slate-800 transition-all duration-300 scale-100 active:scale-95 rounded-lg"
                href="#" style="">
                <span class="material-symbols-outlined" data-icon="dashboard" style="">dashboard</span>
                <span class="font-['Manrope'] font-semibold tracking-tight" style="">Dashboard</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:text-primary hover:bg-[#f6fafe] dark:hover:bg-slate-800 transition-all duration-300 scale-100 active:scale-95 rounded-lg"
                href="#" style="">
                <span class="material-symbols-outlined" data-icon="upload_file" style="">upload_file</span>
                <span class="font-['Manrope'] font-semibold tracking-tight" style="">Registrasi Sertifikat</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 text-slate-600 dark:text-slate-400 hover:text-primary hover:bg-[#f6fafe] dark:hover:bg-slate-800 transition-all duration-300 scale-100 active:scale-95 rounded-lg"
                href="#" style="">
                <span class="material-symbols-outlined" data-icon="folder_shared" style="">folder_shared</span>
                <span class="font-['Manrope'] font-semibold tracking-tight" style="">List Sertifikat</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 bg-primary/10 dark:bg-slate-800 text-primary font-bold rounded-lg shadow-sm scale-100 active:scale-95"
                href="#" style="">
                <span class="material-symbols-outlined" data-icon="menu_book" style="">menu_book</span>
                <span class="font-['Manrope'] font-semibold tracking-tight" style="">Panduan</span>
            </a>
        </nav>
        <div class="mt-auto flex items-center gap-3 p-3 bg-surface-container-low rounded-xl">
            <img alt="Student Avatar" class="w-10 h-10 rounded-full border border-outline-variant/30 object-cover"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCNb-1h9G2mev30bTZ4puKTz4IG7DS2HXY5nzYN6giub6aRbLnypx-96UlMgVxLPlaMdOlGDWrRlGTqIUDoEsp7jtOAIT11Mxhvx0Pf6Vge7-rEjuhLi4qwc1-FQXMqq7VbhidfQl6on7wr-NfmXW97v-FS8xeCseyKWcKcBP19qnX1URiI8Z3WVHGEJhLwqGx6mJVt7F3LZym2EC_n1GDnggX5uCbtOepRVJIKtPOi1_8IfbvHxG-FBsgRweXZ703otfbiEWkMyv4"
                style="" />
            <div class="overflow-hidden">
                <p class="text-sm font-bold text-on-surface truncate" style="">Budi Santoso</p>
                <p class="text-[10px] text-on-surface-variant font-medium truncate" style="">Mahasiswa Informatika
                </p>
            </div>
        </div>
    </aside>
    <!-- TopAppBar -->
    <header
        class="flex justify-between items-center w-full px-6 md:px-8 py-3 ml-0 lg:ml-72 docked top-0 sticky z-40 bg-white/80 dark:bg-slate-950/80 backdrop-blur-md border-b border-outline-variant/20 transition-all">
        <div class="flex items-center gap-4">
            <button class="lg:hidden p-2 -ml-2 rounded-full hover:bg-surface-container text-on-surface"
                onclick="document.getElementById('sidebar').classList.add('open')" style="">
                <span class="material-symbols-outlined" style="">menu</span>
            </button>
            <span class="text-xl font-extrabold bg-gradient-to-r from-primary to-blue-400 bg-clip-text text-transparent"
                style="">Portal Mahasiswa</span>
        </div>
        <div class="flex items-center gap-2 md:gap-6">
            <div class="relative hidden sm:block">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline text-sm"
                    data-icon="search" style="">search</span>
                <input
                    class="bg-surface-container-low border-none rounded-full py-2 pl-9 pr-4 text-sm w-40 md:w-64 focus:ring-2 focus:ring-primary placeholder:text-outline-variant"
                    placeholder="Cari panduan..." type="text" />
            </div>
            <div class="flex items-center gap-1 md:gap-4">
                <button
                    class="p-2 rounded-full hover:bg-surface-container text-on-surface-variant relative transition-colors"
                    style="">
                    <span class="material-symbols-outlined" data-icon="notifications"
                        style="">notifications</span>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full border-2 border-white"></span>
                </button>
                <button class="p-2 rounded-full hover:bg-surface-container text-on-surface-variant transition-colors"
                    style="">
                    <span class="material-symbols-outlined" data-icon="help_outline" style="">help_outline</span>
                </button>
                <div class="h-8 w-[1px] bg-outline-variant/30 mx-1 hidden md:block"></div>
                <div class="flex items-center gap-3 pl-2 cursor-pointer hover:opacity-80 transition-opacity">
                    <img alt="Admin Avatar" class="w-8 h-8 rounded-full object-cover border border-outline-variant/30"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCUqXIEaELCswSCQyyzu9tvzhDL9aNCFgKCRop-KwHYlXZKQV9gCTUoLAlCrmeEiZ0-mGCIU2gOvuNYnN1oI-CnR-6RxNh9FOcqfXdL-oImPNeknIXDzmUqPB1IO87tLLGXaaNOQCy6sFPVpzlNInRjWOAQ2PC7pJZNWL6xnTqgtQKYxrwprZBzDG6LCuveCMdTiIvbLxA1ly3cOPIx-M6k4mMZO2C6STq3n_tdLep392_w1zcatV5qgTiO6XOqqaBW4rU2QlYD2rsa"
                        style="" />
                    <span class="hidden md:block text-xs font-bold text-on-surface" style="">Dr. Aris
                        Sudewa</span>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <main class="ml-0 lg:ml-72 p-4 md:p-8 transition-all">
        <!-- Hero Header (Consistent with SCREEN_56/80) -->
        <section class="mb-8">
            <div
                class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-primary to-primary-container p-8 md:p-12 text-on-primary shadow-lg min-h-[200px] flex flex-col justify-center">
                <div class="absolute right-0 top-0 w-1/3 h-full opacity-20 hidden md:block">
                    <img alt="Documentation background" class="w-full h-full object-cover"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAaIQ5cF2P-3Sw1RkERjE2Y083F4XdiuWAQVh8qrNPu9S8Kz22v7G5NKKNBbmoGdWQduS3YCWWLlpMp1vsVuKFCNJLOYQdr6a0fmTw0GMt_zgM3LB7LOjybwgyM2kL-oKoc1Yz8PHnmJMMV3gppqaWMo05TjLAq-xfEfygtgH7Y7sX5sGnPSrv2afJkn4Ycw4FXwxL_Dfx2gbxpq1k5pF-lep9TE4uiGxOiwv9Ptoy6A6lHqzaE5aKEbJgwG5aGfltEbhfpBjCHBig"
                        style="" />
                </div>
                <div class="relative z-10">
                    <h2 class="text-3xl md:text-4xl font-extrabold mb-4 leading-tight" style="">Panduan Lengkap
                        E-SKKM</h2>
                    <p class="text-base md:text-lg opacity-90 leading-relaxed font-body max-w-2xl" style="">
                        Pusat informasi terpadu untuk membantu Anda mengelola, mengajukan, dan memantau poin Satuan
                        Kredit Kegiatan Mahasiswa secara digital.</p>
                </div>
            </div>
        </section>
        <!-- Tab Navigation Bar (Consistent with SCREEN_80) -->
        <section class="mb-8">
            <div class="flex border-b border-outline-variant/30 overflow-x-auto no-scrollbar">
                <a class="px-6 py-3 text-sm font-bold text-on-surface-variant hover:text-primary transition-colors whitespace-nowrap"
                    href="{{ route('panduan') }}" style="">
                    Proses E-SKKM
                </a>
                <a class="px-6 py-3 text-sm font-bold text-on-surface-variant hover:text-primary transition-colors whitespace-nowrap"
                    href="{{ route('panduan.tentang-skkm') }}" style="">Tentang E- SKKM</a>
                <a class="px-6 py-3 text-sm font-bold text-primary border-b-2 border-primary whitespace-nowrap"
                    href="{{ route('panduan.bobot-skkm') }}" style="">
                    Bobot SKKM
                </a>
            </div>
        </section>
        <!-- Document Content (Comprehensive Table) -->
        <div class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 overflow-hidden mb-12">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-primary text-white font-manrope">
                            <th class="px-6 py-4 font-bold border-r border-white/10 text-center w-16" rowspan="2"
                                style="">NO</th>
                            <th class="px-6 py-4 font-bold border-r border-white/10" rowspan="2" style="">
                                Bidang / Kegiatan</th>
                            <th class="px-6 py-4 font-bold border-r border-white/10" rowspan="2" style="">
                                Kedudukan</th>
                            <th class="px-6 py-2 font-bold text-center border-b border-white/10" colspan="4"
                                style="">Tingkat</th>
                        </tr>
                        <tr class="bg-[#1565C0] text-white font-manrope">
                            <th class="px-4 py-2 text-xs font-bold text-center border-r border-white/10"
                                style="">PT</th>
                            <th class="px-4 py-2 text-xs font-bold text-center border-r border-white/10"
                                style="">REG</th>
                            <th class="px-4 py-2 text-xs font-bold text-center border-r border-white/10"
                                style="">NAS</th>
                            <th class="px-4 py-2 text-xs font-bold text-center" style="">INT</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-body text-on-surface">
                        <!-- Section 1: Akademik -->
                        <tr class="bg-primary/5">
                            <td class="px-6 py-2.5 text-xs font-bold text-primary tracking-widest uppercase"
                                colspan="7" style="">1. AKADEMIK &amp; ILMIAH</td>
                        </tr>
                        <tr class="hover:bg-surface-container-low transition-colors">
                            <td class="px-6 py-4 text-center font-medium text-on-surface-variant" rowspan="2"
                                style="">1.1</td>
                            <td class="px-6 py-4 font-semibold" rowspan="2" style="">Konferensi / Seminar /
                                Simposium</td>
                            <td class="px-6 py-4 text-on-surface-variant" style="">Penulis Utama / Pemakalah
                            </td>
                            <td class="px-4 py-4 text-center font-bold" style="">3</td>
                            <td class="px-4 py-4 text-center font-bold" style="">4</td>
                            <td class="px-4 py-4 text-center font-bold" style="">5</td>
                            <td class="px-4 py-4 text-center font-bold" style="">6</td>
                        </tr>
                        <tr class="hover:bg-surface-container-low transition-colors border-b">
                            <td class="px-6 py-4 text-on-surface-variant" style="">Penulis Pendamping / Peserta
                            </td>
                            <td class="px-4 py-4 text-center font-bold" style="">2</td>
                            <td class="px-4 py-4 text-center font-bold" style="">3</td>
                            <td class="px-4 py-4 text-center font-bold" style="">4</td>
                            <td class="px-4 py-4 text-center font-bold" style="">5</td>
                        </tr>
                        <tr class="hover:bg-surface-container-low transition-colors">
                            <td class="px-6 py-4 text-center font-medium text-on-surface-variant" rowspan="3"
                                style="">1.2</td>
                            <td class="px-6 py-4 font-semibold" rowspan="3" style="">Karya Tulis / PKM /
                                Artikel Ilmiah</td>
                            <td class="px-6 py-4 text-on-surface-variant" style="">Ketua Kelompok</td>
                            <td class="px-4 py-4 text-center font-bold" style="">4</td>
                            <td class="px-4 py-4 text-center font-bold" style="">5</td>
                            <td class="px-4 py-4 text-center font-bold" style="">6</td>
                            <td class="px-4 py-4 text-center font-bold" style="">7</td>
                        </tr>
                        <tr class="hover:bg-surface-container-low transition-colors">
                            <td class="px-6 py-4 text-on-surface-variant" style="">Anggota Kelompok</td>
                            <td class="px-4 py-4 text-center font-bold" style="">3</td>
                            <td class="px-4 py-4 text-center font-bold" style="">4</td>
                            <td class="px-4 py-4 text-center font-bold" style="">5</td>
                            <td class="px-4 py-4 text-center font-bold" style="">6</td>
                        </tr>
                        <tr class="hover:bg-surface-container-low transition-colors border-b">
                            <td class="px-6 py-4 text-on-surface-variant" style="">Perorangan</td>
                            <td class="px-4 py-4 text-center font-bold" style="">4</td>
                            <td class="px-4 py-4 text-center font-bold" style="">5</td>
                            <td class="px-4 py-4 text-center font-bold" style="">6</td>
                            <td class="px-4 py-4 text-center font-bold" style="">7</td>
                        </tr>
                        <!-- Section 2: Minat Bakat -->
                        <tr class="bg-primary/5">
                            <td class="px-6 py-2.5 text-xs font-bold text-primary tracking-widest uppercase"
                                colspan="7" style="">2. MINAT BAKAT, SENI DAN OLAHRAGA</td>
                        </tr>
                        <tr class="hover:bg-surface-container-low transition-colors">
                            <td class="px-6 py-4 text-center font-medium text-on-surface-variant" rowspan="4"
                                style="">2.1</td>
                            <td class="px-6 py-4 font-semibold" rowspan="4" style="">Kompetisi / Kejuaraan /
                                Lomba</td>
                            <td class="px-6 py-4 text-on-surface-variant" style="">Juara I / Medali Emas</td>
                            <td class="px-4 py-4 text-center font-bold" style="">4</td>
                            <td class="px-4 py-4 text-center font-bold" style="">5</td>
                            <td class="px-4 py-4 text-center font-bold" style="">6</td>
                            <td class="px-4 py-4 text-center font-bold" style="">7</td>
                        </tr>
                        <tr class="hover:bg-surface-container-low transition-colors">
                            <td class="px-6 py-4 text-on-surface-variant" style="">Juara II / Medali Perak</td>
                            <td class="px-4 py-4 text-center font-bold" style="">3</td>
                            <td class="px-4 py-4 text-center font-bold" style="">4</td>
                            <td class="px-4 py-4 text-center font-bold" style="">5</td>
                            <td class="px-4 py-4 text-center font-bold" style="">6</td>
                        </tr>
                        <tr class="hover:bg-surface-container-low transition-colors">
                            <td class="px-6 py-4 text-on-surface-variant" style="">Juara III / Medali Perunggu
                            </td>
                            <td class="px-4 py-4 text-center font-bold" style="">2</td>
                            <td class="px-4 py-4 text-center font-bold" style="">3</td>
                            <td class="px-4 py-4 text-center font-bold" style="">4</td>
                            <td class="px-4 py-4 text-center font-bold" style="">5</td>
                        </tr>
                        <tr class="hover:bg-surface-container-low transition-colors border-b">
                            <td class="px-6 py-4 text-on-surface-variant" style="">Peserta Terpilih / Finalis
                            </td>
                            <td class="px-4 py-4 text-center font-bold" style="">1</td>
                            <td class="px-4 py-4 text-center font-bold" style="">2</td>
                            <td class="px-4 py-4 text-center font-bold" style="">3</td>
                            <td class="px-4 py-4 text-center font-bold" style="">4</td>
                        </tr>
                        <!-- Section 3: Organisasi -->
                        <tr class="bg-primary/5">
                            <td class="px-6 py-2.5 text-xs font-bold text-primary tracking-widest uppercase"
                                colspan="7" style="">3. ORGANISASI DAN KEPEMIMPINAN</td>
                        </tr>
                        <tr class="hover:bg-surface-container-low transition-colors">
                            <td class="px-6 py-4 text-center font-medium text-on-surface-variant" rowspan="3"
                                style="">3.1</td>
                            <td class="px-6 py-4 font-semibold" rowspan="3" style="">Pengurus Organisasi
                                (BEM/DPM/UKM)</td>
                            <td class="px-6 py-4 text-on-surface-variant" style="">Ketua Umum / Presiden</td>
                            <td class="px-4 py-4 text-center font-bold" style="">5</td>
                            <td class="px-4 py-4 text-center font-bold" style="">-</td>
                            <td class="px-4 py-4 text-center font-bold" style="">6</td>
                            <td class="px-4 py-4 text-center font-bold" style="">7</td>
                        </tr>
                        <tr class="hover:bg-surface-container-low transition-colors">
                            <td class="px-6 py-4 text-on-surface-variant" style="">Sekretaris / Bendahara /
                                Ketua Bidang</td>
                            <td class="px-4 py-4 text-center font-bold" style="">4</td>
                            <td class="px-4 py-4 text-center font-bold" style="">-</td>
                            <td class="px-4 py-4 text-center font-bold" style="">5</td>
                            <td class="px-4 py-4 text-center font-bold" style="">6</td>
                        </tr>
                        <tr class="hover:bg-surface-container-low transition-colors border-b">
                            <td class="px-6 py-4 text-on-surface-variant" style="">Anggota Pengurus</td>
                            <td class="px-4 py-4 text-center font-bold" style="">3</td>
                            <td class="px-4 py-4 text-center font-bold" style="">-</td>
                            <td class="px-4 py-4 text-center font-bold" style="">4</td>
                            <td class="px-4 py-4 text-center font-bold" style="">5</td>
                        </tr>
                        <tr class="hover:bg-surface-container-low transition-colors">
                            <td class="px-6 py-4 text-center font-medium text-on-surface-variant" rowspan="2"
                                style="">3.2</td>
                            <td class="px-6 py-4 font-semibold" rowspan="2" style="">Kepanitiaan Kegiatan
                            </td>
                            <td class="px-6 py-4 text-on-surface-variant" style="">Ketua Panitia / Koordinator
                            </td>
                            <td class="px-4 py-4 text-center font-bold" style="">3</td>
                            <td class="px-4 py-4 text-center font-bold" style="">4</td>
                            <td class="px-4 py-4 text-center font-bold" style="">5</td>
                            <td class="px-4 py-4 text-center font-bold" style="">6</td>
                        </tr>
                        <tr class="hover:bg-surface-container-low transition-colors border-b">
                            <td class="px-6 py-4 text-on-surface-variant" style="">Anggota Panitia</td>
                            <td class="px-4 py-4 text-center font-bold" style="">2</td>
                            <td class="px-4 py-4 text-center font-bold" style="">3</td>
                            <td class="px-4 py-4 text-center font-bold" style="">4</td>
                            <td class="px-4 py-4 text-center font-bold" style="">5</td>
                        </tr>
                        <!-- Section 4: Kegiatan Wajib -->
                        <tr class="bg-primary/5">
                            <td class="px-6 py-2.5 text-xs font-bold text-primary tracking-widest uppercase"
                                colspan="7" style="">4. KEGIATAN WAJIB &amp; SOSIAL</td>
                        </tr>
                        <tr class="hover:bg-surface-container-low transition-colors">
                            <td class="px-6 py-4 text-center font-medium text-on-surface-variant" style="">4.1
                            </td>
                            <td class="px-6 py-4 font-semibold" style="">Pengabdian Masyarakat / Bakti Sosial
                            </td>
                            <td class="px-6 py-4 text-on-surface-variant" style="">Relawan / Pelaksana</td>
                            <td class="px-4 py-4 text-center font-bold" style="">2</td>
                            <td class="px-4 py-4 text-center font-bold" style="">3</td>
                            <td class="px-4 py-4 text-center font-bold" style="">4</td>
                            <td class="px-4 py-4 text-center font-bold" style="">5</td>
                        </tr>
                        <tr class="hover:bg-surface-container-low transition-colors">
                            <td class="px-6 py-4 text-center font-medium text-on-surface-variant" style="">4.2
                            </td>
                            <td class="px-6 py-4 font-semibold" style="">Pelatihan / Workshop Kompetensi</td>
                            <td class="px-6 py-4 text-on-surface-variant" style="">Peserta Sertifikasi</td>
                            <td class="px-4 py-4 text-center font-bold" style="">3</td>
                            <td class="px-4 py-4 text-center font-bold" style="">4</td>
                            <td class="px-4 py-4 text-center font-bold" style="">5</td>
                            <td class="px-4 py-4 text-center font-bold" style="">6</td>
                        </tr>
                        <tr class="hover:bg-surface-container-low transition-colors">
                            <td class="px-6 py-4 text-center font-medium text-on-surface-variant" style="">4.3
                            </td>
                            <td class="px-6 py-4 font-semibold" style="">Orientasi Mahasiswa (PKKMB)</td>
                            <td class="px-6 py-4 text-on-surface-variant" style="">Peserta Lulus</td>
                            <td class="px-4 py-4 text-center font-bold" style="">10</td>
                            <td class="px-4 py-4 text-center font-bold" style="">-</td>
                            <td class="px-4 py-4 text-center font-bold" style="">-</td>
                            <td class="px-4 py-4 text-center font-bold" style="">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Call to Action (Consistent with SCREEN_56/80) -->
        <section
            class="bg-surface-container-highest p-8 md:p-10 rounded-2xl flex flex-col md:flex-row items-center gap-8 border border-white/50 shadow-sm">
            <div class="flex-grow text-center md:text-left">
                <h4 class="text-2xl font-bold text-on-surface mb-2" style="">Sudah siap mengunggah prestasi
                    Anda?</h4>
                <p class="text-on-surface-variant" style="">Pastikan semua dokumen sudah sesuai dengan ketentuan
                    di atas sebelum memulai proses registrasi.</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-4 shrink-0 w-full md:w-auto">
                <button
                    class="px-6 py-3 bg-white text-primary border border-primary/30 rounded-lg font-bold hover:bg-primary/5 transition-colors text-center"
                    style="">Lihat Status</button>
                <button
                    class="px-6 py-3 bg-primary text-on-primary rounded-lg font-bold shadow-md hover:shadow-lg hover:bg-[#1565C0] transition-all text-center"
                    style="">Mulai Registrasi</button>
            </div>
        </section>
        <!-- Footer Branding (Consistent with SCREEN_80) -->
        <footer class="mt-20 py-8 border-t border-outline-variant/10 text-center">
            <p class="text-xs md:text-sm text-outline font-medium tracking-wide" style="">© 2024 UNIVERSITAS
                TEKNOLOGI • SISTEM INFORMASI KREDIT KEGIATAN MAHASISWA</p>
        </footer>
    </main>
    ```
</body>

</html>
