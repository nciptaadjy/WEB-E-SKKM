<!DOCTYPE html>
<html lang="id" style="">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet">
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

        .guide-section {
            counter-reset: subitem;
        }

        .guide-list {
            list-style-type: lower-alpha;
        }

        .guide-list>li {
            margin-bottom: 0.5rem;
            padding-left: 0.5rem;
        }
    </style>
</head>

<body class="bg-background text-on-background min-h-screen">
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
                <span class="font-['Manrope'] font-semibold tracking-tight" style="">Input Sertifikat</span>
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
                style="">
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
                    placeholder="Cari panduan..." type="text">
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
                    <span class="material-symbols-outlined" data-icon="settings" style="">settings</span>
                </button>
                <div class="h-8 w-[1px] bg-outline-variant/30 mx-1 hidden md:block"></div>
                <div class="flex items-center gap-3 pl-2 cursor-pointer hover:opacity-80 transition-opacity">
                    <img alt="Student Avatar" class="w-8 h-8 rounded-full object-cover border border-outline-variant/30"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCNb-1h9G2mev30bTZ4puKTz4IG7DS2HXY5nzYN6giub6aRbLnypx-96UlMgVxLPlaMdOlGDWrRlGTqIUDoEsp7jtOAIT11Mxhvx0Pf6Vge7-rEjuhLi4qwc1-FQXMqq7VbhidfQl6on7wr-NfmXW97v-FS8xeCseyKWcKcBP19qnX1URiI8Z3WVHGEJhLwqGx6mJVt7F3LZym2EC_n1GDnggX5uCbtOepRVJIKtPOi1_8IfbvHxG-FBsgRweXZ703otfbiEWkMyv4"
                        style="">
                    <span class="hidden md:block text-xs font-bold text-on-surface" style="">Budi S.</span>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content -->
    <main class="ml-0 lg:ml-72 p-4 md:p-8 transition-all max-w-5xl">
        <!-- Hero Header -->
        <section class="mb-8">
            <div
                class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-primary to-primary-container p-8 md:p-12 text-on-primary shadow-lg min-h-[200px] flex flex-col justify-center">
                <div class="absolute right-0 top-0 w-1/3 h-full opacity-20 hidden md:block">
                    <img alt="Documentation background" class="w-full h-full object-cover"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAaIQ5cF2P-3Sw1RkERjE2Y083F4XdiuWAQVh8qrNPu9S8Kz22v7G5NKKNBbmoGdWQduS3YCWWLlpMp1vsVuKFCNJLOYQdr6a0fmTw0GMt_zgM3LB7LOjybwgyM2kL-oKoc1Yz8PHnmJMMV3gppqaWMo05TjLAq-xfEfygtgH7Y7sX5sGnPSrv2afJkn4Ycw4FXwxL_Dfx2gbxpq1k5pF-lep9TE4uiGxOiwv9Ptoy6A6lHqzaE5aKEbJgwG5aGfltEbhfpBjCHBig"
                        style="">
                </div>
                <div class="relative z-10">
                    <h2 class="text-3xl md:text-4xl font-extrabold mb-4 leading-tight" style="">Panduan Lengkap
                        E-SKKM</h2>
                    <p class="text-base md:text-lg opacity-90 leading-relaxed font-body max-w-xl" style="">
                        Panduan resmi penggunaan Satuan Kredit Kegiatan Mahasiswa (SKKM) untuk mahasiswa ITB STIKOM
                        Bali.</p>
                </div>
            </div>
        </section>
        <!-- Tab Navigation Bar -->
        <section class="mb-8">
            <div class="flex border-b border-outline-variant/30">
                <a class="px-6 py-3 text-sm font-bold text-on-surface-variant hover:text-primary transition-colors relative"
                    href="{{ route('panduan') }}" style="">
                    Proses E-SKKM
                </a>
                <a class="px-6 py-3 text-sm font-bold text-primary relative" href="{{ route('panduan.tentang-skkm') }}" style="">Tentang E-
                    SKKM</a>
                <a class="px-6 py-3 text-sm font-bold text-on-surface-variant hover:text-primary transition-colors relative"
                    href="{{ route('panduan.bobot-skkm') }}" style="">
                    Bobot SKKM
                </a>
            </div>
        </section>
        <!-- Document Content -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-outline-variant/20 p-8 md:p-12 space-y-12 text-on-surface">
            <!-- I. PENGERTIAN -->
            <section class="guide-section">
                <h3 class="text-xl font-bold mb-4 flex items-center gap-3" style="">
                    <span class="text-primary" style="">I.</span> PENGERTIAN
                </h3>
                <ol class="guide-list pl-6 space-y-3 text-sm md:text-base leading-relaxed text-on-surface-variant">
                    <li class="" style="">Satuan Kredit Kegiatan Mahasiswa (SKKM) adalah suatu pengakuan
                        dan penilaian terhadap kegiatan yang diikuti oleh mahasiswa ITB STIKOM Bali dalam pengembangan
                        kegiatan kemahasiswaan.</li>
                    <li class="" style="">Pengakuan dan penilaian kegiatan yang diikuti dinyatakan dalam
                        bentuk Satuan Kredit Kegiatan Mahasiswa (SKKM).</li>
                    <li class="" style="">Besarnya pembobotan SKKM yang diberikan disesuaikan dengan jenis
                        dan pelaksanaan kegiatan yang diikuti.</li>
                </ol>
            </section>
            <!-- II. TUJUAN -->
            <section class="guide-section">
                <h3 class="text-xl font-bold mb-4 flex items-center gap-3" style="">
                    <span class="text-primary" style="">II.</span> TUJUAN
                </h3>
                <ol class="guide-list pl-6 space-y-3 text-sm md:text-base leading-relaxed text-on-surface-variant">
                    <li class="" style="">Untuk meningkatkan peranan dan partisipasi aktif mahasiswa dalam
                        setiap kegiatan kemahasiswaan dalam rangka peningkatan wawasan akademis dan non akademis para
                        mahasiswa.</li>
                    <li class="" style="">Untuk meningkatkan rasa kebersamaan dan persaudaraan antara
                        mahasiswa.</li>
                    <li class="" style="">Memberikan penghargaan atas partisipasi aktif mahasiswa dalam
                        setiap kegiatan kemahasiswaan.</li>
                </ol>
            </section>
            <!-- III. PENERAPAN -->
            <section class="guide-section">
                <h3 class="text-xl font-bold mb-4 flex items-center gap-3" style="">
                    <span class="text-primary" style="">III.</span> PENERAPAN
                </h3>
                <div class="space-y-8">
                    <p class="text-sm md:text-base leading-relaxed text-on-surface-variant" style="">SKKM
                        merupakan suatu persyaratan wajib bagi seluruh mahasiswa ITB STIKOM Bali yang akan mengikuti
                        Ujian Akhir, dimana untuk memperoleh pengesahan bebas administrasi dari bagian kemahasiswaan,
                        mahasiswa wajib menunjukkan Buku SKKM dengan poin yang sudah dipenuhi. Adapun dalam
                        penerapannya, kegiatan-kegiatan yang dapat dinilai dan dicatat dalam buku SKKM adalah:</p>
                    <!-- 1. KEGIATAN WAJIB -->
                    <div class="ml-4">
                        <h4 class="font-bold text-lg mb-4 text-on-surface flex items-center gap-2" style="">1.
                            KEGIATAN WAJIB</h4>
                        <ol
                            class="guide-list pl-6 space-y-3 text-sm md:text-base leading-relaxed text-on-surface-variant">
                            <li class="" style="">Mengikuti Kuliah Industri dengan minimal <strong
                                    class="text-primary">4 POIN SKKM</strong> untuk program S1 (mengikuti 2 kali
                                kegiatan) and <strong class="text-primary">2 POIN SKKM</strong> untuk program D3
                                (mengikuti 1 kali kegiatan).</li>
                            <li class="" style="">Mengikuti kegiatan peningkatan soft skill mahasiswa
                                (minimal 1 kali).</li>
                            <li class="" style="">Menjadi anggota aktif ORMAWA di ITB STIKOM Bali yang
                                dibuktikan dengan sertifikat keanggotaan.</li>
                            <li class="" style="">Kegiatan Gema Mahasiswa Teknologi Informasi (G.M.T.I)
                                yang dibuktikan dengan Sertifikat peserta G.M.T.I dan lulus G.M.T.I.</li>
                            <li class="" style="">Rangkaian acara Dies Natalis dan pentas musik ITB STIKOM
                                Bali dengan minimal jumlah SKKM sebesar 12 SKKM.</li>
                            <li class="" style="">Menjadi Peserta Career Week (minimal 2 kali selama
                                study).</li>
                        </ol>
                    </div>
                    <!-- 2. KEGIATAN PILIHAN -->
                    <div class="ml-4">
                        <h4 class="font-bold text-lg mb-4 text-on-surface flex items-center gap-2" style="">2.
                            KEGIATAN PILIHAN</h4>
                        <p class="text-sm text-on-surface-variant mb-4 italic" style="">Mahasiswa dapat memilih
                            dan mengikuti kegiatan lain dengan sukarela dan sesuai dengan minat dan bakat masing-masing
                            dengan ketentuan sebagai berikut:</p>
                        <ol
                            class="guide-list pl-6 space-y-4 text-sm md:text-base leading-relaxed text-on-surface-variant">
                            <li class="" style="">Setiap mahasiswa ITB STIKOM Bali wajib memenuhi jumlah
                                poin minimal Kegiatan Pilihan dengan rincian: minimal <strong class="text-primary">40
                                    POIN SKKM</strong> untuk program S1, <strong class="text-primary">32 POIN
                                    SKKM</strong> untuk program D3 dihitung dari total bidang akademik &amp; ilmiah;
                                Bidang Minat Bakat, Seni &amp; Olahraga; Organisasi &amp; Pengabdian Masyarakat.</li>
                            <li class="" style="">SKKM minimal yang ditetapkan harus sudah terpenuhi
                                sebelum mahasiswa yang bersangkutan mengikuti sidang TA bagi program S1 dan program D3.
                            </li>
                            <li class="" style="">Setiap SKKM yang diperoleh wajib dilaporkan kepada BEM
                                paling lambat 1 bulan sebelum pendaftaran sidang TA.</li>
                            <li class="" style="">Bobot SKKM yang telah diberikan dianggap sah apabila
                                telah diparaf oleh Ketua BEM dan Bagian Kemahasiswaan ITB STIKOM Bali.</li>
                            <li class="" style="">Kegiatan yang mendapatkan nilai SKKM adalah kegiatan
                                yang diselenggarakan baik dari pihak intern maupun ekstern kampus ITB STIKOM Bali.</li>
                            <li class="" style="">Bobot SKKM yang harus dipenuhi adalah:
                                <ul class="list-disc pl-8 mt-2 space-y-1 text-sm">
                                    <li class="" style="">Bidang Ilmiah minimal <strong>16 POIN SKKM
                                            (S1)</strong> dan <strong>12 POIN (D3)</strong>.</li>
                                    <li class="" style="">Bidang Minat Bakat, Seni dan olahraga minimal
                                        <strong>12 POIN SKKM</strong> dan <strong>10 POIN (D3)</strong>.</li>
                                    <li class="" style="">Bidang Organisasi dan Sosial minimal <strong>12
                                            POIN SKKM</strong> dan <strong>10 POIN (D3)</strong>.</li>
                                </ul>
                            </li>
                            <li class="" style="">Kegiatan yang diikuti masuk kategori bidang sebagai
                                berikut:
                                <ol class="list-decimal pl-8 mt-2 space-y-2 text-sm">
                                    <li class="" style="">Bobot poin Bidang Akademik &amp; Ilmiah adalah
                                        semua partisipasi kegiatan yang terkait dengan kepesertaan/kepanitiaan seminar,
                                        workshop, talk show, keanggotaan karya tulis.</li>
                                    <li class="" style="">Bobot poin Bidang Minat Bakat, Seni &amp;
                                        Olahraga adalah partisipasi kegiatan yang terkait dengan pentas seni/musik,
                                        kepesertaan/kepanitiaan lomba, kegiatan olahraga/seni.</li>
                                    <li class="" style="">Bobot poin Bidang Organisasi, Sosial &amp;
                                        Keagamaan adalah kepengurusan ORMAWA, pelantikan, pelatihan, bakti sosial,
                                        pengabdian masyarakat dan kegiatan keagamaan.</li>
                                </ol>
                            </li>
                        </ol>
                    </div>
                    <!-- 3. LAIN-LAIN -->
                    <div class="ml-4">
                        <h4 class="font-bold text-lg mb-4 text-on-surface flex items-center gap-2" style="">3.
                            LAIN-LAIN</h4>
                        <ol
                            class="guide-list pl-6 space-y-3 text-sm md:text-base leading-relaxed text-on-surface-variant">
                            <li class="" style="">Mahasiswa ITB STIKOM Bali yang tidak memiliki sertifikat
                                G.M.T.I, wajib memenuhi bobot SKKM minimal 3 sertifikat/piagam kepanitiaan yang
                                berjumlah <strong class="text-primary">9 POIN SKKM</strong> dan atau SKKM kepengurusan
                                ORMAWA dengan bobot minimal <strong class="text-primary">3 POIN</strong> (Poin C).</li>
                            <li class="" style="">Bagi mahasiswa yang tidak memenuhi poin SKKM wajib
                                (diluar GMTI), dapat diganti dengan menunjukkan sertifikat juara lomba internal maupun
                                eksternal kampus ITB STIKOM Bali atau sertifikat/piagam Kepengurusan ORMAWA atau 2
                                sertifikat kepanitiaan.</li>
                            <li class="" style="">Bagi mahasiswa kelas karyawan wajib memenuhi *8 poin
                                SKKM* (tidak terpaku pada jenis kegiatan yang diikuti dan dimulai dari angkatan 2020).
                            </li>
                        </ol>
                    </div>
                </div>
            </section>
        </div>
        <!-- Call to Action -->
        <section
            class="mt-12 bg-surface-container-highest p-8 md:p-10 rounded-2xl flex flex-col md:flex-row items-center gap-8 border border-white/50 shadow-sm">
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
        <!-- Footer Branding -->
        <footer class="mt-20 py-8 border-t border-outline-variant/10 text-center">
            <p class="text-xs md:text-sm text-outline font-medium tracking-wide" style="">© 2024 ITB STIKOM BALI
                • SISTEM INFORMASI KREDIT KEGIATAN MAHASISWA</p>
        </footer>
    </main>
</body>

</html>
