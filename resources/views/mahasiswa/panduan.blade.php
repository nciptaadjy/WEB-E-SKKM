<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
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
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3 { font-family: 'Manrope', sans-serif; }

        .tab-active {
            color: #005ea4;
            border-bottom: 2px solid #005ea4;
            font-weight: 700;
        }
    </style>
</head>

<body class="bg-surface text-on-surface">

    <!-- ===================== TOP NAVBAR (sama persis dengan dashboard) ===================== -->
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
        <!-- ===================== SIDEBAR (sama persis dengan dashboard) ===================== -->
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
                <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-white/50 rounded-xl transition-all"
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
                <a class="flex items-center gap-3 px-4 py-3 bg-white text-[#005ea4] rounded-xl shadow-sm font-semibold transition-all"
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
        <!-- ===================== MAIN CONTENT ===================== -->
        <main class="flex-1 md:ml-64 min-h-screen">
        <div class="p-4 md:p-8 max-w-6xl mx-auto">

            <!-- Hero Header -->
            <section class="mb-8">
                <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-primary to-primary-container p-8 md:p-12 text-on-primary shadow-lg min-h-[200px] md:min-h-[240px] flex flex-col justify-center">
                    <div class="absolute right-0 top-0 w-1/3 h-full opacity-20 hidden md:block">
                        <img alt="Documentation background" class="w-full h-full object-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAaIQ5cF2P-3Sw1RkERjE2Y083F4XdiuWAQVh8qrNPu9S8Kz22v7G5NKKNBbmoGdWQduS3YCWWLlpMp1vsVuKFCNJLOYQdr6a0fmTw0GMt_zgM3LB7LOjybwgyM2kL-oKoc1Yz8PHnmJMMV3gppqaWMo05TjLAq-xfEfygtgH7Y7sX5sGnPSrv2afJkn4Ycw4FXwxL_Dfx2gbxpq1k5pF-lep9TE4uiGxOiwv9Ptoy6A6lHqzaE5aKEbJgwG5aGfltEbhfpBjCHBig">
                    </div>
                    <div class="relative z-10 max-w-2xl">
                        <h2 class="text-3xl md:text-4xl font-extrabold mb-4 leading-tight">Panduan Lengkap E-SKKM</h2>
                        <p class="text-base md:text-lg opacity-90 leading-relaxed">Pusat informasi terpadu untuk membantu Anda mengelola, mengajukan, dan memantau poin Satuan Kredit Kegiatan Mahasiswa secara digital.</p>
                    </div>
                </div>
            </section>

            <!-- Tab Navigation -->
            <section class="mb-10 border-b border-outline-variant/30">
                <div class="flex gap-8 px-2 overflow-x-auto whitespace-nowrap">
                    <button class="pb-4 tab-active text-sm md:text-base font-['Manrope'] transition-all">Proses E-SKKM</button>
                    <button class="pb-4 text-outline hover:text-primary text-sm md:text-base font-['Manrope'] font-semibold transition-all">Tentang E-SKKM</button>
                    <button class="pb-4 text-outline hover:text-primary text-sm md:text-base font-['Manrope'] font-semibold transition-all">Bobot SKKM</button>
                </div>
            </section>

            <!-- Bento Grid Steps -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                <!-- Step 1 -->
                <div class="bg-white p-8 rounded-xl shadow-sm border border-outline-variant/20 flex flex-col gap-4">
                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-xl">1</div>
                    <h3 class="text-xl font-bold text-on-surface">Registrasi Sertifikat</h3>
                    <div class="space-y-3">
                        <p class="text-sm text-on-surface-variant leading-relaxed">Ikuti langkah-langkah berikut untuk mengajukan poin baru:</p>
                        <ul class="text-xs text-on-surface-variant space-y-2 list-decimal list-inside">
                            <li><strong>Login:</strong> Akses akun mahasiswa Anda.</li>
                            <li><strong>Upload:</strong> Pilih file PDF/JPG (Maks. 2MB).</li>
                            <li><strong>Detail:</strong> Isi nama kegiatan, tanggal, dan kategori.</li>
                            <li><strong>Submit:</strong> Klik 'Kirim' untuk memulai verifikasi.</li>
                        </ul>
                    </div>
                    <div class="mt-auto pt-4 border-t border-outline-variant/10">
                        <span class="text-primary font-semibold text-sm flex items-center gap-1 cursor-pointer hover:underline">
                            Lihat Tutorial Visual <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </span>
                    </div>
                </div>
                <!-- Step 2 -->
                <div class="bg-white p-8 rounded-xl shadow-sm border border-outline-variant/20 flex flex-col gap-4">
                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-xl">2</div>
                    <h3 class="text-xl font-bold text-on-surface">Proses Verifikasi</h3>
                    <div class="space-y-3">
                        <p class="text-sm text-on-surface-variant leading-relaxed">Tim Kurator akan meninjau berkas Anda dalam <strong>3-5 hari kerja</strong>. Status berkas:</p>
                        <div class="space-y-2">
                            <div class="flex items-start gap-2">
                                <span class="mt-1 px-1.5 py-0.5 bg-yellow-100 text-yellow-800 rounded text-[9px] font-bold">PENDING</span>
                                <p class="text-[11px] text-on-surface-variant">Berkas sedang menunggu antrean peninjauan petugas.</p>
                            </div>
                            <div class="flex items-start gap-2">
                                <span class="mt-1 px-1.5 py-0.5 bg-red-100 text-red-800 rounded text-[9px] font-bold">REJECTED</span>
                                <p class="text-[11px] text-on-surface-variant">Berkas ditolak karena data tidak sesuai atau gambar tidak jelas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-auto pt-4">
                        <span class="px-3 py-1 bg-surface-container-high text-on-surface-variant rounded-full text-[10px] font-bold uppercase tracking-wider">SLA: 5 HARI KERJA</span>
                    </div>
                </div>
                <!-- Step 3 -->
                <div class="bg-white p-8 rounded-xl shadow-sm border border-outline-variant/20 flex flex-col gap-4 sm:col-span-2 lg:col-span-1">
                    <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-xl">3</div>
                    <h3 class="text-xl font-bold text-on-surface">Akumulasi Poin</h3>
                    <div class="space-y-3">
                        <p class="text-sm text-on-surface-variant leading-relaxed">Poin yang disetujui akan dibagi menjadi dua kategori utama:</p>
                        <ul class="text-xs text-on-surface-variant space-y-2">
                            <li class="flex gap-2"><span class="text-primary font-bold">•</span>
                                <div><strong>Kredit Wajib:</strong> Poin dari kegiatan institusional wajib (LDKM, Ospek, dll).</div>
                            </li>
                            <li class="flex gap-2"><span class="text-primary font-bold">•</span>
                                <div><strong>Kredit Umum:</strong> Poin dari organisasi, lomba, seminar, atau pengabdian masyarakat.</div>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-auto pt-4">
                        <span class="px-3 py-1 bg-secondary-container text-on-secondary-container rounded-full text-[10px] font-bold uppercase tracking-wider">Poin Terintegrasi</span>
                    </div>
                </div>
            </div>

            <!-- Rules & FAQ -->
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">
                <div class="lg:col-span-3 space-y-6">
                    <div class="bg-surface-container-low p-6 md:p-8 rounded-xl border border-outline-variant/10">
                        <h3 class="text-2xl font-bold mb-6 text-on-surface flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">gavel</span>
                            Aturan Umum &amp; Ketentuan
                        </h3>
                        <ul class="space-y-4">
                            <li class="flex gap-4 p-4 bg-white rounded-lg border border-outline-variant/10 shadow-sm">
                                <span class="material-symbols-outlined text-primary shrink-0">check_circle</span>
                                <div>
                                    <p class="font-bold text-on-surface">Keaslian Berkas</p>
                                    <p class="text-sm text-on-surface-variant">Sertifikat harus asli dan dapat diverifikasi. Pemalsuan dokumen akan dikenakan sanksi akademik berat sesuai SK Rektor.</p>
                                </div>
                            </li>
                            <li class="flex gap-4 p-4 bg-white rounded-lg border border-outline-variant/10 shadow-sm">
                                <span class="material-symbols-outlined text-primary shrink-0">history</span>
                                <div>
                                    <p class="font-bold text-on-surface">Batas Waktu Pengajuan</p>
                                    <p class="text-sm text-on-surface-variant">Sertifikat harus diajukan maksimal 1 semester setelah kegiatan berakhir. Pengajuan di luar batas waktu akan otomatis ditolak sistem.</p>
                                </div>
                            </li>
                            <li class="flex gap-4 p-4 bg-white rounded-lg border border-outline-variant/10 shadow-sm">
                                <span class="material-symbols-outlined text-primary shrink-0">category</span>
                                <div>
                                    <p class="font-bold text-on-surface">Kategori &amp; Rubrik</p>
                                    <p class="text-sm text-on-surface-variant">Nilai poin ditentukan berdasarkan tingkat kegiatan (Lokal, Nasional, Internasional) dan peran (Peserta, Panitia, Juara).</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- FAQ -->
                <div id="faq" class="lg:col-span-2">
                    <div class="bg-white border border-outline-variant/20 p-6 md:p-8 rounded-xl h-full shadow-sm">
                        <h3 class="text-2xl font-bold mb-6 text-on-surface">Tanya Jawab (FAQ)</h3>
                        <div class="space-y-6">
                            <div class="border-b border-outline-variant/10 pb-4">
                                <p class="font-bold text-primary text-sm mb-2">Bagaimana jika sertifikat saya ditolak?</p>
                                <p class="text-xs text-on-surface-variant leading-relaxed">Periksa alasan penolakan di 'List Sertifikat'. Anda dapat melakukan <strong>Revisi</strong> dengan mengunggah berkas baru tanpa harus membuat entri baru jika statusnya memungkinkan.</p>
                            </div>
                            <div class="border-b border-outline-variant/10 pb-4">
                                <p class="font-bold text-primary text-sm mb-2">Dapatkah saya menghapus pengajuan?</p>
                                <p class="text-xs text-on-surface-variant leading-relaxed">Pengajuan hanya bisa dihapus jika masih berstatus <strong>Pending</strong>. Jika sudah masuk tahap verifikasi atau ditolak, penghapusan memerlukan bantuan Admin.</p>
                            </div>
                            <div class="border-b border-outline-variant/10 pb-4">
                                <p class="font-bold text-primary text-sm mb-2">Berapa ukuran maksimal file?</p>
                                <p class="text-xs text-on-surface-variant leading-relaxed">Batas maksimal per file adalah <strong>2MB</strong>. Disarankan menggunakan kompresi PDF untuk hasil terbaik tanpa mengurangi keterbacaan teks.</p>
                            </div>
                            <div class="pt-4">
                                <button class="w-full py-3 bg-primary text-on-primary rounded-lg font-bold text-sm hover:bg-primary-container transition-all flex items-center justify-center gap-2 shadow-sm">
                                    <span class="material-symbols-outlined">support_agent</span>
                                    Hubungi Support Center
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <section class="mt-12 bg-surface-container-highest p-8 md:p-10 rounded-2xl flex flex-col md:flex-row items-center gap-8 border border-white/50 shadow-sm">
                <div class="grow text-center md:text-left">
                    <h4 class="text-2xl font-bold text-on-surface mb-2">Sudah siap mengunggah prestasi Anda?</h4>
                    <p class="text-on-surface-variant">Pastikan semua dokumen sudah sesuai dengan ketentuan di atas sebelum memulai proses registrasi.</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 shrink-0 w-full md:w-auto">
                    <button class="px-6 py-3 bg-white text-primary border border-primary/30 rounded-lg font-bold hover:bg-primary/5 transition-colors text-center">Lihat Status</button>
                    <button class="px-6 py-3 bg-primary text-on-primary rounded-lg font-bold shadow-md hover:shadow-lg hover:bg-primary-container transition-all text-center">Mulai Registrasi</button>
                </div>
            </section>

            <!-- Footer -->
            <footer class="mt-20 py-8 border-t border-outline-variant/10 text-center">
                <p class="text-xs md:text-sm text-outline font-medium tracking-wide">© 2024 UNIVERSITAS TEKNOLOGI • SISTEM INFORMASI KREDIT KEGIATAN MAHASISWA</p>
            </footer>
        </div>
        </main>
    </div>

    <!-- Mobile Navigation (sama dengan dashboard) -->
    <nav class="md:hidden fixed bottom-0 left-0 right-0 bg-white shadow-[0_-2px_10px_rgba(0,0,0,0.05)] h-16 flex items-center justify-around z-50">
        <a class="flex flex-col items-center text-slate-400" href="{{ route('dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="text-[10px] font-medium">Dasbor</span>
        </a>
        <a class="flex flex-col items-center text-slate-400" href="{{ route('sertifikat.show') }}">
            <span class="material-symbols-outlined">assignment</span>
            <span class="text-[10px] font-medium">Kegiatan</span>
        </a>
        <div class="relative -top-6">
            <a href="{{ route('sertifikat.create') }}"
                class="w-12 h-12 bg-primary text-white rounded-full flex items-center justify-center shadow-lg shadow-primary/40">
                <span class="material-symbols-outlined">add</span>
            </a>
        </div>
        <a class="flex flex-col items-center text-primary" href="{{ route('panduan') }}">
            <span class="material-symbols-outlined">analytics</span>
            <span class="text-[10px] font-bold">Panduan</span>
        </a>
        <a class="flex flex-col items-center text-slate-400" href="#">
            <span class="material-symbols-outlined">account_circle</span>
            <span class="text-[10px] font-medium">Profil</span>
        </a>
    </nav>

</body>
</html>